<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  Partner Model
 *
 * @package XGO CMS v3.0
 * @subpackage Partner
 * @link http://sunsoft.vn
 */

class Partner_model extends MY_Model{

	public function __construct(){
		parent::__construct();
		$this->table_name = 'partner';

		$this->active_list = array(
				''	=> '',
				'0'	=> $this->lang->line('deactive'),
				'1'	=> $this->lang->line('active'),
		);
	}

	public function get_select_box(){
		$partner_query 	= $this->find_by(FALSE, 'id, name');
		$partner_list	= array(
			0	=> '',
		);
		foreach($partner_query as $item){
			$partner_list[$item->id] = $item->name;
		}
		return $partner_list;
	}

	/**
	 * datatables init
	 * return array
	 */
	public function init_data($right){
		return array(
				array(
						'name' => 'name',
						'label' => $this->lang->line('partner_name'),
						'width' => '30%',
						'sort'  => 'ASC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'code',
						'label' => $this->lang->line('partner_code'),
						'width' => '40%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'homepage',
						'label' => $this->lang->line('partner_homepage'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),				
				array(
						'name'  => 'button',
						'width' => '10%',
						'sort'  => FALSE,
						'label'  => $right['add']==TRUE?'<div class="btn-group">
						<a style="width: 82px;" href="'.site_url('auth/partner/index/add').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':'',
						'searchoptions' => false
				)
		);
	}
	
	/*
	 * datatables data
	* return json
	*/
	public function json_data($controller, $right){
		$this->datatables
		->select('name,code,homepage,id')
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
					$item['homepage'],					
					$this->add_button($controller, $right, $item),
			);
		}
	
		return json_encode($ouput);
	}
}

/* End of file partner_model.php */
/* Location: ./application/models/partner_model.php */