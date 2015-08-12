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
        
        public function trashAll(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
               $trash   = explode(",", $this->input->post('id'));
               foreach($trash as $key => $vals){
                   $this->product_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - Product ID = '.$this->input->post('id'));
               die("1");
            }
        }
        
        public function convertUrl(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
                $return =   $this->bookinglib->seoUrl($this->input->post('product_name'));
                $response   =   array('error'=>0,'response'=>$return);
            } else {
                $response   =   array('error'=>1,'response'=>'');
            }
            die(json_encode($response));
        }

        public function deleteImage(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                $file   =   UPLOAD_DIR."product/".$this->input->post('url');
                $return =   unlink($file);
                if($return == 1){
                    if($this->input->post('segment') == "edit"){
                        
                        $return = $this->product_model->find_by(array('id'=>$this->input->post('id')));
                        $image = json_decode($return[0]->image);
                        foreach($image as $key => $vals){
                            if($vals != trim($this->input->post('img'))){
                                $update[]   =   $vals;
                            }
                        }
                        $this->view_data["delete"]                                 = new stdClass();
                        $this->view_data["delete"]->image                          = json_encode($update);
                        $this->product_model->update($this->view_data["delete"], $this->input->post('id')); 
                    }
                    die($this->input->post('url'));
                } else {
                    die("0");
                }
            }
        }
        
        public function upload(){
                $output_dir = getcwd().'\\'.str_replace('/', '\\', UPLOAD_DIR).'product\\';
                if(isset($_FILES["myfile"]))
                {
                    $ret            =   array();
                    $error          =   $_FILES["myfile"]["error"];
                    
                    if(!is_array($_FILES["myfile"]["name"])) //single file
                    {
                        $extension      =   explode("/",$_FILES["myfile"]["type"]);
                        $fileName       = md5($_FILES["myfile"]["name"]).'.'.$extension[1];
                        move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                    }
                    
                    die($fileName);
                 }
        }
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        
                        $this->view_data["product"]                                     = new stdClass();
                        $this->view_data["product"]->product_code                       = $this->input->post('product_code');
                        $this->view_data["product"]->product_name                       = $this->input->post('product_name');
                        $this->view_data["product"]->product_type                       = $this->input->post('product_type');
                        $this->view_data["product"]->image                              = ($this->input->post('files'))?json_encode($this->input->post('files')):'';
                        $this->view_data["product"]->category                           = $this->input->post('category');
                        $this->view_data["product"]->keyword                            = $this->input->post('seo_keyword');
                        $this->view_data["product"]->description                        = $this->input->post('seo_metadata');
                        $this->view_data["product"]->seo_url                            = $this->input->post('product_url_seo');
                        $this->view_data["product"]->net_price                          = $this->input->post('net_price_fake');
                        $this->view_data["product"]->final_price                        = $this->input->post('final_price_fake');
                        $this->view_data["product"]->begin_price                        = $this->input->post('begin_price_fake');
                        $this->view_data["product"]->begin_time                         = strtotime($this->input->post('begin_time'));
                        $this->view_data["product"]->end_time                           = strtotime($this->input->post('end_time'));
                        $this->view_data["product"]->parameters                         = $this->input->post('parameters');
                        $this->view_data["product"]->info                               = $this->input->post('info');
                        
                        $this->view_data["product"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["product"]->lastupdated                        = date("Y-m-d H:i:s",time());
                        
                        if($this->input->post('final_price_fake')){
                            $this->view_data["product"]->pecent = $this->bookinglib->percents($this->input->post('final_price_fake'),$this->input->post('net_price_fake'),0);
                        }
                        //percentage(1, 3, 0)
                        
                        
                        if($this->input->post('begin_price') && $this->input->post('begin_time') && $this->input->post('end_time')){
                            $this->view_data["product"]->bid   =   1;
                        } else {
                            $this->view_data["product"]->bid   =   0;
                        }
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'product_code',
                                'label'   =>  $this->lang->line('product_code'),
                                'rules'   => 'required|trim|max_length[10]|xss_clean'
                            ),array(
                                'field'   => 'product_name',
                                'label'   =>  $this->lang->line('product_name'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'seo_keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'seo_metadata',
                                'label'   =>  $this->lang->line('description'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'product_url_seo',
                                'label'   =>  $this->lang->line('seo_url'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
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
                                'label'   =>  $this->lang->line('product_detail'),
                                'rules'   => 'required|trim|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                //param
                                $this->view_data["parameters"]                      = new stdClass();
                                $this->view_data["parameters"]->classification      = trim($this->input->post('classification'));
                                $this->view_data["parameters"]->manufacturer      = trim($this->input->post('manufacturer'));
                                $this->view_data["parameters"]->model      = trim($this->input->post('model'));
                                $this->view_data["parameters"]->shaft      = trim($this->input->post('shaft'));
                                $this->view_data["parameters"]->count      = trim($this->input->post('count'));
                                $this->view_data["parameters"]->loft      = trim($this->input->post('loft'));
                                $this->view_data["parameters"]->hardness      = trim($this->input->post('hardness'));
                                $this->view_data["parameters"]->gross      = trim($this->input->post('gross'));
                                $this->view_data["parameters"]->balance      = trim($this->input->post('balance'));
                                $this->view_data["parameters"]->price      = trim($this->input->post('price'));
                                $this->view_data["parameters"]->club      = trim($this->input->post('club'));
                                
                                if($params){
					$this->product_model->update($this->view_data["product"], $params);
                                        $logAction                                      = '[UpdateProductSuccess] '.$this->lang->line('update_product_success');
				}else{
                                        $this->view_data['product']->product_id         = $this->bookinglib->rendCode('PRO');
					$params                                         = $this->product_model->create($this->view_data["product"]);

                                        $logAction                                      = '[AddProductSuccess] '.$this->lang->line('add_product_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
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
                    $product_query[0]->image            =   json_decode($product_query[0]->image);
                    $this->smarty->assign(array(
                        'product'       =>  $product_query[0],
                        'count_img'     =>  count($product_query[0]->image)
                    ));
            }
            $this->load->model('category_model');
            
            $this->smarty->assign(array(
                'type'          =>  $this->product_model->product_type(),
                'category'      =>  $this->category_model->getCategoryById(array('parent_category_null'=>true,'type'=>1)),
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

            $this->smarty->display('auth/product/edit');
	}
        
        public function getCategoryChild(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                $this->load->model('category_model');
                $category_child =   $this->category_model->find_by(array('parent_category'=>$this->input->post('category')));
                if($category_child){
                    $list = array();
                    foreach($category_child as $keys => $vals){
                        $list[$vals->id]        =   $vals->name;
                    }
                    die(json_encode($list));
                } else {
                    die("");
                }
            }
        }
}