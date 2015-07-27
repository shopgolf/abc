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
						'name' => 'number',
						'label' => $this->lang->line('id'),
						'width' => '5%',
						'sort'  => 'DESC',
						'searchoptions' => FALSE
				),array(
						'name' => 'title',
						'label' => $this->lang->line('role_title'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name' 	=> 'code',
						'label' => $this->lang->line('role_code'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' =>FALSE
				),
				array(
						'name' 	=> 'description',
						'label' => $this->lang->line('role_description'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),
				array(
						'name'  => 'button',
						'width' => '10%',
						'sort'  => FALSE,
						'label'  => $this->lang->line('action'),
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
                        "<input type='checkbox' value='".$item['id']."' onclick=get_Checked_Checkbox_By_Name('checkCol') name='checkCol' id='checkCol' class='checkbox' />",
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