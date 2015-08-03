<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Cronjob_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_product';
	}
        
        public function insertCategory($params){
            $this->db->insert('px_category',$params);
        }
        
        public function insertProduct($params){
            return $this->db->insert('px_product',$params);
        }

        public function cronCategory(){
            $sql = "select * from withoneoc_category_description GROUP BY category_id";
            $query  = $this->db->query($sql);
            return $query->result();
        }


        public function cronProduct(){//model = product_Code
                $this->db->select('wp.model,wp.product_id,wp.quantity,wp.image,wp.manufacturer_id,wp.price,wp.date_added,wp.date_modified, wpd.name,wpd.description,wpd.meta_keyword,wpd.meta_description,wpd.tag,wptc.category_id AS category');
                $this->db->from('withoneoc_product AS wp');
                $this->db->join('withoneoc_product_description AS wpd','wpd.product_id = wp.product_id','inner');
                $this->db->join('withoneoc_product_to_category AS wptc','wptc.product_id = wp.product_id','inner');

                $query = $this->db->get();
//                echo $this->db->last_query();exit;
                return $query->result();            
        }

        public function cronMaker(){
            $sql = "select * from withoneoc_manufacturer";
            $query  = $this->db->query($sql);
            return $query->result();
        }
        
        public function getProductFromImg($product_id){
                $this->db->select('image');
                $this->db->from('withoneoc_product_image');
                $this->db->where('product_id',$product_id);
                $query = $this->db->get();
                return $query->result();            
        }
}