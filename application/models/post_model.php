<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Post_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_post';
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
						'name' 	=> 'title',
						'label' => $this->lang->line('title'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'seo_url',
						'label' => $this->lang->line('seo_url'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'lastupdated',
						'label' => $this->lang->line('lastupdated'),
						'width' => '10%',
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
		->select("id,title,seo_url,description,tag,owner,created,lastupdated")
		->from($this->table_name);
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        "<input type='checkbox' value='".$item['id']."' onclick=get_Checked_Checkbox_By_Name('checkCol') name='checkCol' id='checkCol' class='checkbox' />",
                        $item['title'],
                        $item['seo_url'],
                        $item['lastupdated'],
                        $this->add_button($controller, $right, $item)
                    );
		}
	
		return json_encode($ouput);
	}

	
	public function data_post($field = array(), $limit = FALSE, $offset = FALSE, $order_by = NULL,$param = NULL){
		if(!empty($field))
		{
			if($limit)
			{
				if(!$offset){
					$this->db->select($field);
					if(!empty($param))
					{
						$this->db->order_by($param,$order_by);
					}
					$this->db->limit($limit);
					$query = $this->db->get($this->table_name);
					return $query->result();
				}else
				{
					$this->db->select($field);
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
	
}