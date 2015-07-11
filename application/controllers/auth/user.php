<?php
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  User Controller
 *
 * @package XGO CMS v3.0
 * @subpackage user
 * @link http://sunsoft.vn
 */

class User extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('user');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('user_model');
			$this->load->model('group_model');
			$this->set_controller('user');
			$this->set_model($this->user_model);
		}
	}

	/**
	 *
	 * @param type $id
	 */
	protected function update($id=NULL){
		$this->view_data["user"] 				= new stdClass();
		$this->view_data["user"]->id	 		= $id;
		$this->view_data["user"]->username		= $this->input->post('username');
		$this->view_data["user"]->email			= $this->input->post('email');
		$this->view_data["user"]->active		= $this->input->post('active');
		$this->view_data["user"]->group_id		= $this->input->post('group_id');
		
		$this->view_data["user"]->firstname		= $this->input->post('firstname');
		$this->view_data["user"]->lastname		= $this->input->post('lastname');
		$this->view_data["user"]->address		= $this->input->post('address');
		$this->view_data["user"]->phone			= $this->input->post('phone');
		$this->view_data["user"]->image			= $this->input->post('image');
		$this->view_data["user"]->gender		= $this->input->post('gender');
		$this->view_data["user"]->language_id           = $this->input->post('language_id');
                $this->view_data["user"]->agent_code            = $this->input->post('agent_code');
		
		if($this->input->server('REQUEST_METHOD')=='POST'){
			// Validate form.
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');

			//add customer
			$rules = array(
                                        array(
						'field'   => 'agent_code',
						'label'   => $this->lang->line('agent_code'),
						'rules'   => 'trim|numeric|max_length[10]|xss_clean'
					),
					array(
						'field'   => 'email',
						'label'   =>  $this->lang->line('user_email'),
						'rules'   => 'trim|required|max_length[150]|xss_clean|email'
					),
					array(
						'field'   => 'active',
						'label'   => $this->lang->line('user_status'),
						'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					),
					array(
						'field'   => 'group_id',
						'label'   =>  $this->lang->line('user_group'),
						'rules'   => 'trim|required|numeric|max_length[2]|xss_clean'
					),
					array(
						'field'   => 'language_id',
						'label'   =>  $this->lang->line('user_language'),
						'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					),
					array(
						'field'   => 'gender',
						'label'   =>  $this->lang->line('user_gender'),
						'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					),
					array(
						'field'   => 'image',
						'label'   =>  $this->lang->line('user_image'),
						'rules'   => 'trim|max_length[200]|xss_clean'
					),
					array(
						'field'   => 'phone',
						'label'   =>  $this->lang->line('user_phone'),
						'rules'   => 'trim|max_length[25]|xss_clean'
					),
					array(
						'field'   => 'address',
						'label'   =>  $this->lang->line('user_address'),
						'rules'   => 'trim|max_length[250]|xss_clean'
					),
					array(
						'field'   => 'lastname',
						'label'   =>  $this->lang->line('user_lastname'),
						'rules'   => 'trim|max_length[150]|xss_clean'
					),
					array(
						'field'   => 'firstname',
						'label'   =>  $this->lang->line('user_firstname'),
						'rules'   => 'trim|max_length[150]|xss_clean'
				)
			);

			$password 		= $this->input->post("password");
			$re_password 	= $this->input->post("re_password");

			if(!$id>0){
				$rules[] =	array(
						'field'   => 'username',
						'label'   => $this->lang->line('user_username'),
						'rules'   => 'callback_check_username|required|xss_clean'
				);
			}

			if($password!=NULL||!$id>0){
				$rules[] =	array(
						'field'   => 'password',
						'label'   => $this->lang->line('user_password'),
						'rules'   => 'required|xss_clean'
				);

				$rules[] =	array(
						'field'   => 're_password',
						'label'   => $this->lang->line('user_re_password'),
						'rules'   => 'callback_re_password_check|xss_clean'
				);
			}

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){
					
				if(!$id>0){
					$this->view_data["user"]->username = $this->input->post('username');
				}

				if($password!=NULL){
					$this->load->helper('character_helper');					
					$salt	  								= password_salt();
					$this->view_data["user"]->password 		= password_hashs($this->input->post("password"), $salt);
					$this->view_data["user"]->salt 			= $salt;
				}

				if($id>0){
					$this->view_data["user"]->editor_id 	= 	$this->user_model->get_user_id();
					$this->view_data["user"]->updated 		= 	$this->datetime;
					$this->user_model->update($this->view_data["user"], $id);
                                        $logAction = 'Cập nhật thông tin thành công cho user :'.$this->view_data["user"]->username;
				}else{
					$this->view_data["user"]->creator_id 	= 	$this->user_model->get_user_id();
					$this->view_data["user"]->created		=	date('Y-m-d H:i:s');
					$id = $this->user_model->create($this->view_data["user"]);
                                        $logAction = 'Tạo user mới thành công :'.$this->view_data["user"]->username;
				}

				$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
                                
                                
                                
				if($this->input->post('submit')=='create'){
                                        $paramAdminLog = array(
                                                'userid'            => $this->session->userdata['user_id'],
                                                'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                                'ip'                => $_SERVER['REMOTE_ADDR'],
                                                'logAction'         => $logAction,
                                                'agent_code'        => $this->session->userdata['agent_code']
                                            );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
					redirect('auth/user/index/add');
				}else{
                                        $paramAdminLog = array(
                                            'userid'            => $this->session->userdata['user_id'],
                                            'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                            'ip'                => $_SERVER['REMOTE_ADDR'],
                                            'logAction'         => $logAction,
                                            'agent_code'        => $this->session->userdata['agent_code']
                                        );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
					redirect('auth/user/index/edit/'.$id);
				}
			}
		}

		$this->load->model('language_model');
		if($id>0){
			$user_query			= $this->user_model->find_by(array('id' => $id));
			
			if(!isset($user_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/user'));
				exit();
			}
			$this->view_data['user']		= $user_query[0];
		}

		$this->view_data['js'] = array(
				base_url().'static/templates/backend/js/md5.js',
				base_url().'static/templates/backend/js/main.js'
		);

		$this->load->view('auth/user/edit', $this->view_data);
	}

	public function check_username($username){
		$this->load->model('user_model');
		$user_query = $this->user_model->find_by(array('username' => $username));
		if(isset($user_query[0]) && $user_query[0]->id > 0){
			$this->form_validation->set_message('check_username', $this->lang->line('user_username_exists'));
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function re_password_check($re_password){
		$password = $this->input->post('password');
		if($re_password != $password) {
			$this->form_validation->set_message('re_password_check', $this->lang->line('user_re_password_error'));
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/auth/user.php */
