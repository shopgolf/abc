<?php if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}
/**
 *  Home Controller
 *
 * @package XGO CMS v3.0
 * @subpackage home
 * @link http://sunsoft.vn
 */

class Home extends MY_Controller{

	public function __construct(){
		parent::__construct();
		require_once(APPPATH . 'modules/backend/autoload.php');
		$this->load->language('backend');
		$this->load->language('user');
	}

	/**
	 * Display login form.
	 */
	public function index(){
		if($this->is_logged_in() == TRUE){
			$this->session->set_flashdata('flash_message_error', $this->session->flashdata('flash_message_error'));
			redirect('auth/'.$this->config->item('admin_default_controller'));
		}else{
			$this->load->helper('form');
                        $this->load->library('smarty3');
                        $this->smarty = new CI_Smarty3();
                        
                        $this->smarty->assign(array(
                            'username'          =>  $this->session->flashdata('login_username'),
                            'login_error'       =>  $this->session->flashdata('login_error'),
                            'link_bk'           =>  base_url(),
                            'config'            =>  $this->config->config
                        ));
                        $this->smarty->display('auth/home/index');     
		}
		 
	}

	/**
	 * Process user authentication.
	 */
	public function authenticate(){
		if($this->database_connect_status){
			$this->load->model('user_model');
			$this->load->helper('character_helper');
				
			// Authenticate user.
			$this->load->helper('form');
			$login_data 	= array(
				'username'      => $this->input->post('username'), 
				'password'      => $this->input->post('password')
			);
			$user 			= $this->user_model->authenticate($login_data);
			
			if ( is_object($user) && $user->id > 0){
				// Create session var
                                $user->group_id     = $user->group_id;
				$this->create_login_session($user);
			
				$this->session->set_flashdata('flash_message', $this->lang->line('login_success'));
                                
                                /*
                                 * log admin
                                 */
                                $paramAdminLog          = array(
                                    'userid'            => $user->id,
                                    'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                    'ip'                => $_SERVER['REMOTE_ADDR'],
                                    'logAction'         => '[Login] '.$this->lang->line('login_success'),
                                );
                                $user 			= $this->user_model->insertUserAdminLog($paramAdminLog);
                                
				if($this->session->userdata('redirect_uri')!=""){
					redirect($this->session->userdata('redirect_uri'));
				}else{
					redirect('auth/'.$this->config->item('admin_default_controller'));
				}
			}else{
				$this->session->set_flashdata('login_error', $this->lang->line('login_error'));
				$this->session->set_flashdata('login_username', $this->input->post('username'));
				redirect(site_url('auth'));
			}
		}else{
			$this->session->set_flashdata('login_error', $this->lang->line('database_failed'));
			redirect(site_url('auth'));
		}
		
	}

	/**
	 * Process user logout.
	 */
	public function logout(){
                
               $paramAdminLog          = array(
                   'userid'            => $this->session->userdata['user_id'],
                   'lastLogin'         => date('Y-m-d :H:i:s',time()),
                   'ip'                => $_SERVER['REMOTE_ADDR'],
                   'logAction'         => '[Logout] '.$this->lang->line('logout_success')
               );
               $user 			= $this->user_model->insertUserAdminLog($paramAdminLog);
               
		$this->session->sess_destroy();
		redirect('auth');
	}

	/**
	 * Creates session data for logged in user.
	 *
	 * @param type $user
	 */
	protected function create_login_session($user){
		$session_data = array(
                    'email'             => $user->email,
                    'user_id'           => $user->id,
                    'user_name'         => $user->username,
                    'logged_in'         => TRUE,
                    'group_id'          => $user->group_id,
		);
		$this->session->set_userdata($session_data);
	}

	private function _is_logged_in(){
		$session_data = $this->session->all_userdata();
		return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && $session_data['logged_in'] == TRUE);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/auth/home.php */
