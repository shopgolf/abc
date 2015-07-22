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
                        $this->view_data["category"]->category_code                       = trim($this->input->post('category_code'));
                        $this->view_data["category"]->category_name                       = trim($this->input->post('category_name'));
                        $this->view_data["category"]->category_type                       = $this->input->post('category_type');
                        $this->view_data["category"]->category                           = $this->input->post('category');
                        $this->view_data["category"]->keyword                            = trim($this->input->post('keyword'));
                        $this->view_data["category"]->description                        = trim($this->input->post('description'));
                        $this->view_data["category"]->net_price                          = $this->input->post('net_price_fake');
                        $this->view_data["category"]->final_price                        = $this->input->post('final_price_fake');
                        $this->view_data["category"]->begin_price                        = $this->input->post('begin_price_fake');
                        $this->view_data["category"]->begin_time                         = strtotime($this->input->post('begin_time'));
                        $this->view_data["category"]->end_time                           = strtotime($this->input->post('end_time'));
                        $this->view_data["category"]->parameters                         = json_encode($parameters);
                        $this->view_data["category"]->info                               = trim($this->input->post('info'));
                        
                        $this->view_data["category"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["category"]->lastupdated                        = date("Y-m-d H:i:s",time());
                        
                        if($this->input->post('begin_price') && $this->input->post('begin_time') && $this->input->post('end_time')){
                            $this->view_data["category"]->bid   =   1;
                        } else {
                            $this->view_data["category"]->bid   =   0;
                        }
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'category_code',
                                'label'   =>  $this->lang->line('category_code'),
                                'rules'   => 'required|trim|max_length[10]|xss_clean'
                            ),array(
                                'field'   => 'category_name',
                                'label'   =>  $this->lang->line('category_name'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'description',
                                'label'   =>  $this->lang->line('description'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'net_price',
                                'label'   =>  $this->lang->line('net_price'),
                                'rules'   => 'required|numberic|max_length[15]|xss_clean'
                            ),array(
                                'field'   => 'final_price',
                                'label'   =>  $this->lang->line('final_price'),
                                'rules'   => 'numberic|max_length[15]|xss_clean'
                            ),array(
                                'field'   => 'info',
                                'label'   =>  $this->lang->line('category_detail'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                            
                                //upload image
                                $this->view_data["category"]->image              = $this->upload($this->input->post('img-submit'),$this->input->post('image'));
                                //auto rend category id
                                
                                if($params){
                                        //edit data
					$this->category_model->update($this->view_data["category"], $params);
                                        $logAction                              = '[UpdateCategorySuccess] '.$this->lang->line('update_category_success');
				}else{
                                        $this->view_data['category']->category_id         = $this->bookinglib->rendCode('PRO');
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
                    $category_query[0]->image    = json_decode($category_query[0]->image);
                    $this->smarty->assign(array(
                        'category'       =>  $category_query[0],
                        'count_img'     =>  count($category_query[0]->image)
                    ));
            }
            $this->load->model('categoryType_model');
            $this->load->model('category_model');
            
            $this->smarty->assign(array(
                'category'      =>  $this->category_model->find_by(),
                'type'          =>  $this->categoryType_model->find_by(),
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