<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Product Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Product extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->language('product');
		$this->load->language('button');
		if($this->database_connect_status){
			$this->load->model('product_model');
			$this->set_controller('product');
			$this->set_model($this->product_model);
		}
	}
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["product"]                                   = new stdClass();
                        $this->view_data["product"]->customerID                       = trim($this->input->post('customerID'));
                        $this->view_data["product"]->productNow                       = $this->input->post('productNow');
                        $this->view_data["product"]->deduct                           = $this->input->post('deduct');
                        $this->view_data["product"]->productRemaine                   = $this->input->post('productRemaine');
                        $this->view_data["product"]->note                             = $this->input->post('note');
                        $this->view_data["product"]->owner                            = $this->session->userdata['user_id'];
                        $this->view_data["product"]->agent_code                       = $this->session->userdata['agent_code'];
                        $this->view_data["product"]->lastupdated                      = date("Y-m-d H:i:s",time());

                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
                        $rules = array(
                            array(
                                'field'   => 'customerID',
                                'label'   =>  $this->lang->line('customerID'),
                                'rules'   => 'required|trim|max_length[50]|xss_clean'
                            )
                            ,array(
                                'field'   => 'productRemaine',
                                'label'   =>  $this->lang->line('product'),
                                'rules'   => 'numberic|xss_clean'
                            )
                            ,array(
                                'field'   => 'note',
                                'label'   =>  $this->lang->line('note'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );

                        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><strong>'.$this->lang->line('error').': </strong>', '</div>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                if($params){
                                        //edit data
					$this->product_model->update($this->view_data["product"], $params);
                                        $logAction                              = '[UpdateProduct] '.$this->lang->line('update_product_success');
				}else{
					$params                                 = $this->product_model->create($this->view_data["product"]);
                                        $logAction                              = '[AddProduct] '.$this->lang->line('add_product_success');
				}
                                //update so du
                                $this->load->model('listcustomers_model');
                                $this->listcustomers_model->updateProduct($this->view_data["product"]->customerID,$this->view_data["product"]->productRemaine);
                                
				if($params){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$paramAdminLog  = array(
                                            'userid'            => $this->session->userdata['user_id'],
                                            'lastLogin'         => date('Y-m-d :H:i:s',time()),
                                            'ip'                => $_SERVER['REMOTE_ADDR'],
                                            'logAction'         => $logAction,
                                            'agent_code'        => $this->session->userdata['agent_code']
                                        );
                                        $this->user_model->insertUserAdminLog($paramAdminLog);
                                        redirect('auth/product');
				}
                        }
            }
            
            $this->load->model('product_model');
            $this->load->model('language_model');

            if(isset($params)){
                    $product_query	= $this->product_model->find_by(array('id'=>$params));
                    
                    if(!isset($product_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/product'));
                            exit();
                    }

                    $this->view_data['product']				= $product_query[0];
            }

            $this->view_data['js'] = array(
                            base_url().'static/templates/backend/js/main.js'
            );
            $this->view_data['css'] = array(
            );
            $this->load->view('auth/product/edit', $this->view_data);
	}
}