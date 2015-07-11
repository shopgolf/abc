<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Role Model
 *
 * @package XGO CMS v3.0
 * @subpackage Role
 * @link http://sunsoft.vn
 */

class Role_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'role';
	}

	public function init_data($right){	
		return array(
				array(
						'name' => 'title',
						'label' => $this->lang->line('role_title'),
						'width' => '30%',
						'sort'  => 'ASC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'code',
						'label' => $this->lang->line('role_code'),
						'width' => '40%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),
				array(
						'name' 	=> 'description',
						'label' => $this->lang->line('role_description'),
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
						'label'  => $right['add']==TRUE?'<div class="btn-role">
						<a style="width: 82px;" href="'.site_url('auth/role/index/add').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':'',
						'searchoptions' => false
				)
		);
	}
	
	public function json_data($controller, $right){
		$this->datatables
		->select('title, code, description, id')
		->from($this->table_name)->where('active = 1');
		//->unset_column('id');
	
		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
			$ouput['aaData'][] = array(
					$item['title'],
					$item['code'],
					$item['description'],
					$this->add_button($controller, $right, $item),
			);
		}
	
		return json_encode($ouput);
	}

}

/* End of file role_model.php */
/* Location: ./application/models/role_model.php */