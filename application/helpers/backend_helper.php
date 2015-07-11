<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_logged_username')) {
	function get_logged_username() {
		$ci = & get_instance();
		if($ci->database_connect_status){			
		  	$session_data = $ci->session->all_userdata();
			$ci->load->model('user_model');
			$user_info = $ci->user_model->find_by(array('id' => $session_data['user_id']));
			if(isset($user_info[0]) && isset($user_info[0]->username)){
				return $user_info[0]->username;
			}
		}
		return "";
	}
}
	
/* End of file paging_helper.php */
/* Location: ./helpers/paging_helper.php */
