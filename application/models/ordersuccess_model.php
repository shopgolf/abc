<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Ordersuccess_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_checkout';
	}
        
        public function init_data($right){
		return array(
                                array(
						'name' => 'id',
						'label' => '',
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
						'width' => '3%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' => 'quantity',
						'label' => $this->lang->line('quantity'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
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
		->select("tbl.id,tbl.product_code,tbl.quantity,pt.image,pt.product_name,pt.net_price")
		->from($this->table_name.' AS tbl')
                ->join('px_product AS pt','pt.product_id = tbl.product_id','left')
                ->where('tbl.status',1);
	
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
                        $item['quantity'],
                        '<img style="width:40%" src="/'.UPLOAD_DIR.'/product/'.$img[0].'" />',
                        //$this->add_button($controller, $right, $item)
                    );
		}
	
		return json_encode($ouput);
	}

}