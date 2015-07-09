<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Group Model
 *
 * @package XGO CMS v3.0
 * @subpackage Group
 * @link http://sunsoft.vn
*/

class Group_model extends MY_Model{

	private $group_info = FALSE;

	public function __construct(){
		parent::__construct();
		$this->table_name = 'groups';
	}

	public function get_select_box(){
		$group_data = $this->find_by(array("active"=>1), "id, title");
		$group_list = array(
				'' => '',
		);
		foreach($group_data as $item){
			$group_list[$item->id] = $item->title;
		}

		return $group_list;
	}

	public function has_right($group_id, $role_id, $permission_id){
		$group_info = $this->get_group_info($group_id);
		if(isset($group_info['role_list']['id'][$role_id]) && in_array($permission_id, $group_info['role_list']['id'][$role_id])){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function get_group_info($group_id){
		if($this->group_info===FALSE){
			$this->db->select('groupright.role_id, groupright.permission_id, role.code as role_code, permission.code as permission_code');
			$this->db->from('groupright');
			$this->db->join('role', 'role.id = groupright.role_id');
			$this->db->join('permission', 'permission.id = groupright.permission_id');
			$this->db->where('group_id', $group_id);
			$this->db->group_by('role.id, permission_id');
			$query 		= $this->db->get();
			$group_info = array();
			foreach($query->result() as $item){
				$group_info['role_list']['code'][$item->role_code][] 	= $item->permission_code;
				$group_info['role_list']['id'][$item->role_id][] 	  	= $item->permission_id;
			}
			$this->set_group_inf($group_info);
			return $group_info;
		}else{
			return $this->group_info;
		}
	}
	
	public function get_role_list($group_id){
		//array('group_id' => $item['group_id'])
		$this->db->select('role.title as role_title, permission.name as permission_name, role.id as role_id, permission.code as permission_code');
		$this->db->from('groupright');
		$this->db->join('role', 'role.id = groupright.role_id');
		$this->db->join('permission', 'permission.id = groupright.permission_id');
		$this->db->where('group_id', $group_id);
		$this->db->group_by('role.id, permission_id');
		$query = $this->db->get();
		$query_result = $query->result();

		$role_list = array();
		foreach($query_result as $k=>$item){
			$role_list['title'][$item->role_id]	= "<strong>".$item->role_title."</strong>";
			$role_list['permission'][$item->permission_code][$item->role_id]	= '<span class="checkbox_checked checkbox_toggle" ref="1__1"></span>';
			//$role_list['permission'][$item->permission_code] = 1;
			//$role_list[$item->role_id]['title'] = $item->role_title;
			//$role_list[$item->role_id]['permission'][$item->permission_code] = 1;
		}
		
		foreach($role_list['title'] as $k=>$item){
			if(!isset($role_list['permission']['view'][$k])){
				$role_list['permission']['view'][$k] = '<span class="checkbox_unchecked checkbox_toggle" ref="2__33""></span>';
			}
			if(!isset($role_list['permission']['add'][$k])){
				$role_list['permission']['add'][$k] = '<span class="checkbox_unchecked checkbox_toggle" ref="2__33""></span>';
			}
			if(!isset($role_list['permission']['edit'][$k])){
				$role_list['permission']['edit'][$k] = '<span class="checkbox_unchecked checkbox_toggle" ref="2__33""></span>';
			}
			if(!isset($role_list['permission']['delete'][$k])){
				$role_list['permission']['delete'][$k] = '<span class="checkbox_unchecked checkbox_toggle" ref="2__33""></span>';
			}
		}
		ksort($role_list['permission']['view']);
		ksort($role_list['permission']['add']);
		ksort($role_list['permission']['edit']);
		ksort($role_list['permission']['delete']);

// 		$role_list = '';
// 		foreach($role_list_array as $item){
// 			if(substr($item, strlen($item)-2, strlen($item))==', '){
// 				$item = substr($item, 0, strlen($item)-2);
// 			}
// 			$role_list.= $item.'<br/>';
// 		}
		return $role_list;
	}

	public function set_group_inf($group_info){
		return $this->group_info = $group_info;
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
						'name' => 'title',
						'label' => $this->lang->line('group_title'),
						'width' => '30%',
						'sort'  => 'ASC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'role',
						'label' => $this->lang->line('group_role'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => false
				),
				array(
						'name' 	=> 'permission_view',
						'label' => $this->lang->line('view'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => false
				),
				array(
						'name' 	=> 'permission_add',
						'label' => $this->lang->line('add'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => false
				),
				array(
						'name' 	=> 'permission_add',
						'label' => $this->lang->line('edit'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => false
				),
				array(
						'name' 	=> 'permission_delete',
						'label' => $this->lang->line('delete'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => false
				),
				array(
						'name'  => 'button',
						'width' => '5%',
						'sort'  => FALSE,
						'label'  => $right['add']==TRUE?'<div class="btn-group">
						<a style="width: 82px;" href="'.site_url('auth/group/index/add').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':"",
						'searchoptions' => false
				)
		);
	}

	public function json_data($controller, $right){
		$this->datatables
		->select('title, id')
		->from($this->table_name)->where('active = 1');
		//->unset_column('id');

		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$role_list = $this->get_role_list($item['id']);
			//print_r($role_list);
			//exit();
			$ouput['aaData'][] = array(
					$item['title'],
					'<div style="height:30px">'. implode('</div><div style="height:30px">', $role_list['title']) . '</div>',
					'<div style="height:30px">'. implode('</div><div style="height:30px">', $role_list['permission']['view']) . '</div>',
					'<div style="height:30px">'. implode('</div><div style="height:30px">', $role_list['permission']['add']) . '</div>',
					'<div style="height:30px">'. implode('</div><div style="height:30px">', $role_list['permission']['edit']) . '</div>',
					'<div style="height:30px">'. implode('</div><div style="height:30px">', $role_list['permission']['delete']) . '</div>',
					$this->add_button($controller, $right, $item),
			);
		}

		return json_encode($ouput);
	}


}

/* End of file group_model.php */
/* Location: ./application/models/group_model.php */