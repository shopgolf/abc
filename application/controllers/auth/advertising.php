<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Advertising Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Advertising extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('advertising');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('advertising_model');
                $this->set_controller('advertising');
                $this->set_model($this->advertising_model);
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
                   $this->advertising_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - Advertising ID = '.$this->input->post('id'));
               die("1");
            }
        }
        
        public function upload($params1,$params2){
            if($params1 && $params2){
                preg_match('/data:image\/([^;]*);base64,(.*)/', $params1, $matches);
                $ext        =   $matches[1];
                $data       =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $params1));
                file_put_contents('static/uploads/banner/'.md5($params2).'.'.$ext, $data);
                return md5($params2).'.'.$ext;
            }
        }
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["advertising"]                                     = new stdClass();
                        $this->view_data["advertising"]->title                              = $this->input->post('title');
                        $this->view_data["advertising"]->description                        = $this->input->post('description');
                        $this->view_data["advertising"]->link                               = $this->input->post('link');
                        $this->view_data["advertising"]->status                             = $this->input->post('status');
                        $this->view_data["advertising"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["advertising"]->lastupdated                        = date("Y-m-d",time());
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'title',
                                'label'   =>  $this->lang->line('title'),
                                'rules'   => 'required|trim|max_length[150]|xss_clean'
                            ),array(
                                'field'   => 'description',
                                'label'   =>  $this->lang->line('description'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'link',
                                'label'   =>  $this->lang->line('link'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                            
                                if($this->input->post('image')){
                                    $this->view_data["advertising"]->image      = $this->upload($this->input->post('saveimage'),$this->input->post('image'));
                                }
                            
                                if($params){
                                    $this->advertising_model->update($this->view_data["advertising"], $params);
                                    $logAction                                  = '[UpdateAdvertisingSuccess] '.$this->lang->line('update_advertising_success');
				}else{
                                    $this->view_data["advertising"]->created    = date("Y-m-d",time());
                                    $params                                     = $this->advertising_model->create($this->view_data["advertising"]);
                                    $logAction                                  = '[AddAdvertisingSuccess] '.$this->lang->line('add_advertising_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/advertising');
				}
                        }
            }
            
            if(isset($params)){
                    $advertising_query	= $this->advertising_model->find_by(array('id'=>$params));
                    
                    if(!isset($advertising_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/advertising'));
                            exit();
                    }
                    $advertising_query[0]->image    = json_decode($advertising_query[0]->image);
                    $this->smarty->assign(array(
                        'advertising'       =>  $advertising_query[0],
                        'count_img'     =>  count($advertising_query[0]->image)
                    ));
            }
            
            $this->smarty->assign(array(
                'status_list'        =>  $this->advertising_model->get_active_list(),
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

            $this->smarty->display('auth/advertising/edit');
	}
}