<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  group Controller
 *
 * @package XGO CMS v3.0
 * @subpackage group
 * @link http://sunsoft.vn
 */

class Group extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->language('group');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('group_model');
			$this->set_controller('group');
			$this->set_model($this->group_model);
		}
	}
	
	protected function datatables(){
		$this->load->library('Xgo_datatables', '', 'datatables');
	
		$this->view_data['js']	= array(
				base_url().'third_party/datatables/js/jquery.dataTables.js',
				base_url().'third_party/datatables/js/dataTables.bootstrap.js',
				base_url().'third_party/datatables/js/jquery.dataTables.columnFilter.js'
		);
	
		$this->view_data['css']			= array(
				base_url().'third_party/datatables/css/dataTables.bootstrap.css',
				base_url().'third_party/checkbox/style.css'
		);
	
		$this->view_data['datatables']		= array(
				'json_data'		=> site_url('auth/group/index/view/json_data'),
				'init_data' 	=> $this->group_model->init_data($this->right),
				'filter'		=> '',
				'label'			=> $this->lang->line('group_list'),
		);
	
		$this->load->view('templates/backend/datatables_index', $this->view_data);
	}
	
	public function right(){
		$group_id 		= $this->input->post('group');
		$value 			= $this->input->post('value');
		$value 			= explode('__', $value);
		$permission_id 	= $value[0];
		$role_id 		= $value[1];
		$checked 		= $this->input->post('checked');

		$groupright_data= array(
				'role_id' 		=> $role_id,
				'permission_id' => $permission_id,
				'group_id'		=> $group_id,
		);

		if(strpos($group_id, 'mp_')==0||strpos($group_id, 'mp_')==FALSE){

			$this->load->model('groupright_model');
			$groupright  = $this->groupright_model->find_by($groupright_data, 'id');

			if(isset($groupright[0])){
				//uncheck delete groupright
				if($checked=='false'){
					$this->groupright_model->delete(array('id' => $groupright[0]->id));
				}
			}else{
				//uncheck delete groupright
				if($checked=='true'){
					$this->groupright_model->create($groupright_data);
				}
			}
		}else{
			//put session flash data
			$groupright_data_session 				= @json_decode($this->session->userdata('groupright_data'), true);
			$groupright_data_session[$group_id][] 	= $groupright_data;
			$this->session->set_userdata('groupright_data', json_encode($groupright_data_session));
			//print_r($groupright_data_session);
		}

		echo "OK";
	}
	/**
	 *
	 * @param type $id
	 */
	protected function update($id=NULL){
		$this->view_data["group"] 				= new stdClass();
		$this->view_data["group"]->id			= $id;
		$this->view_data["group"]->title		= $this->input->post('title');
		$this->view_data["group"]->description	= $this->input->post('description');

		if($this->input->server('REQUEST_METHOD')=='POST'){

			$this->load->helper('form');
			$this->load->helper('character');

			/**
			 * update field list
				title
				description
			*/

			// Validate form.
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			//require field and xss clean
			$rules = array(
					array(
							'field'   => 'title',
							'label'   =>  $this->lang->line('group_title'),
							'rules'   => 'trim|required|max_length[150]xss_clean'
					),
					array(
							'field'   => 'description',
							'label'   => $this->lang->line('group_description'),
							'rules'   => 'trim|xss_clean'
					)
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){
				if($id>0){
					$this->view_data["group"]->editor_id 	= 	$this->group_model->get_user_id();
					$this->view_data["group"]->updated 		= 	$this->datetime;
					$this->group_model->update($this->view_data["group"], $id);
					unset($this->view_data["group"]);
                                        $logAction  =   'Cập nhật nhóm thành công, id = '.$id;
				}else{

					$this->view_data["group"]->creator_id 	= 	$this->group_model->get_user_id();
					$this->view_data["group"]->created		=	$this->datetime;

					$id = $this->group_model->create($this->view_data["group"]);

					//save groupright
					$tmp_id									= $this->input->post('group_id');
					$groupright_data_session 				= json_decode($this->session->userdata('groupright_data'), true);

					foreach($groupright_data_session[$tmp_id] as $groupright_item){
						$this->load->model('groupright_model');
						$groupright_item['group_id'] = $id;
						$this->groupright_model->create($groupright_item);
					}
					unset($groupright_data_session[$tmp_id]);
                                        $logAction  =   'Tạo nhóm thành công, id = '.$id;
				}
				if($id>0){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
                                        $paramAdminLog  = array(
                                            'userid'            => $this->session->userdata['user_id'],
                                            'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                            'ip'                => $_SERVER['REMOTE_ADDR'],
                                            'logAction'         => $logAction,
                                            'agent_code'        => $this->session->userdata['agent_code']
                                        );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
					if($this->input->post('submit')=='create'){
						redirect(site_url('auth/group/index/add'));
					}else{
						redirect('auth/group/index/edit/'.$id);
					}
				}
			}

		}

		$this->load->model('permission_model');
		$this->load->model('role_model');
		if($id>0){
			$group_query	= $this->group_model->find_by(array('id' => $id));
			if(!isset($group_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/group'));
				exit();
			}
			$this->view_data['group']				= $group_query[0];
		}else{
			$this->view_data["group"]->id	 		= $id;
		}

		$this->view_data['permission_list'] = $this->permission_model->find_by(NULL, 'name, id');

		$this->view_data['js'] = array(
				base_url().'static/templates/backend/js/main.js'
		);

		$this->view_data['css'] = array(
				base_url().'third_party/checkbox/style.css'
		);
			
		$this->load->view('auth/group/edit', $this->view_data);
	}
}

/* End of file group.php */
/* Location: ./application/controllers/auth/group.php */
