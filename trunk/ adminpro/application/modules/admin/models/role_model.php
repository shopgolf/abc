<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends MY_Model {
	public $table = 'tbl_role';
	public $key   = 'role_id';
	public function __construct(){
		parent:: __construct();
		
	}

	public function get_role(){	
		$param           = array();
		$param['select'] = array('role_id','role_name');
		return $this->get_list($param);
	}
}

/* End of file role_model.php */
/* Location: ./application/modules/admin/models/role_model.php */