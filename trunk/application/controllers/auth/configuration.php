<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}
/**
 * Configuration Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */
class Configuration extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->language('configuration');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('configuration_model');
			$this->set_controller('configuration');
			$this->set_model($this->configuration_model);
		}
	}

	protected function update($id=NULL){
		$this->view_data["configuration"] 				= new stdClass();
		$this->view_data["configuration"]->title			= $this->input->post('title');
		$this->view_data["configuration"]->value			= $this->input->post('value');
                $this->view_data["configuration"]->code                         = $this->input->post('code');

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
							'label'   =>  $this->lang->line('title'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					),
					array(
							'field'   => 'value',
							'label'   =>  $this->lang->line('value'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					),
                                        array(
							'field'   => 'code',
							'label'   =>  $this->lang->line('code'),
							'rules'   => 'trim|required|max_length[150]|xss_clean'
					)
			);

			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()==TRUE){
				if($id>0){
					$this->configuration_model->update($this->view_data["configuration"], $id);
					unset($this->view_data["configuration"]);

				}else{
					$id = $this->configuration_model->create($this->view_data["configuration"]);
				}

				if($id > 0){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));	
					if($this->input->post('submit')=='create'){
						redirect(site_url('auth/configuration/index/add'));
					}else{
						redirect('auth/configuration/index/edit/'.$id);
					}
				}else{
					if($this->input->post('submit')=='create'){
						redirect(site_url('auth/configuration/index/add'));
					}else{
						redirect('auth/configuration/');
					}
				}
			}

		}

		$this->load->model('configuration_model');
		if($id>0){
			$configuration_query	= $this->configuration_model->find_by(array('id' => $id));
			if(!isset($configuration_query[0])){
				$this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
				redirect(site_url('auth/configuration'));
				exit();
			}
			$this->view_data['configuration']				= $configuration_query[0];
		}else{
			$this->view_data["configuration"]->id	 		= $id;
		}

		$this->view_data['js'] = array(
				base_url().'static/templates/backend/js/main.js'
		);

		$this->load->view('auth/configuration/edit', $this->view_data);
	}
}