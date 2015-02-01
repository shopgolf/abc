<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @package		Adminpro
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
global $option_datas;

$option_datas = array();

class Options_model extends MY_Model {
	public $table = 'tbl_options';
	
	public function __construct(){
		parent:: __construct();
	}
	// this is function add options
	public function add_option($name,$value){
		$name = trim($name);
		if(is_array($value)){
			$serialize_value = serialize($value);
			$data            = array('option_name'=> $name,'option_value' => $value);
			$result          = $this->insert($data);
		}
		return $result;
	};
	public function get_option($name,$value){
		$name  = trim($name);
		$record = $this->get_info_rule($name,$value);
		if(!empty($record)){
			$option_value = $record[0]['option_value'];
		}
	};
}

/* End of file options_model.php */
/* Location: ./application/modules/admin/models/options_model.php */