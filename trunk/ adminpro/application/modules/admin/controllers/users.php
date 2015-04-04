<?php
	class Users extends My_Controller{
		public function __construct(){
			parent:: __construct();
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
			$this->load->model('muser');
			$this->load->model('role_model');
		}
		public function index(){
			$data['title']             = "Users";
			$data['page']              = "List";
			$data['color']             = "#e07901";
			$data['template']          = 'user/list_user';
			if($this->input->post('ajax',FALSE)){
			$config['base_url']        = base_url()."admin/users/index";
			$config['total_rows']      = $this->muser->count_all();
			$config['per_page']        = '1';
			$config['uri_segment']     = '4';
			$config['first_link']      = '<<';
			$config['last_link']       = '>>';
			$config['first_tag_open']  = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open']   = '<li>';
			$config['last_tag_close']  = '</li>';
			$config['prev_tag_open']   = '<li>';
			$config['prev_tag_close']  = '</li>';
			$config['next_tag_open']   = '<li>';
			$config['next_tag_close']  = '</li>';
			$config['num_tag_open']    = '<li>';
			$config['num_tag_close']   = '</li>';
			$config['next_link']       = 'Next';
			$config['prev_link']       = 'Prev';
			$config['cur_tag_open']    = '<li class="active"><a href="">';
			$config['cur_tag_close']   = '</a></li>';
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start                     = ($this->uri->segment(4))?$this->uri->segment(4):1;
			$param                     = array();
			$param['limit'][0]         = $config['per_page'];
			$param['limit'][1]         = $start;
			$data['result']  = $this->muser->get_list($param);
			//debug($data['result']); 
			$data['role']    = $this->role_model->get_role();
				exit(json_encode(array(
						'results'    => $data['result'],
						'pagination' => $this->pagination->create_links(),
						'role'		 => $data['role']  
					)
				));
			}
			$this->load->view("layout",$data);
		}

		public function add(){
			$data['template']          = 'user/add_user';
			$this->load->view("user/add_user",$data);
		}
	}