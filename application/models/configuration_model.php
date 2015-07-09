<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  Configuration Model
 *
 * @package XGO CMS v3.0
 * @subpackage Configuration
 * @link http://sunsoft.vn
 */

class Configuration_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'configuration';
	}
	
	/**
	 * datatables init
	 * return array
	 */
	public function init_data($right){
		
		return array(
				array(
						'name' => 'id',
						'label' => $this->lang->line('number'),
						'width' => '5%',
						'sort'  => 'DESC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'title',
						'label' => $this->lang->line('title'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'value',
						'label' => $this->lang->line('value'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),			
				array(
						'name'  => 'button',
						'width' => '5%',
						'sort'  => FALSE,
						'label' =>  $right['add']==TRUE?'<div class="btn-group">
						<a style="width: 82px;" href="'.site_url('auth/configuration/index/add').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':"",
						'searchoptions' => false
				)
		);
	}
	
	/*
	 * datatables data
	* return json
	*/
	public function json_data($controller, $right){
		$this->datatables
		->select('id,title,value')
		->from($this->table_name);
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$ouput['aaData'][] = array(
					$item['id'],
					$item['title'],
					$item['value'],
					$this->add_button($controller, $right, $item),
			);
		}
	
		return json_encode($ouput);
	}
}