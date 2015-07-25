<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Determine if user is authenticated.
	 *
	 * @return type
	 */
	protected function is_logged_in(){
		$session_data = $this->session->all_userdata();
		return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && isset($session_data['logged_in']) && $session_data['logged_in'] == TRUE);
	}

	/**
	 * Determine if logged in user is admin.
	 *
	 * @return type
	 */
	protected function is_admin(){
		$session_data = $this->session->all_userdata();
		return (isset($session_data['is_admin']) && $session_data['is_admin'] == 1);
	}

	/**
	 * Utility method for creating UUIDs.
	 *
	 * @return type
	 */
	protected function create_uuid(){
		$uuid_query = $this->db->query('SELECT UUID()');
		$uuid_rs = $uuid_query->result_array();
		return $uuid_rs[0]['UUID()'];
	}

	/**
	 * Utility method for sending emails.
	 *
	 * @param type $to
	 * @param type $subject
	 * @param type $message
	 */
	protected function send_mail($to, $subject, $message){
		$this->load->library('email');
		$this->email->from($this->config->item('from_email_address'));
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}

	/**
	 * Utility method for determining if the request is a POST.
	 *
	 * @return type
	 */
	protected function is_method_post(){
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
	
	protected function check_role(){
		$role_code = $this->uri->rsegment(1);
		$permission_code = $this->uri->rsegment(3);
		$permission_code = $permission_code=='0' || $permission_code==NULL 
							? 'view' : $permission_code;
		if(isset($this->user_model)){
			return $this->user_model->has_right_code($this->user_model->get_user_id(), $role_code, $permission_code);
		}else{
			return FALSE;
		}
	}
}