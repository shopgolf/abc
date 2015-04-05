<?php
class Muser extends MY_Model{
	public $table = 'tbl_users';
	public $key   = 'id';
	public function __construct(){
		parent:: __construct();
		
	}

	//check from login
	public function check_login($user,$pass){
		$this->db->where('user_name',$user);
		$this->db->where('user_password',md5($pass));
		$result = $this->db->get($this->table);
		$info = $result->row_array();
		if($result->num_rows() == 0){
			return FALSE;
		}else if($info['user_activation'] == 2){
			return "notactive";
		}else{
			return $result->row_array();
		}
	}

	// check user and email add user
	public function check_user($user,$id = ''){
		if($id != ''){			
			$this->db->where('id !=',$id);
		}
		$this->db->where('user_name',$user);
		$result = $this->db->get($this->table);
		return($result->num_rows() == 0) ? true : false;
	}

	public function check_email($email,$id = ''){
		if($id != ''){
			$this->db->where('id !=',$id);
		}
		$this->db->where('user_email',$email);
		$result = $this->db->get($this->table);
		return($result->num_rows() == 0) ? true : false;
	}	

	//this is rand string activation key
	public function rand_string($length) {
        $str = '';
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, $size - 1)];
        }
        return $str . microtime();
    }
    
    public function save($id=false,$data=array()){
    	if(!$id){
    		return $this->insert($this->table,$data);
    	}
    	$result = $this->update($id,$data);
    	if($result){
    		return $id;
    	}
    	return false;
    } 
}