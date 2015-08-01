<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Maker_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_maker';
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
						'name' => 'title',
						'label' => $this->lang->line('title'),
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
						'name' 	=> 'lastupdated',
						'label' => $this->lang->line('lastupdated'),
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
		->select("id,name,logo,lastupdated")
		->from($this->table_name.' AS tbl');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                $count = 1;
                
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        "<input type='checkbox' value='".$item['id']."' onclick=get_Checked_Checkbox_By_Name('checkCol') name='checkCol' id='checkCol' class='checkbox' />",
                        $item['name'],
                        $item['logo'],
                        date("d-m-Y H:i:s",$item['lastupdated']),
                        $this->add_button($controller, $right, $item),
                    );
		}
	
		return json_encode($ouput);
	}

	public function get_data(){
		$this->db->select('name,logo');
		$query = $this->db->get($this->table_name);
		return $query->result();
	}

}