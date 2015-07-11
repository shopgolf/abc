<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Group Model
 *
 * @package XGO CMS v3.0
 * @subpackage Group
 * @link http://sunsoft.vn
 */

class Groupright_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'groupright';
	}
}

/* End of file group_model.php */
/* Location: ./application/models/group_model.php */