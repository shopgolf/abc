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
	}
	// this is function get options
	public function get_option($name,$value){
		$record = $this->get_info_rule($name,$value);
		if(!empty($record)){
			$option_value = unserialize($record['option_value']);
			if ($option_value == false){
				$option_value = $records['option_value'];
			}
			return $option_value;
		}else{
			return null;
		}
	}
	//this is function update options
	
}

/* End of file options_model.php */
/* Location: ./application/modules/admin/models/options_model.php */