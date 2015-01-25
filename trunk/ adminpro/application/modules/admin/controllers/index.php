<?php
	class Index extends My_Controller{
		public function __construct(){
			parent:: __construct();
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}
		public function index(){
			$data['title']      = "Home";
			$data['breadcrumb'] = "Home";
			$data['oder']       = "";
			$data['template']   = 'home';
			$data['icon']       = "glyphicon glyphicon-info-sign";
			$data['intro']      = "Introduction";
			$this->load->view("layout",$data);
		}
	}