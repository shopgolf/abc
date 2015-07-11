<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{
	public $table_name;
		
	private $user_info = FALSE;
	
	public function __construct(){
		parent::__construct();
		$this->position_list = array(
			'slides'  		=> $this->lang->line('slides'),
			'middle'        => $this->lang->line('middle'),
			'top'           => $this->lang->line('top'),
			'left'          => $this->lang->line('left'),
			'popup_middle'  => $this->lang->line('popup_middle'),
			'top_left'      => $this->lang->line('top_left'),
			'right'         => $this->lang->line('right'),
			'top_right'     => $this->lang->line('top_right'),
			'bottom_right'  => $this->lang->line('bottom_right'),
			'bottom'  		=> $this->lang->line('bottom'),
			'popup'  		=> $this->lang->line('popup'),
		);
		$this->url_target_list = array(
			'normal' 	=> $this->lang->line('url_target_normal'),
			'_blank' 	=> $this->lang->line('url_target_blank'),
			'_top' 		=> $this->lang->line('url_target_top'),
			'popup' 	=> $this->lang->line('url_target_popup')
		);

		$this->active_list = array(
			'1'	=> $this->lang->line('active'),
			'0'	=> $this->lang->line('deactive'),			
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
	 * Get value by key.
	 *
	 * @return string
	 */
	public function get_value_by_key($key, $list){
		return isset($list[$key])?$list[$key]:"";
	}

	/**
	 * Get url_target list.
	 *
	 * @return array
	 */
	public function get_url_target_list(){
		return $this->url_target_list;
	}

	/**
	 * Get position_list name by position_list id.
	 *
	 * @return string
	 */
	public function get_position_list(){
		return $this->position_list;
	}

	/**
	 * Fetch all records.
	 *
	 * @return type
	 */
	public function fetch_all()
	{
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

	/**
	 * Paginate results.
	 *
	 * @param type $offset
	 * @param type $limit
	 * @return type
	 */
	public function paginate($limit = 10, $offset = 0)
	{
		$data = array();
		$this->db->limit($limit, $offset);
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	/**
	 * Find record by id.
	 *
	 * @param type $id
	 * @return type
	 */
	public function find_by($where = FALSE, $select = "*", $is_single_result = FALSE, $order_by=NULL, $limit=NULL)
	{	
                $this->db->cache_on();
		$this->db->select($select);
		if($order_by!=NULL){
			$query = $this->db->order_by($order_by['key'], $order_by['value']);
		}
                if($limit){
                    $this->db->limit($limit);
                }
		if($where!=FALSE){
			$where_values = array_values($where);
			$where_key    = array_keys($where);
			if(is_array($where_values[0])){
				$this->db->where_in($where_key[0], $where_values[0]);
				$query = $this->db->get($this->table_name);
			}else{
				$query = $this->db->get_where($this->table_name, $where);
			}
		}else{
			$query = $this->db->get($this->table_name);
		}

		return $is_single_result ? $query->row() : $query->result();
	}
	
	public function count_by($condition = FALSE) {				
		if($condition) {
			$this->db->where($condition);
		}
		
		$this->db->from($this->table_name);
		return $this->db->count_all_results();
	}

	/**
	 * Abstract record creation.
	 *
	 * @param array $data
	 * @return type
	 */
	public function create($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}

	/**
	 * Abstract recort update.
	 *
	 * @param array $data
	 * @param type $id
	 */
	public function update($data, $id)
	{
		$this->db->update($this->table_name, $data, array('id' => $id));
	}

	/**
	 * Abstract record deletion.
	 *
	 * @param type $id
	 */
	public function delete($data)
	{
		$this->db->delete($this->table_name, $data);
		//     echo $this->db->last_query();
		//     exit();
	}

	/**
	 * Utiltiy method to create a UUID.
	 *
	 * @return type
	 */
	protected function create_uuid()
	{
		$uuid_query = $this->db->query('SELECT UUID()');
		$uuid_rs = $uuid_query->result_array();
		return $uuid_rs[0]['UUID()'];
	}

	public function count() {
		return $this->db->count_all($this->table_name);
	}

	public function get_for_dropdownlist($id, $field)
	{
		$data = array();
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[$row->$id] = $row->$field;
			}
		}

		return $data;
	}

	/**
	 * check code exists and rebuild code
	 * return string
	 */
	public function extract_code(&$code, $orginal_code){
		$obj_query = $this->find_by(array('code' => $orginal_code), "id");
		if(isset($obj_query[0])){
			$this->extract_code($code, $orginal_code.$this->lang->line('code_suffix'));
		}else{
			$code = $orginal_code;
		}
	}

	public function last_id() {
		return $this->db->query("SELECT LAST_INSERT_ID() AS ID")->row();
	}

	public function has_right_code($user_id, $role_code, $permission_code){
		$role_list = $this->get_role_list($user_id);
		if(isset($role_list['code'][$role_code]) && in_array($permission_code, $role_list['code'][$role_code])){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_user_info($user_id){
		if($this->user_info === FALSE){
			$this->db->select('users.username, users.group_id, groupright.role_id, groupright.permission_id, role.code as role_code, permission.code as permission_code');
			$this->db->from('users');
			$this->db->join('groups', 'users.group_id = groups.id');
			$this->db->join('groupright', 'groups.id = groupright.group_id');
			$this->db->join('role', 'role.id = groupright.role_id');
			$this->db->join('permission', 'permission.id = groupright.permission_id');
			$this->db->where('users.id', $user_id);
			$query = $this->db->get();

			$role_list = array();
			$user_info = FALSE;
			foreach($query->result() as $item){
				$user_info['role_list']['code'][$item->role_code][] 	= $item->permission_code;
				$user_info['role_list']['id'][$item->role_id][] 	  	= $item->permission_id;
				$user_info['username']									= $item->username;
				$user_info['group_id']									= $item->group_id;
			}
			$this->set_user_info($user_info);
			return $user_info;
		}else{
			return $this->user_info;
		}
	}
	
	public function get_group_id($user_id=FALSE){
		if($user_id===FALSE){
			$user_id   = $this->get_user_id();
		}		
		$user_info = $this->get_user_info($user_id);
		return $user_info['group_id'];
	}
	
	public function set_user_info($user_info){
		return $this->user_info = $user_info;
	}
	
	public function get_role_list($user_id){
		if(!isset($this->user_info['role_list'])){
			$user_info = $this->get_user_info($user_id);
			return $user_info['role_list'];			
		}		
		return $this->user_info['role_list'];
	}
	
	/**
	 * Get user session data.
	 *
	 * @return type
	 */
	public function get_user_data(){
		return $this->session->all_userdata();
	}

	/**
	 * Get logged in user id.
	 *
	 * @return type
	 */
	public function get_user_id(){
		$session_data = $this->session->all_userdata();
		return $session_data['user_id'];
	}

	/**
	 * Get logged in username.
	 *
	 * @return string
	 */
	public function get_username($user_id=FALSE){
		
		if($user_id===FALSE){
			$user_id = $this->get_user_id();
		}
		
		if(!isset($this->user_info['username'])){
			$user_info = $this->get_user_info($user_id);
			if(isset($user_info['username'])){
				return $user_info['username'];
			}
			return '';
		}else{
			return $this->user_info['username'];
		}
		
	}

	private function stdclass_to_array($stdclass){
		$array = array();
		if(is_array($stdclass)){
			return $stdclass;
		}
		if(is_object($stdclass)){
			foreach($stdclass as $k=>$item){
				$array[$k] = $item;
			}
		}
		return $array;
	}

	protected function add_button($controller, $right, $item){
		$button = '';
		if($right['add']==TRUE || $right['delete']==TRUE){
			$button = '<div class="btn-group">';
			$button .= '<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">';
			$button .= $this->lang->line('action');
			$button .= '<span class="caret"></span>';
			$button .= '</a>';
			$button .= '<ul class="dropdown-menu">';
			if($right['edit']==TRUE){
				$button .= '<li><a href="'.site_url('auth/'.$controller.'/index/edit/'.$item['id']).'"><i class="icon-pencil"></i> '.$this->lang->line('edit').'</a> </li>';
			}
			if($right['delete']==TRUE){
				$button .= '<li><a data-toggle="modal" href="#delete_confirm" onclick="delete_confirm(\''.site_url('auth/'.$controller.'/index/delete/'.$item['id']).'\')"><i class="icon-remove"></i> '.$this->lang->line('delete').'</a></li>';
			}
			$button .= '</ul>';
			$button .= '</div>';
		}
		return $button;
	}
}