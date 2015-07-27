<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * OrderSuccess Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class OrderSuccess extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('orderSuccess');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('ordersuccess_model');
                $this->load->model('ordersuccess_model');
                $this->set_controller('orderSuccess');
                $this->set_model($this->ordersuccess_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
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
                    
                        $this->view_data["orderSuccess"]                                     = new stdClass();
                        $this->view_data["orderSuccess"]->orderSuccess_code                       = trim($this->input->post('orderSuccess_code'));
                        $this->view_data["orderSuccess"]->orderSuccess_name                       = trim($this->input->post('orderSuccess_name'));
                        $this->view_data["orderSuccess"]->orderSuccess_type                       = $this->input->post('orderSuccess_type');
                        $this->view_data["orderSuccess"]->category                           = $this->input->post('category');
                        $this->view_data["orderSuccess"]->keyword                            = trim($this->input->post('keyword'));
                        $this->view_data["orderSuccess"]->description                        = trim($this->input->post('description'));
                        $this->view_data["orderSuccess"]->net_price                          = $this->input->post('net_price_fake');
                        $this->view_data["orderSuccess"]->final_price                        = $this->input->post('final_price_fake');
                        $this->view_data["orderSuccess"]->begin_price                        = $this->input->post('begin_price_fake');
                        $this->view_data["orderSuccess"]->begin_time                         = strtotime($this->input->post('begin_time'));
                        $this->view_data["orderSuccess"]->end_time                           = strtotime($this->input->post('end_time'));
                        $this->view_data["orderSuccess"]->parameters                         = json_encode($parameters);
                        $this->view_data["orderSuccess"]->info                               = trim($this->input->post('info'));
                        
                        $this->view_data["orderSuccess"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["orderSuccess"]->lastupdated                        = date("Y-m-d H:i:s",time());
                        
                        if($this->input->post('begin_price') && $this->input->post('begin_time') && $this->input->post('end_time')){
                            $this->view_data["orderSuccess"]->bid   =   1;
                        } else {
                            $this->view_data["orderSuccess"]->bid   =   0;
                        }
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'orderSuccess_code',
                                'label'   =>  $this->lang->line('orderSuccess_code'),
                                'rules'   => 'required|trim|max_length[10]|xss_clean'
                            ),array(
                                'field'   => 'orderSuccess_name',
                                'label'   =>  $this->lang->line('orderSuccess_name'),
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
                                'label'   =>  $this->lang->line('orderSuccess_detail'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                            
                                //upload image
                                $this->view_data["orderSuccess"]->image              = $this->upload($this->input->post('img-submit'),$this->input->post('image'));
                                //auto rend orderSuccess id
                                
                                if($params){
                                        //edit data
					$this->ordersuccess_model->update($this->view_data["orderSuccess"], $params);
                                        $logAction                              = '[UpdateOrderSuccessSuccess] '.$this->lang->line('update_orderSuccess_success');
				}else{
                                        $this->view_data['orderSuccess']->orderSuccess_id         = $this->bookinglib->rendCode('PRO');
					$params                                 = $this->ordersuccess_model->create($this->view_data["orderSuccess"]);
                                        $logAction                              = '[AddOrderSuccessSuccess] '.$this->lang->line('add_orderSuccess_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/orderSuccess');
				}
                        }
            }
            
            if(isset($params)){
                    $orderSuccess_query	= $this->ordersuccess_model->find_by(array('id'=>$params));
                    
                    if(!isset($orderSuccess_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/orderSuccess'));
                            exit();
                    }
                    $orderSuccess_query[0]->image    = json_decode($orderSuccess_query[0]->image);
                    $this->smarty->assign(array(
                        'orderSuccess'       =>  $orderSuccess_query[0],
                        'count_img'     =>  count($orderSuccess_query[0]->image)
                    ));
            }
            $this->load->model('orderSuccessType_model');
            $this->load->model('category_model');
            
            $this->smarty->assign(array(
                'category'      =>  $this->category_model->find_by(),
                'type'          =>  $this->orderSuccessType_model->find_by(),
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

            $this->smarty->display('auth/orderSuccess/edit');
	}
}