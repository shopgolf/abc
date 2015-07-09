<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  Role Controller
 *
 * @package XGO CMS v3.0
 * @subpackage role
 * @link http://sunsoft.vn
 */

class Role extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('role');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('role_model');
			$this->set_controller('role');
			$this->set_model($this->role_model);
		}
	}

	/**
	 *
	 * @param type $id
	 */
	protected function update($id=NULL){

		$this->view_data["role"] 				= new stdClass();
		$this->view_data["role"]->title			= $this->input->post('title');
		$this->view_data["role"]->description	= $this->input->post('description');
		$this->view_data["role"]->code			= $this->input->post('code');

		if($this->input->server('REQUEST_METHOD')=='POST'){

			$this->load->helper('form');
			$this->load->helper('character');
				
			/**
			 * update field list
				title
				description
				code
			*/

			// Validate form.
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			//require field and xss clean
			$rules = array(
					array(
							'field'   => 'title',
							'label'   =>  $this->lang->line('role_title'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					),
					array(
							'field'   => 'description',
							'label'   => $this->lang->line('role_description'),
							'rules'   => 'trim|xss_clean'
					),
					array(
							'field'   => 'code',
							'label'   => $this->lang->line('role_code'),
							'rules'   => 'trim|required|max_length[100]|xss_clean'
					)
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){
				if($id>0){
					$this->view_data["role"]->editor_id             = 	$this->role_model->get_user_id();
					$this->view_data["role"]->updated 		= 	$this->datetime;
					$this->role_model->update($this->view_data["role"], $id);
					unset($this->view_data["role"]);
                                        $logAction  =   'Cập nhật phân quyền(role) thành công, id = '.$id;
				}else{
					$this->view_data["role"]->creator_id            = 	$this->role_model->get_user_id();
					$this->view_data["role"]->created		=	$this->datetime;
					$id = $this->role_model->create($this->view_data["role"]);
                                        $logAction  =   'Tạo mới phân quyền(role) thành công, id = '.$id;
				}

				if($id>0){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
                                        $paramAdminLog  = array(
                                            'userid'            => $this->session->userdata['user_id'],
                                            'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                            'ip'                => $_SERVER['REMOTE_ADDR'],
                                            'logAction'         => $logAction
                                        );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
					redirect('auth/role/index/edit/'.$id);
				}else{
                                    //ko co truong hop nao $id < 0 ... neu co se redirect ra role
					redirect('auth/role/');
				}
			}

		}
		$this->load->model('partner_model');
		$this->load->model('language_model');

		if($id>0){
			$role_query	= $this->role_model->find_by(array('id' => $id));
			if(!isset($role_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/role'));
				exit();
			}
			$this->view_data['role']				= $role_query[0];
		}else{
			$this->view_data["role"]->id	 		= $id;
		}

		$this->view_data['js'] = array(
				base_url().'static/templates/backend/js/main.js'
		);

		$this->view_data['css'] = array(
		);
			
		$this->load->view('auth/role/edit', $this->view_data);
	}
}

/* End of file role.php */
/* Location: ./application/controllers/auth/role.php */
