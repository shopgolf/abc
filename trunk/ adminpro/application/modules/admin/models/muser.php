<?php
class Muser extends MY_Model{
	public $table = 'tbl_users';
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
	// add news user 
	public function add_user($data){
		$this->db->insert($this->table,$data);
	}
	public function list_user($limit,$start,$field){
		$this->db->join('tbl_role','tbl_users.user_role=tbl_role.role_id');
		$this->db->order_by("id","desc");
		return $this->all($limit,$start,$field);
	}
	//delete record
	public function del_user($id){
		$this->db->where('id',$id);
		$this->db->where('id !=',"1");
		$this->db->delete($this->table);
	}
	// this is the get account function
	public function get_user($id){
		$this->db->where('id',$id);
		$result = $this->db->get($this->table);
		return $result->row_array();
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
}