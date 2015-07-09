<?php if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Stats_user_model extends MY_Model{
	public function __construct(){
		parent::__construct();
		$this->table_name = 'stats_user';
	}
	
	/**
	 * datatables init
	 * return array
	 */
	public function init_data($right){
		$zones = $this->stats_zone_model->find_by(array(), 'id, name');
		$zone_list = array();
		foreach($zones as $item){
			$zone_list[] = array(
					'label'	=> $item->name,
					'value' => '='.$item->id,
			);
		}
		return array(
				array(
						'name' => 'username',
						'label' => $this->lang->line('stats_user_username'),
						'width' => '30%',
						'sort'  => 'ASC',
						'searchoptions' => array(
							'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'fullname',
						'label' => $this->lang->line('stats_user_fullname'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'email',
						'label' => $this->lang->line('stats_user_email'),
						'width' => '30%',
						'sort'  => FALSE,	
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'zone_id',
						'label' => $this->lang->line('stats_user_zone_id'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'select',
								'values' => json_encode($zone_list),

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
		->select('username,fullname,email,zone_id,id')
		->from($this->table_name);
		//->unset_column('id');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();		
		foreach($datatables['aaData'] as $item){
			$zones = $this->stats_zone_model->find_by(array('id' => $item['zone_id']), 'name');
			$ouput['aaData'][] = array(
					$item['username'],
					$item['fullname'],
					$item['email'],
					isset($zones[0])?$zones[0]->name:"",
					$this->add_button($controller, $right, $item),
			);
		}
	
		return json_encode($ouput);
	}
}

/* End of file stats_user_model.php */
/* Location: ./application/models/stats_user_model.php */