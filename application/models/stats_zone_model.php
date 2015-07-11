<?php if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Stats_zone_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->table_name = 'stats_zone';
	}
	
	/**
	 * datatables init
	 * return array
	 */
	public function init_data($right){
	
		return array(
				array(
						'name' => 'name',
						'label' => $this->lang->line('stats_zone_name'),
						'width' => '30%',
						'sort'  => 'ASC',
						'searchoptions' => array(
							'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'code',
						'label' => $this->lang->line('stats_zone_code'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'hits',
						'label' => $this->lang->line('stats_zone_hits'),
						'width' => '20%',
						'sort'  => FALSE,	
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'hits',
						'label' => $this->lang->line('stats_zone_register'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				)
		);
	}
	
	/*
	 * datatables data
	* return json
	*/
	public function json_data($controller, $right){
		$this->datatables
		->select('name,code,hits,id')
		->from($this->table_name);
		//->unset_column('id');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$ouput['aaData'][] = array(
					$item['name'],
					$item['code'],
					$item['hits'],
					intval($this->count_by_zone($item['id'])),
			);
		}
	
		return json_encode($ouput);
	}
	
	public function count_by_zone($zone_id = 0) {
		$this->db->where('zone_id', $zone_id);
		$this->db->from('stats_user');
		return $this->db->count_all_results();
	}
}

/* End of file stats_zone_model.php */
/* Location: ./application/models/stats_zone_model.php */