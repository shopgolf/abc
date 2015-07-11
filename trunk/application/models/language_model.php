<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  Language Model
 *
 * @package XGO CMS v3.0
 * @subpackage Language
 * @link http://sunsoft.vn
 */

class Language_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'language';
	}
	
	public function get_select_box(){
		$language_data = $this->find_by(FALSE, "id, title");
		$language_list = array();
		foreach($language_data as $item){
			$language_list[$item->id] = $item->title;
		}
		
		return $language_list;
	}

}

/* End of file language_model.php */
/* Location: ./application/models/language_model.php */