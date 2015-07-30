<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Category Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Category extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('category');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('checkout_model');
                $this->load->model('category_model');
                $this->set_controller('category');
                $this->set_model($this->category_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
	}
        
        public function convertUrl(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
                $return =   $this->bookinglib->seoUrl($this->input->post('category_name'));
                $response   =   array('error'=>0,'response'=>$return);
            } else {
                $response   =   array('error'=>1,'response'=>'');
            }
            die(json_encode($response));
        }
       
        public function trashAll(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
               $trash   = explode(",", $this->input->post('id'));
               foreach($trash as $key => $vals){
                   $this->category_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - Category ID = '.$this->input->post('id'));
               die("1");
            }
        }

        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["category"]                                     = new stdClass();
                        $this->view_data["category"]->name                               = $this->input->post('category_name');
                        $this->view_data["category"]->keyword                            = $this->input->post('keyword');
                        $this->view_data["category"]->seo_url                            = $this->input->post('seo_url');
                        $this->view_data["category"]->description                        = $this->input->post('description');
                        $this->view_data["category"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["category"]->lastupdated                        = time();
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'category_name',
                                'label'   =>  $this->lang->line('category_code'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'seo_url',
                                'label'   =>  $this->lang->line('seo_url'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'description',
                                'label'   =>  $this->lang->line('description'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                if($params){
                                        //edit data
					$this->category_model->update($this->view_data["category"], $params);
                                        $logAction                              = '[UpdateCategorySuccess] '.$this->lang->line('update_category_success');
				}else{
					$params                                 = $this->category_model->create($this->view_data["category"]);
                                        $logAction                              = '[AddCategorySuccess] '.$this->lang->line('add_category_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/category');
				}
                        }
            }
            
            if(isset($params)){
                    $category_query	= $this->category_model->find_by(array('id'=>$params));
                    
                    if(!isset($category_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/category'));
                            exit();
                    }
                    $this->smarty->assign(array(
                        'category'       =>  $category_query[0]
                    ));
            }
            
            $this->smarty->assign(array(
                'js'            =>  array(
                    base_url().'static/templates/backend/js/main.js',
                    base_url().'third_party/tiny_mce/jquery.tinymce.js',
                    base_url().'third_party/ckfinder/ckfinder.js',
                    base_url().'static/templates/backend/js/tinymce_functions.js',
                    base_url().'static/templates/backend/js/ckfinder_function.js'
                ),
                'css'           =>  array(
                    
                ),
                'segment'       =>  $this->uri->segment(4),
                'validation'    =>  validation_errors()
            ));

            $this->smarty->display('auth/category/edit');
	}
}