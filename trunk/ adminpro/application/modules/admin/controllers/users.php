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
			$config['base_url']        = base_url()."admin/users/index";
			$config['total_rows']      = $this->muser->count_all();
			$config['per_page']        = !empty($this->input->post('data'))?$this->input->post('data'):'10';
			$config['uri_segment']     = '4';
			$config['first_link']      = '<<';
			$config['last_link']       = '>>';
			$config['first_tag_open']  = '<li class="click">';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open']   = '<li class="click">';
			$config['last_tag_close']  = '</li>';
			$config['prev_tag_open']   = '<li class="click">';
			$config['prev_tag_close']  = '</li>';
			$config['next_tag_open']   = '<li class="click">';
			$config['next_tag_close']  = '</li>';
			$config['num_tag_open']    = '<li class="click">';
			$config['num_tag_close']   = '</li>';
			$config['next_link']       = 'Next';
			$config['prev_link']       = 'Prev';
			$config['cur_tag_open']    = '<li class="active"><a>';
			$config['cur_tag_close']   = '</a></li>';
			$this->load->library("pagination");
			$this->pagination->initialize($config);
			$start                     = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param                     = array();
			$param['select']           = array('user_name','user_fullname','user_email','id','user_role','user_activation');
			if(!empty($this->input->post('action')) && $this->input->post('action') === 'view-status'){
				if(!empty($this->input->post('id'))){
					$id = (int)$this->input->post('id');
					$param['where'] = array(
						'user_activation' => $id,
					);
				}
			}
			$param['limit']            = array($config['per_page'] ,$start);	
			$data['result']            = $this->muser->get_list($param);
			//debug($data['result']);
			$data['role']              = $this->role_model->get_role();
			if($this->input->post('ajax',FALSE)){	
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
			$data['template'] = 'user/add_user';
			$this->load->view("user/add_user",$data);
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 1){
					$data['user_activation'] = 1;
					$this->muser->save($id,$data);
				}elseif($this->input->post('status') == 2){
					$data['user_activation'] = 2;
					$this->muser->save($id,$data);
				}
			}
		}
	}