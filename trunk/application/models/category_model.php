<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Category_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'px_category';
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
						'name' => 'username',
						'label' => $this->lang->line('username'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' 	=> 'logAction',
						'label' => $this->lang->line('status'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'ipaddress',
						'label' => $this->lang->line('ipaddress'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'int',
						)
				),
                                array(
						'name' 	=> 'lastLogin',
						'label' => $this->lang->line('lastupdated'),
						'width' => '10%',
						'sort'  => 'DESC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
                                array(
						'name' 	=> 'agent_code',
						'label' => $this->lang->line('agent_code'),
						'width' => '5%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select("users.username,tbl.id,tbl.logAction,tbl.lastLogin")
		->from($this->table_name.' AS tbl')
                ->join('users','users.id = tbl.userid');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
                $count = 1;
                
		foreach($datatables['aaData'] as $item){
			$ouput['aaData'][] = array(
					$count++,
					$item['username'],
					$item['logAction'],
                                        $item['ip'],
                                        date("d-m-Y H:i:s",strtotime($item['lastLogin'])),
					$this->add_button($controller, $right, $item),
			);
		}
	
		return json_encode($ouput);
	}

}