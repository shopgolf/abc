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
						'width' => '10%',
						'sort'  => FALSE,
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
						'label'  => $this->lang->line('action'),
						'searchoptions' => FALSE
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("id,product_code,product_name,net_price,image")
		->from($this->table_name);
	
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
                        '<img style="width:40%" src="/'.UPLOAD_DIR.'/product/'.$img[0].'" />',
                        $this->add_button($controller, $right, $item)
                    );
		}
	
		return json_encode($ouput);
	}

	public function new_product($limit = FALSE, $offset = FALSE, $order_by = NULL,$param = NULL){
		if($limit){
			if(!$offset){
				$this->db->select("id,seo_url,product_name,net_price,image,product_code");
				if(!empty($param)){
					$this->db->order_by($param,$order_by);
				}
				$this->db->limit($limit);
				$query = $this->db->get($this->table_name);
				return $query->result();
			}else{
				$this->db->select("id,seo_url,product_name,net_price,image,product_code");
				if(!empty($param)){
					$this->db->order_by($param,$order_by);
				}
				$this->db->limit($limit, $offset);
				$query = $this->db->get($this->table_name);
				return $query->result();
			}
		}else{	
			return false;
		}
	}

}