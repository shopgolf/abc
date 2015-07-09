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

class Product_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_product';
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
						'name' 	=> 'product_id',
						'label' => $this->lang->line('product_id'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'image',
						'label' => $this->lang->line('image'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				)
		);
	}
	
	/*
	 * datatables data
	* return json
	*/
	public function json_data($controller, $right){
		$this->datatables
		->select('*')
		->from($this->table_name);
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$ouput['aaData'][] = array(
					$item['id'],
					$item['product_id'],
					$item['image']
			);
		}
	
		return json_encode($ouput);
	}
}