<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  User Model
 *
 * @package XGO CMS v3.0
 * @subpackage user
 * @link http://sunsoft.vn
 */

class User_model extends MY_Model{

	public function __construct(){
		parent::__construct();
		$this->table_name = 'users';

		$this->active_list = array(
				''	=> '',
				'0'	=> $this->lang->line('deactive'),
				'1'	=> $this->lang->line('active'),
		);
	}

	/**
	 * Get status list.
	 *
	 * @return array
	 */
	public function get_active_list(){
		return $this->active_list;
	}

	/**
	 * Get all users.
	 *
	 * @return type
	 */
	public function fetch_all()
	{
		$this->db->select('user.id, user.username, user.email_address, user.firstname, user.lastname, user.address, user.mobile, user.is_admin, user.is_active, user.created_at, user.last_logged_in, user.last_ip, IFNULL(COUNT(`album`.`id`), 0) as `total_albums`', FALSE)
		->from($this->table_name)
		->join('album', 'album.created_by = user.id', 'left')
		->group_by('user.id');
		$q = $this->db->get();

		return $q->result();
	}

	/**
	 * Authenticate user.
	 *
	 * @param array $data
	 * @return type
	 */
	public function authenticate(array $data)
	{
		$query = $this->db->get_where($this->table_name, array('username' => $data['username'], 'active' => 1));
		$user_id = 0;
		$is_valid = ($query->num_rows() > 0);		
		if ($is_valid == TRUE)
		{
			$salt 		= $query->row()->salt;
			$password 	= $query->row()->password;
			$user_id	= $query->row()->id;
                        $confirmPass = password_hashs($data['password'],$salt);
			if($confirmPass==$password){
				return $query->row();
			}else{			
				return false;
			}
		}

	}

	/**
	 * Find user by email address.
	 *
	 * @param type $email_address
	 * @return type
	 */
	public function get_by_email_address($email_address)
	{
		$q = $this->db->get_where($this->table_name, array('email_address' => $email_address));

		return $q->row();
	}

	/**
	 * Update last_ip column for user.
	 *
	 * @param type $user_id
	 * @return type
	 */
	public function update_last_ip($user_id)
	{
		$this->db->update($this->table_name, array('last_ip' => $this->input->ip_address()), array('id' => $user_id));

		return $user_id;
	}

	/**
	 * Update last_logged_in column for user.
	 *
	 * @param type $user_id
	 * @return type
	 */
	public function update_last_logged_in($user_id)
	{
		$now = date('Y-m-d H:i:s');
		$this->db->update($this->table_name, array('last_logged_in' => $now), array('id' => $user_id));

		return $user_id;
	}

	/**
	 * Update user's password.
	 *
	 * @param type $password
	 * @param type $user_id
	 * @return type
	 */
	public function update_password($password, $user_id)
	{
		$this->db->update($this->table_name, array('password' => $password), array('id' => $user_id));

		return $user_id;
	}


	/**
	 * Find user by username.
	 *
	 * @param type $username
	 * @return type
	 */
	public function get_by_username($username)
	{
		$q = $this->db->get_where($this->table_name, array('username' => $username));

		return $q->row();
	}

	/**
	 * Find username by id.
	 *
	 * @param type $id
	 * @return type
	 */
	public function get_username_by_id($id)
	{
		$q = $this->db->get_where($this->table_name, array('id' => $id));

		return is_object($q->row())?$q->row()->username:"";
	}

	public function get_active_code($active){
		$active = urldecode($active);
		$active = trim($active);

		foreach($this->active_list as $k=>$item){
			if($active==$item){
				return $k;
			}
		}
		return "";
	}
	
	public function get_active($active_id){
		return isset($this->active_list[$active_id])?$this->active_list[$active_id]:"";
	}

	public function get_gender_list(){
		return array(
				''	=> '',
				'0'	=> $this->lang->line('user_male'),
				'1'	=> $this->lang->line('user_female'),
		);
	}
	
	public function get_gender($gender){
		$gender_list = $this->get_gender_list();
		return isset($gender_list[$gender])?$gender_list[$gender]:"";
	}

	/**
	 * Get record by id.
	 *
	 * @param type $id
	 * @return type
	 */
	public function get_by_id($id)
	{
		$this->db->select("*");
		$query = $this->db->get_where($this->table_name, array($this->table_name.'.id' => $id));
		return $query->row();
	}

	public function init_data($right){
		$group = $this->group_model->find_by(array(), 'id, title');
		$group_list = array();
		foreach($group as $item){
			$group_list[] = array(
				'label'	=> $item->title,
				'value' => '='.$item->id,	
			);
		}
		
		return array(
				array(
						'name' => 'id',
						'label' => $this->lang->line('number'),
						'width' => '4%',
						'sort'  => 'DESC',
						'searchoptions' => FALSE
				),
                                array(
						'name' => 'username',
						'label' => $this->lang->line('user_username'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' 	=> 'email',
						'label' => $this->lang->line('user_email'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' 	=> 'gender',
						'label' => $this->lang->line('user_gender'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' 	=> 'active',
						'label' => $this->lang->line('user_active'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
                                array(
						'name' 	=> 'created',
						'label' => $this->lang->line('created'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
                                array(
						'name' => 'group_id',
						'label' => $this->lang->line('user_group'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name'  => 'button',
						'width' => '10%',
						'sort'  => FALSE,
						'label'  => '',
						'searchoptions' => false
				)
		);
	}

	public function json_data($controller, $right){
		$this->datatables
		->select('usr.username,usr.email,usr.gender,usr.active,usr.group_id,usr.id,usr.createdTime')
                ->from('users AS usr');
		//->unset_column('id');

		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$group = $this->group_model->find_by(array('id' => $item['group_id']), 'title');
			$ouput['aaData'][] = array(
                                        $item['id'],
					$item['username'],
					$item['email'],
					$this->get_gender($item['gender']),				
					$this->get_active($item['active']),
                                        $item['createdTime'],
					isset($group[0])?$group[0]->title:"",
					$this->add_button($controller, $right, $item),
			);
		}
		
		return json_encode($ouput);
	}
        
        public function insertUserAdminLog($params){
            $this->db->query("INSERT INTO px_adminlog (`userid`, `lastLogin`, `ip`,`logAction`) VALUES ('{$params['userid']}', '{$params['lastLogin']}', '{$params['ip']}','{$params['logAction']}')");
            return $this->db->affected_rows();
        }

}