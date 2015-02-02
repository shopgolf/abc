<?php
class Login extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('muser');
	}

	public function index(){
		$data['title'] = 'Login Form';
		if(!empty($this->input->post('type'))){
			$user  = $this->fillter($this->input->post('username'));
			$pass  = $this->fillter($this->input->post('password'));
			$check = $this->muser->check_login($user,$pass);
			if($check == FALSE ){
				echo 'false';
			}elseif ($check === 'notactive') {
				echo 'notactive';
			}
			else{
				echo 'true';
				$session = array(
					'session_user'  => $check['user_name'],
					'session_level' => $check['user_role'],
				);
				$this->session->set_userdata($session);
			}	
		}else{
			$data['error'] = '';
			$this->load->view('login',$data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'admin/login');
	}

	public function fillter($str){
		$str = str_replace('<', "&lt;", $str);
		$str = str_replace('>', '&gt;', $str);
		$str = str_replace('&', '&amp;', $str);			
		$str = str_replace('|', '&brvbar;', $str);
		$str = str_replace('~', '&tilde;', $str);
		$str = str_replace('`', '&lsquo;', $str);
		$str = str_replace('#', '&curren;', $str);
		$str = str_replace('%', '&permil;', $str);
		$str = str_replace("'", '&rsquo;', $str);
		$str = str_replace('\'', '&quot;', $str);
		$str = str_replace('\\', '&frasl;', $str);
		$str = str_replace('--', '&ndash;&ndash;', $str);
		$str = str_replace('ar(', 'ar&Ccedil;', $str);
		$str = str_replace('Ar(', 'Ar&Ccedil;', $str);
		$str = str_replace('aR(', 'aR&Ccedil;', $str);
		$str = str_replace('AR(', 'AR&Ccedil;', $str);
		return htmlspecialchars($str);
	}
}