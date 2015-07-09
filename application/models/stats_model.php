<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Stats Model
 *
 * @package XGO CMS v3.0
 * @subpackage stats
 * @link http://sunsoft.vn
 */

class Stats_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_checkout';
	}
        
        public function init_data($right){
		return array(
                                array(
						'name' => 'id',
						'label' => $this->lang->line('number'),
						'width' => '2%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'int',
						)
				),
				array(
						'name' => 'product_id',
						'label' => $this->lang->line('product_id'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' 	=> 'product_name',
						'label' => $this->lang->line('product_name'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'createdTime',
						'label' => $this->lang->line('createdTime'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'int',
						)
				),
                                array(
						'name' 	=> 'lastupdated',
						'label' => $this->lang->line('lastupdated'),
						'width' => '10%',
						'sort'  => FALSE
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("id,*")
		->from($this->table_name.' AS tbl')
                ->join('users','users.id = tbl.userid');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        $item['id'],
                        $item['product_id'],
                        $item['product_name'],
                        date("d-m-Y H:i:s",strtotime($item['createdTime'])),
                        date("d-m-Y H:i:s",strtotime($item['lastupdated'])),
//                        $this->add_button($controller, $right, $item),
                    );
		}
	
		return json_encode($ouput);
	}
}

/* End of file stats_model.php */
/* Location: ./application/models/stats_model.php */