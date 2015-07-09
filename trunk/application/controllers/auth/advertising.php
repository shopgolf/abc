<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 *  Advertising Controller
 *
 * @package XGO CMS v3.0
 * @subpackage advertising
 * @link http://sunsoft.vn
 */

class Advertising extends BACKEND_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->language('advertising');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('advertising_model');		
			$this->set_controller('advertising');
			$this->set_model($this->advertising_model);
		}
	}

	/**
	 *
	 * @param type $id
	 */
	protected function update($id=NULL){

		$this->view_data["advertising"] 				= new stdClass();
		$this->view_data["advertising"]->title			= $this->input->post('title');
		$this->view_data["advertising"]->link			= $this->input->post('link');
		$this->view_data["advertising"]->type			= $this->input->post('type');
		$this->view_data["advertising"]->position		= $this->input->post('position');
		$this->view_data["advertising"]->resource		= $this->input->post('resource');
		$this->view_data["advertising"]->description	= $this->input->post('description');
		//$this->view_data["advertising"]->order			= $this->input->post('order');
		$this->view_data["advertising"]->partner_id		= $this->input->post('partner_id');
		$this->view_data["advertising"]->language_id	= $this->input->post('language_id');
		$this->view_data["advertising"]->published		= $this->input->post('published');
		$this->view_data["advertising"]->active			= $this->input->post('active');
		
		if($this->input->server('REQUEST_METHOD')=='POST'){

			$this->load->helper('form');
			$this->load->helper('character');
			
			// Validate form.
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			
			//require field and xss clean
			$rules = array(
					array(
							'field'   => 'title',
							'label'   =>  $this->lang->line('advertising_title'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					),
					array(
							'field'   => 'link',
							'label'   => $this->lang->line('advertising_link'),
							'rules'   => 'trim|max_length[250]|xss_clean'
					),
					array(
							'field'   => 'type',
							'label'   => $this->lang->line('advertising_type'),
							'rules'   => 'trim|max_length[110]|xss_clean'
					),
					array(
							'field'   => 'position',
							'label'   =>  $this->lang->line('advertising_position'),
							'rules'   => 'trim|max_length[25]|xss_clean'
					),
					array(
							'field'   => 'resource',
							'label'   =>  $this->lang->line('advertising_resource'),
							'rules'   => 'trim|xss_clean'
					),
					array(
							'field'   => 'description',
							'label'   => $this->lang->line('advertising_description'),
							'rules'   => 'trim|xss_clean'
					),
					array(
							'field'   => 'order',
							'label'   =>  $this->lang->line('advertising_order'),
							'rules'   => 'trim|numeric|max_length[3]|xss_clean'
					),
					array(
							'field'   => 'partner_id',
							'label'   => $this->lang->line('advertising_partner'),
							'rules'   => 'trim|numeric|max_length[3]|xss_clean'
					),
					array(
							'field'   => 'language_id',
							'label'   =>  $this->lang->line('advertising_language'),
							'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					),
					array(
							'field'   => 'published',
							'label'   => $this->lang->line('advertising_published'),
							'rules'   => 'trim|xss_clean'
					),
					array(
							'field'   => 'active',
							'label'   =>  $this->lang->line('advertising_active'),
							'rules'   => 'trim|numeric|max_length[1]|xss_clean'
					)
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){
				$this->view_data["advertising"]->published = $this->view_data["advertising"]->published==NULL?date("Y-m-d H:i:s"):$this->view_data["advertising"]->published;
				
				if($id>0){
					$this->view_data["advertising"]->editor_id 		= 	$this->advertising_model->get_user_id();
					$this->view_data["advertising"]->updated 		= 	$this->datetime;
					$this->advertising_model->update($this->view_data["advertising"], $id);
					unset($this->view_data["advertising"]);
					
				}else{
					$this->advertising_model->extract_code($advertising_code, alias_name($this->view_data["advertising"]->title));
					
					$this->view_data["advertising"]->creator_id 	= 	$this->advertising_model->get_user_id();
					$this->view_data["advertising"]->created		=	$this->datetime;
					$this->view_data["advertising"]->code			= 	$advertising_code;

					$id = $this->advertising_model->create($this->view_data["advertising"]);
				}				
				if($id>0){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					if($this->input->post('submit')=='create'){
						redirect(site_url('auth/advertising/index/add'));
					}else{						
						redirect('auth/advertising/index/edit/'.$id);
					}
				}else{
					if($this->input->post('submit')=='create'){
						redirect('auth/advertising/index/add');
					}else{
						redirect('auth/advertising/');
					}
				}
			}
				
		}
		
		$this->load->model('partner_model');
		$this->load->model('language_model');
		require_once(FCPATH.'application/modules/backend/ckfinder.php');
		if($id>0){
			$advertising_query	= $this->advertising_model->find_by(array('id' => $id));
			if(!isset($advertising_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/advertising'));
				exit();
			}
			$this->view_data['advertising']				= $advertising_query[0];
		}else{
			$this->view_data["advertising"]->id	 		= $id;
		}

		$this->view_data['js'] = array(
				base_url().'static/templates/backend/js/main.js',
				base_url().'third_party/ckfinder/ckfinder.js',
				base_url().'static/templates/backend/js/ckfinder_function.js',
				base_url().'third_party/bootstrap/js/bootstrap-datetimepicker.min.js'
		);
		
		$this->view_data['css'] = array(
				base_url().'third_party/bootstrap/css/bootstrap-datetimepicker.min.css'
		);
		
		$this->view_data['flash_message'] = $this->session->flashdata('flash_message');
			
		$this->load->view('auth/advertising/edit', $this->view_data);
	}
}

/* End of file category.php */
/* Location: ./application/controllers/auth/advertising.php */
