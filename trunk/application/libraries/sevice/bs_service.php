<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class  Bs_Service {
	private $wsusername = wsUserName;
	private $wspassword = wsPassword;		
	private $base_uri   = ID_URL;
	
	function __construct(){
		
	}	
	
	public function login($username,$password,$ip){
		$url  = $this->base_uri."api/api/checkLogin";
		$data  = array(
				'UserName'   => $username,
				'Password'   => $password,				
				'Ip'         => $ip,
				'wsUserName' => $this->wsusername,
				'wsPassword' => $this->wspassword,
				'Signature'  => md5($username.$password.$this->wsusername.$this->wspassword)
		);		
	
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
	
	public function quickRegister($username, $password, $ip,$source=NULL){
		$url  = $this->base_uri."api/api/quickRegister";
		$data  = array(
				'UserName'   => $username,
				'Password'   => $password,				
				'Ip'         => $ip,
                                'Source'         => $source,
				'wsUserName' => $this->wsusername,
				'wsPassword' => $this->wspassword,
				'Signature'  => md5($username.$password.$this->wsusername.$this->wspassword)
		);
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
	
	public function quick_register($username, $password, $email, $ip){			
		  $url  = $this->base_uri."api/api/register";		  
		  $data  = array(		     	      
		      'UserName'   => $username,
		      'Password'   => $password,
		      'Email'      => $email,
		      'Ip'         => $ip,
		  	  'wsUserName' => $this->wsusername,
		  	  'wsPassword' => $this->wspassword,
		  	  'Signature'  => md5($username.$email.$password.$this->wsusername.$this->wspassword)
		      );
		  
		  $result     = do_post_request($url, $data); // ignore ssl			  
	      return $result;
	}
	
	public function check_username($username,$ip) {
		$url  =  $this->base_uri."api/api/checkUserName";
	
		$data  = array(
				"UserName"			=> $username,
				"IP"                => $ip,
				"wsUserName"		=> $this->wsusername,
				"wsPassword"        => $this->wspassword,
				"Signature" 		=> md5($username.$this->wsusername.$this->wspassword)
		);
                
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
	
	public function validate_username($username) {	
		$url  =  $this->base_uri."api/api/userValidate";			
		
		$data  = array(
				"UserName"			=> $username,				
				"wsUserName"		=> $this->wsusername,
				"wsPassword"        => $this->wspassword,
				"Signature" 		=> md5($username.$this->wsusername.$this->wspassword)		
		);
		
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
	
	public function validate_email($email) {		
		$url  =  $this->base_uri."api/api/checkEmail";		
		$ip   = "";
		
		$data  = array(
				"Email"			 => $email,
				"Ip"             => $ip,
				"wsUserName"	 => $this->wsusername,
				"wsPassword"     => $this->wspassword,
				"Signature"      => md5($email.$this->wsusername.$this->wspassword)		
		);
		
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
	
	
	public function link_to_game($username,$server,$ip){
		$url  =  $this->base_uri."api_server/server/linkToGame";	
		$time =  time();	
		$data = array(
			"Server"	     => $server,
			"UserName"       => $username,
			"Time"           => $time,
			"Ip"             => $ip,
			"wsUserName"	 => $this->wsusername,
			"wsPassword"     => $this->wspassword,
			"Signature"      => md5($server.$username.$time.$this->wsusername.$this->wspassword)
		);	
		
		$result     = do_post_request($url, $data); // ignore ssl
		return $result;
	}
}