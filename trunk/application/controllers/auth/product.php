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
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('checkout_model');
                $this->load->model('product_model');
                $this->set_controller('product');
                $this->set_model($this->product_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
	}
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["product"]                                   = new stdClass();
                        $this->view_data["product"]->product_code                     = trim($this->input->post('product_code'));
                        $this->view_data["product"]->product_type                     = $this->input->post('product_type');
                        $this->view_data["product"]->category                           = $this->input->post('category');
                        $this->view_data["product"]->keyword                          = trim($this->input->post('keyword'));
                        $this->view_data["product"]->description                      = trim($this->input->post('description'));
                        
                        $this->view_data["product"]->net_price                        = trim($this->input->post('net_price'));
                        $this->view_data["product"]->final_price                        = trim($this->input->post('final_price'));
                        $this->view_data["product"]->begin_price                        = trim($this->input->post('begin_price'));
                        $this->view_data["product"]->begin_time                        = trim($this->input->post('begin_time'));
                        $this->view_data["product"]->end_time                        = trim($this->input->post('end_time'));
                        
                        $this->view_data["product"]->classification                        = trim($this->input->post('classification'));
                        $this->view_data["product"]->manufacturer                        = trim($this->input->post('manufacturer'));
                        $this->view_data["product"]->model                        = trim($this->input->post('model'));
                        $this->view_data["product"]->shaft                        = trim($this->input->post('shaft'));
                        $this->view_data["product"]->count                        = trim($this->input->post('count'));
                        $this->view_data["product"]->loft                        = trim($this->input->post('loft'));
                        $this->view_data["product"]->hardness                        = trim($this->input->post('hardness'));
                        $this->view_data["product"]->gross                        = trim($this->input->post('gross'));
                        $this->view_data["product"]->balance                        = trim($this->input->post('balance'));
                        $this->view_data["product"]->price                        = trim($this->input->post('l-price'));
                        $this->view_data["product"]->club                        = trim($this->input->post('club'));
                        
                        $this->view_data["product"]->owner                            = $this->session->userdata['user_id'];
                        $this->view_data["product"]->lastupdated                      = date("Y-m-d H:i:s",time());

                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->helper('form');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'product_name',
                                'label'   =>  $this->lang->line('product_name'),
                                'rules'   => 'required|trim|max_length[30]|xss_clean'
                            ),array(
                                'field'   => 'product_code',
                                'label'   =>  $this->lang->line('product_code'),
                                'rules'   => 'required|trim|max_length[10]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
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
            
            if(isset($params)){
                    $product_query	= $this->product_model->find_by(array('id'=>$params));
                    
                    if(!isset($product_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/product'));
                            exit();
                    }

                    $this->view_data['product']				= $product_query[0];
            }
            $this->load->model('productType_model');
            $this->load->model('category_model');
            
            $type           =   $this->productType_model->find_by();
            $category       =   $this->category_model->find_by();

            $this->smarty->assign(array(
                'category'      =>  $category,
                'type'          =>  $type,
                'js'            =>  array(
                    base_url().'static/templates/backend/js/main.js',
                    base_url().'third_party/tiny_mce/jquery.tinymce.js',
                    base_url().'third_party/ckfinder/ckfinder.js',
                    base_url().'static/templates/backend/js/tinymce_functions.js',
                    base_url().'static/templates/backend/js/ckfinder_function.js',
                    base_url().'third_party/bootstrap/js/bootstrap-datetimepicker.min.js'
                ),
                'segment'       =>  $this->uri->segment(4),
                'validation'    =>  validation_errors()
            ));

            $this->smarty->display('auth/product/edit');
	}
}