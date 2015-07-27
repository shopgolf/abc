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
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('group_model');
                $this->load->model('user_model');
                $this->set_controller('user');
                $this->set_model($this->user_model);
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
                   $this->user_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - UserID = '.$this->input->post('id'));
               die("1");
            }
        }
        
	protected function update($id=NULL){
		$this->view_data["user"] 				= new stdClass();
                $this->view_data["user"]->username		= $this->input->post('user_username');
                $this->view_data["user"]->email			= $this->input->post('user_email');
                $this->view_data["user"]->active		= $this->input->post('user_active');
                $this->view_data["user"]->group_id		= $this->input->post('user_group');
                $this->view_data["user"]->firstname		= $this->input->post('user_firstname');
                $this->view_data["user"]->lastname		= $this->input->post('user_lastname');
                $this->view_data["user"]->address		= $this->input->post('user_address');
                $this->view_data["user"]->phone			= $this->input->post('phone');
                $this->view_data["user"]->image			= $this->input->post('user_image');
                $this->view_data["user"]->gender		= $this->input->post('user_gender');
                $this->view_data["user"]->createdTime		= date("Y-m-d H:i:s",time());
                $this->view_data["user"]->updatedTime		= date("Y-m-d H:i:s",time());
                $this->view_data["user"]->createdBy		= $this->session->userdata['user_id'];
                        
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        

			// Validate form.
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');

			//add customer
			$rules = array(
                                        array(
                                                'field'   => 'user_username',
                                                'label'   => $this->lang->line('user_username'),
                                                'rules'   => 'trim|max_length[150]|required|xss_clean'
                                        ),array(
						'field'   => 'user_email',
						'label'   =>  $this->lang->line('user_email'),
						'rules'   => 'trim|max_length[150]|xss_clean|email'
					),array(
						'field'   => 'user_password',
						'label'   => $this->lang->line('user_password'),
						'rules'   => 'trim|required|xss_clean'
                                        ),array(
						'field'   => 'user_re_password',
						'label'   => $this->lang->line('user_re_password'),
						'rules'   => 'trim|required|xss_clean'
                                        ),array(
						'field'   => 'user_active',
						'label'   => $this->lang->line('user_active'),
						'rules'   => 'required|trim|numeric|max_length[1]|xss_clean'
					),array(
						'field'   => 'user_group',
						'label'   =>  $this->lang->line('user_group'),
						'rules'   => 'trim|required|numeric|max_length[2]|xss_clean'
					),
					array(
						'field'   => 'user_gender',
						'label'   =>  $this->lang->line('user_gender'),
						'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					),
					array(
						'field'   => 'user_image',
						'label'   =>  $this->lang->line('user_image'),
						'rules'   => 'trim|max_length[200]|xss_clean'
					),
					array(
						'field'   => 'phone',
						'label'   =>  $this->lang->line('phone'),
						'rules'   => 'trim|max_length[25]|xss_clean'
					),
					array(
						'field'   => 'user_address',
						'label'   =>  $this->lang->line('user_address'),
						'rules'   => 'trim|max_length[250]|xss_clean'
					),
					array(
						'field'   => 'user_lastname',
						'label'   =>  $this->lang->line('user_lastname'),
						'rules'   => 'trim|max_length[150]|xss_clean'
					),
					array(
						'field'   => 'user_firstname',
						'label'   =>  $this->lang->line('user_firstname'),
						'rules'   => 'trim|max_length[150]|xss_clean'
				)
			);
                        
                        $password 		= $this->input->post("user_password");
                        $re_password            = $this->input->post("user_re_password");	
                        if($password != $re_password){
                            $rules[] =	array(
                                'field'   => 'user_re_password',
                                'label'   => $this->lang->line('user_re_password'),
                                'rules'   => 'trim|required|max_length[100]|xss_clean'
                            );
                        }
                        
			$this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
			$this->form_validation->set_rules($rules);
                        
			if ($this->form_validation->run()==TRUE){
                            
                                $this->load->helper('character_helper');					
                                $salt	  					= password_salt();
                                $this->view_data["user"]->password 		= password_hashs(md5($password), $salt);
                                $this->view_data["user"]->salt 			= $salt;
                               
                                if($id){
                                        //edit data
					$this->user_model->update($this->view_data["user"], $id);
                                        $logAction                              = '[UpdateUserSuccess] '.$this->lang->line('update_user_success');
				}else{
					$params                                 = $this->user_model->create($this->view_data["user"]);
                                        $logAction                              = '[AddUserSuccess] '.$this->lang->line('add_user_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/user');
				}
                        }
		}
                
		if($id>0){
			$user_query			= $this->user_model->find_by(array('id' => $id));
			
			if(!isset($user_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/user'));
				exit();
			}
		}
                if(isset($user_query)){
                    $user = $user_query[0];
                } else {
                    $user = $this->view_data['user'];
                }
                
                $this->smarty->assign(array(
                    'user'          =>  $user,
                    'group_list'    =>  $this->group_model->get_select_box(),
                    'active_list'   =>  $this->user_model->get_active_list(),
                    'js'            =>  array(
                        base_url().'static/templates/backend/js/main.js'
                    ),
                    'css'           =>  array(
                        
                    ),
                    'segment'       =>  $this->uri->segment(4),
                    'validation'    =>  validation_errors()
                ));

                $this->smarty->display('auth/user/edit');
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
