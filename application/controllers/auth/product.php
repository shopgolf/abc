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
        
        public function convertUrl(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
                $return =   $this->bookinglib->seoUrl($this->input->post('product_name'));
                $response   =   array('error'=>0,'response'=>$return);
            } else {
                $response   =   array('error'=>1,'response'=>'');
            }
            die(json_encode($response));
        }

        public function deleteImg(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                $file   =   UPLOAD_DIR."product/".$this->input->post('img');
                $return =   unlink($file);
                if($return == 1){
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
                    unset($this->view_data["delete"]);
                    die("1");
                } else {
                    die("0");
                }
            }
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

        public function upload($params1,$params2){
            if($params1 && $params2){
                $title_img  =   array();
                foreach($params1 as $key=>$val){
                    if($val){
                        preg_match('/data:image\/([^;]*);base64,(.*)/', $val, $matches);
                        $ext        =   $matches[1];
                        $data       =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $val));
                        file_put_contents('static/uploads/product/'.md5($params2[$key]).'.'.$ext, $data);
                        $title      =   md5($params2[$key]).'.'.$ext;
                    } else {
                        $title      =   $params2[$key];
                    }
                    $title_img[]    =   $title;
                }
                
                return json_encode($title_img);
            }
        }

        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $parameters     =   array(
                            'classification' => trim($this->input->post('classification')),
                            'manufacturer'  =>  trim($this->input->post('manufacturer')),
                            'model'  =>  trim($this->input->post('model')),
                            'shaft'  =>  trim($this->input->post('shaft')),
                            'count'  =>  trim($this->input->post('count')),
                            'loft'  =>  trim($this->input->post('loft')),
                            'hardness'  =>  trim($this->input->post('hardness')),
                            'gross'  =>  trim($this->input->post('gross')),
                            'balance'  =>  trim($this->input->post('balance')),
                            'price'  =>  trim($this->input->post('price')),
                            'club'  =>  trim($this->input->post('club'))
                        );
                    
                        $this->view_data["product"]                                     = new stdClass();
                        $this->view_data["product"]->product_code                       = trim($this->input->post('product_code'));
                        $this->view_data["product"]->product_name                       = trim($this->input->post('product_name'));
                        $this->view_data["product"]->product_type                       = $this->input->post('product_type');
                        $this->view_data["product"]->category                           = $this->input->post('category');
                        $this->view_data["product"]->keyword                            = trim($this->input->post('keyword'));
                        $this->view_data["product"]->description                        = trim($this->input->post('description'));
                        $this->view_data["product"]->net_price                          = $this->input->post('net_price_fake');
                        $this->view_data["product"]->final_price                        = $this->input->post('final_price_fake');
                        $this->view_data["product"]->begin_price                        = $this->input->post('begin_price_fake');
                        $this->view_data["product"]->begin_time                         = strtotime($this->input->post('begin_time'));
                        $this->view_data["product"]->end_time                           = strtotime($this->input->post('end_time'));
                        $this->view_data["product"]->parameters                         = json_encode($parameters);
                        $this->view_data["product"]->info                               = trim($this->input->post('info'));
                        
                        $this->view_data["product"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["product"]->lastupdated                        = date("Y-m-d H:i:s",time());
                        
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
                                'label'   =>  $this->lang->line('product_detail'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                            
                                //upload image
                                $this->view_data["product"]->image              = $this->upload($this->input->post('img-submit'),$this->input->post('image'));
                                //auto rend product id
                                
                                if($params){
                                        //edit data
					$this->product_model->update($this->view_data["product"], $params);
                                        $logAction                              = '[UpdateProductSuccess] '.$this->lang->line('update_product_success');
				}else{
                                        $this->view_data['product']->product_id         = $this->bookinglib->rendCode('PRO');
					$params                                 = $this->product_model->create($this->view_data["product"]);
                                        $logAction                              = '[AddProductSuccess] '.$this->lang->line('add_product_success');
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
                    $product_query[0]->image    = json_decode($product_query[0]->image);
                    $this->smarty->assign(array(
                        'product'       =>  $product_query[0],
                        'count_img'     =>  count($product_query[0]->image)
                    ));
            }
            $this->load->model('producttype_model');
            $this->load->model('category_model');
            
            $this->smarty->assign(array(
                'category'      =>  $this->category_model->find_by(),
                'type'          =>  $this->producttype_model->find_by(),
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
}