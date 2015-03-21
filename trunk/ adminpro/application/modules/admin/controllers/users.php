<?php
	class Users extends My_Controller{
		public function __construct(){
			parent:: __construct();
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
			$this->load->model('muser');
		}
		public function index(){
			$data['title']    = "Users";
			$data['page']     = "List";
			$data['color']    = "#e07901";
			$data['template'] = 'user/list_user';
			$param            = array();
			$param['select']  = array('id,user_name,user_fullname,user_email,user_role,');
			$data['result']   = $this->muser->get_list($param['select']);
			//debug($result);
			$this->load->view("layout",$data);
		}
	}