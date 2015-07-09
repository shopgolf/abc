<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Permission Model
 *
 * @package XGO CMS v3.0
 * @subpackage permission
 * @link http://sunsoft.vn
 */

class Permission_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'permission';
	}	

}

/* End of file permission_model.php */
/* Location: ./application/models/permission_model.php */