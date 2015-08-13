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
        
        public function listTadBotHome(){
                $this->db->select("count(*), cat.id,cat.name, cat.seo_url AS cat_url");
                $this->db->from($this->table_name." AS tbl");
                $this->db->join("px_category AS cat","cat.id = tbl.category","LEFT");
                $this->db->group_by("tbl.category");
                $this->db->having("count(*) >= 12");
                
                $query = $this->db->get();
                return $query->result();
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
						'width' => '15%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' => 'price',
						'label' => $this->lang->line('price'),
						'width' => '5%',
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
						'width' => '6%',
						'sort'  => FALSE,
						'label'  => $this->lang->line('action'),
						'searchoptions' => FALSE
				)
		);
	}
	
	public function json_data($controller, $right){
                if($this->session->userdata('s_product')){
                    $arr_status = json_decode($this->session->userdata('s_product'));
                }
                
		$this->datatables
		->select("tbl.id,tbl.product_code,tbl.product_name,tbl.net_price,tbl.image")
		->from($this->table_name.' AS tbl');
                
                if(isset($arr_status) && $arr_status->product_name != ''){
                    $this->datatables->where('tbl.product_name REGEXP ("'.$arr_status->product_name.'")');
                }
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
                $this->session->unset_userdata('s_product');
                
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

	public function new_product($field = array(), $limit = FALSE, $offset = FALSE, $order_by = NULL,$param = NULL,$where=array()){
		if(!empty($field))
		{
			if($limit)
			{
				if(!$offset){
					$this->db->select($field);
					$this->db->where($where);
					if(!empty($param))
					{
						$this->db->order_by($param,$order_by);
					}
					$this->db->limit($limit);
					$query = $this->db->get($this->table_name);
					//pre($this->db->last_query());
					return $query->result();
				}else
				{
					$this->db->select($field);
					$this->db->where($where);
					if(!empty($param))
					{
						$this->db->order_by($param,$order_by);
					}
					$this->db->limit($limit, $offset);
					$query = $this->db->get($this->table_name);
					return $query->result();
				}
			}else
			{	
				return false;
			}
		}
	}
	
	public function get_rows($id){
		if(!empty($id)){
			$this->db->select('product_name,image,category,net_price,final_price,info,tag,view,checkout,keyword,description,product_code');
			$this->db->where('id',$id);
			$query = $this->db->get($this->table_name)->row();
			return $query;
		}else{
			return false;
		}
	}
}