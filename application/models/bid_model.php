<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Hotdeal Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Bid_model extends MY_Model{
	
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
						'sort'  => 'DESC',
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
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'begin_time',
						'label' => $this->lang->line('begin_time'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'end_time',
						'label' => $this->lang->line('end_time'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name'  => 'button',
						'width' => '10%',
						'sort'  => FALSE,
						'label'  => $this->lang->line('action'),
						'searchoptions' => FALSE
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("checkout,id,product_code,product_name,net_price,image,begin_price,begin_time,end_time")
		->from($this->table_name);
                
                $this->datatables->where('bid',1);
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
		foreach($datatables['aaData'] as $item){
                    $img = json_decode($item['image']);
                    $ouput['aaData'][] = array(
                        "<input type='checkbox' value='".$item['id']."' onclick=get_Checked_Checkbox_By_Name('checkCol') name='checkCol' id='checkCol' class='checkbox' />",
                        $item['product_code'],
                        $item['product_name'],
                        $this->bookinglib->my_number_format($item['net_price'],2, ',', ','),
                        date("d-m-Y H:i:s",$item['begin_time']),
                        date("d-m-Y H:i:s",$item['end_time']),
                        $this->add_button('product', $right, $item)
                    );
		}
	
		return json_encode($ouput);
	}

}