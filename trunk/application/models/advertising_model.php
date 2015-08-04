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
	}
        
	public function init_data($right){
		return array(
                                array(
						'name' => 'number',
						'label' => '',
						'width' => '5%',
						'sort'  => 'DESC',
						'searchoptions' => FALSE
				),array(
						'name' => 'title',
						'label' => $this->lang->line('title'),
						'width' => '20%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'link_detail',
						'label' => $this->lang->line('link_detail'),
						'width' => '15%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'image',
						'label' => $this->lang->line('image'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'status',
						'label' => $this->lang->line('status'),
						'width' => '10%',
						'sort'  => FALSE,
						'searchoptions' => FALSE
				),array(
						'name'  => 'created',
						'width' => '10%',
						'sort'  => FALSE,
						'label' => $this->lang->line('created'),
						'searchoptions' => FALSE
				),array(
						'name' 	=> 'button',
						'width' => '15%',
						'sort'  => FALSE,
                                                'label'  => "",
						'searchoptions' => false
				)
		);
	}

	public function json_data($controller, $right){
		$this->datatables
		->select('id,title,description,link,image,status,created,lastupdated')
		->from($this->table_name);

		$this->datatables->set_produce_output(false);
		$ouput = $datatables = $this->datatables->generate();
		unset($ouput['aaData']);
		$ouput['aaData'] = array();
		foreach($datatables['aaData'] as $item){
                    $ouput['aaData'][] = array(
                        "<input type='checkbox' value='".$item['id']."' onclick=get_Checked_Checkbox_By_Name('checkCol') name='checkCol' id='checkCol' class='checkbox' />",
                        $item['title'],
                        '<a href="/'.$item['link'].'">Click here</a>',
                        '<img style="width:100%" src="/'.UPLOAD_DIR.'banner/'.$item['image'].'" />',
                        ($item['status']==1)?$this->lang->line('active'):$this->lang->line('unactive'),
                        $item['created'],
                        $this->add_button($controller, $right, $item),
                    );
		}
		return json_encode($ouput);
	}

	public function get_slider(){
		$this->db->select('image,link,id,title');
		$this->db->where('status',1);
		$query = $this->db->get($this->table_name);
		return $query->result();
	}
}