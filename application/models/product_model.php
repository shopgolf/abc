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
				),array(
						'name' 	=> 'product_code',
						'label' => $this->lang->line('product_code'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' => 'product_name',
						'label' => $this->lang->line('product_name'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' => 'price',
						'label' => $this->lang->line('price'),
						'width' => '10%',
						'sort'  => 'desc',
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'image',
						'label' => $this->lang->line('image'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name'  => 'button',
						'width' => '10%',
						'sort'  => FALSE,
						'label'  => $right['add']==TRUE?'<div class="btn-group">
						<a style="width: 82px;" href="'.site_url('').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':'',
						'searchoptions' => false
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("id,product_code,product_name,net_price,image")
		->from($this->table_name.' AS tbl');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        $item['id'],
                        $item['product_code'],
                        $item['product_name'],
                        $this->bookinglib->my_number_format($item['net_price'],2, ',', ','),
                        '<img style="width:40%" src="'.$item['image'].'" />',
                        $this->add_button($controller, $right, $item)
                    );
		}
	
		return json_encode($ouput);
	}

}