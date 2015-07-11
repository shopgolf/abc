<?php if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

/**
 *  Advertising Model
 *
 * @package XGO CMS v3.0
 * @subpackage Advertising
 * @link http://sunsoft.vn
 */

class Advertising_model extends MY_Model{

	public function __construct(){
		parent::__construct();
		$this->table_name = 'advertising';

		$this->type_list = array(
				'image'     => $this->lang->line('image'),
				'youtube'   => $this->lang->line('youtube'),
				'flash'     => $this->lang->line('flash'),
				'code'      => $this->lang->line('code'),
		);
	}

	public function get_type_list(){
		return $this->type_list;
	}

	public function init_data($right){
		return array(
                                array(
						'name' => 'number',
						'label' => $this->lang->line('number'),
						'width' => '5%',
						'sort'  => 'DESC',
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' => 'title',
						'label' => $this->lang->line('advertising_title'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' 	=> 'link_detail',
						'label' => $this->lang->line('link_detail'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' 	=> 'link_img',
						'label' => $this->lang->line('link_img'),
						'width' => '30%',
						'sort'  => FALSE,
						'searchoptions' => array(
								'type' 	=> 'text',
						)
				),array(
						'name' 	=> 'active',
						'label' => $this->lang->line('advertising_active'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => array(
							'type' 	=> 'select',
							'values' => $this->datatables->values_encode(
								$this->active_list
							),
						)
				),array(
						'name'  => 'created',
						'width' => '10%',
						'sort'  => 'DESC',
						'label' => $this->lang->line('created'),
						'searchoptions' => false
				),array(
						'name'  => 'updated',
						'width' => '10%',
						'sort'  => 'DESC',
						'label' => $this->lang->line('updated'),
						'searchoptions' => false
				),array(
						'name' 	=> 'button',
						'width' => '10%',
						'sort'  => FALSE,
                                                'label'  => $right['add']==TRUE?'<div class="btn-group">
						<a style="width: 82px;" href="'.site_url('auth/advertising/index/add').'" class="btn btn btn-success">'.$this->lang->line('create').'</a>
						</div>':"",
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
		->select('id,title,description,link_detail,link_img,active,created,updated,creator_id')
		->from($this->table_name);
		//$this->datatables->order_by('created', 'desc');
		//->unset_column('id');

		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        $item['id'],
                        $item['title'],
                        $item['link'],
                        $item['active'],
                        $item['created'],
                        $item['updated'],
                        $this->add_button($controller, $right, $item),
                    );
		}

		return json_encode($ouput);
	}
}