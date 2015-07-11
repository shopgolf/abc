<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Product_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_product';
	}
        
        public function init_data($right){
		return array(
                                array(
						'name' => 'id',
						'label' => $this->lang->line('number'),
						'width' => '2%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' => 'product_name',
						'label' => $this->lang->line('product_name'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'product_id',
						'label' => $this->lang->line('product_id'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' 	=> 'image',
						'label' => $this->lang->line('image'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("*")
		->from($this->table_name.' AS tbl');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        $item['id'],
                        $item['product_name'],
                        $item['product_id'],
                        $item['image']
                    );
		}
	
		return json_encode($ouput);
	}

}