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
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('group_model');
                $this->load->model('role_model');
                $this->set_controller('role');
                $this->set_model($this->role_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
	}
        
        public function trashAll(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
               $trash   = explode(",", $this->input->post('id'));
               foreach($trash as $key => $vals){
                   $this->role_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - RoleID = '.$this->input->post('id'));
               die("1");
            }
        }
        
	protected function update($id=NULL){

		$this->view_data["role"] 			= new stdClass();
		$this->view_data["role"]->title			= $this->input->post('role_title');
		$this->view_data["role"]->description           = $this->input->post('role_description');
		$this->view_data["role"]->code			= $this->input->post('role_code');

		if($this->input->server('REQUEST_METHOD')=='POST'){
			$this->load->helper('form');
			$this->load->helper('character');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
			//require field and xss clean
			$rules = array(
					array(
							'field'   => 'role_title',
							'label'   =>  $this->lang->line('role_title'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					),
					array(
							'field'   => 'role_description',
							'label'   => $this->lang->line('role_description'),
							'rules'   => 'trim|required|max_length[255]|xss_clean'
					),
					array(
							'field'   => 'role_code',
							'label'   => $this->lang->line('role_code'),
							'rules'   => 'trim|required|max_length[100]|xss_clean'
					)
			);

			$this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){					
                            if($id){
                                //edit data
                                $this->role_model->update($this->view_data["role"], $id);
                                $logAction                              = '[UpdateRoleSuccess] '.$this->lang->line('update_role_success');
                            }else{
                                $this->role_model->create($this->view_data["role"]);
                                $logAction                              = '[AddRoleSuccess] '.$this->lang->line('add_role_success');
                            }

                            if($logAction){
                                $this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
                                $this->adminlog($logAction);
                                redirect('auth/role');
                            }
			}

		}
		
                if($id>0){
                    $role_query			= $this->role_model->find_by(array('id' => $id));

                    if(!isset($role_query[0])){
                        $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                        redirect(site_url('auth/role'));
                        exit();
                    }
                }
                if(isset($role_query)){
                    $role = $role_query[0];
                } else {
                    $role = $this->view_data['role'];
                }

                $this->smarty->assign(array(
                    'role'          =>  $role,
                    'js'            =>  array(
                            base_url().'static/templates/backend/js/main.js'
                    ),
                    'css'           =>  array(

                    ),
                    'segment'       =>  $this->uri->segment(4),
                    'validation'    =>  validation_errors()
                ));

                $this->smarty->display('auth/role/edit');
	}
}

/* End of file role.php */
/* Location: ./application/controllers/auth/role.php */
