<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Post Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Post extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('post');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('checkout_model');
                $this->load->model('post_model');
                $this->set_controller('post');
                $this->set_model($this->post_model);
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
                   $this->post_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - Post ID = '.$this->input->post('id'));
               die("1");
            }
        }
        
        public function convertUrl(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
                $return =   $this->bookinglib->seoUrl($this->input->post('title'));
                $response   =   array('error'=>0,'response'=>$return);
            } else {
                $response   =   array('error'=>1,'response'=>'');
            }
            die(json_encode($response));
        }
        
        public function deleteImage(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                $file   =   UPLOAD_DIR."post/".$this->input->post('url');
                $return =   unlink($file);
                if($return == 1){
                    if($this->input->post('segment') == "edit"){
                        
                        $return = $this->post_model->find_by(array('id'=>$this->input->post('id')));
                        $image = json_decode($return[0]->feature_img);
                        foreach($image as $key => $vals){
                            if($vals != trim($this->input->post('img'))){
                                $update[]   =   $vals;
                            }
                        }
                        $this->view_data["delete"]                              = new stdClass();
                        $this->view_data["delete"]->feature_img                 = json_encode($update);
                        $this->post_model->update($this->view_data["delete"], $this->input->post('id')); 
                    }
                    die($this->input->post('url'));
                } else {
                    die("0");
                }
            }
        }
        
        public function upload(){
                $output_dir = getcwd().'\\'.str_replace('/', '\\', UPLOAD_DIR).'post\\';
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
                        $this->view_data["post"]                                = new stdClass();
                        $this->view_data["post"]->title                         = $this->input->post('title');
                        $this->view_data["post"]->seo_url                       = $this->input->post('seo_url');
                        $this->view_data["post"]->seo_keyword                   = $this->input->post('seo_keyword');
                        //$this->view_data["post"]->type                          = $this->input->post('type');
                        $this->view_data["post"]->description                   = $this->input->post('description');
                        $this->view_data["post"]->tag                           = $this->input->post('tag');
                        $this->view_data["post"]->feature_img                   = json_encode($this->input->post('files'));
                        $this->view_data["post"]->owner                         = $this->session->userdata['user_id'];
                        $this->view_data["post"]->created                       = date("Y-m-d H:i:s",time());
                        $this->view_data["post"]->lastupdated                   = date("Y-m-d H:i:s",time());
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'title',
                                'label'   =>  $this->lang->line('title'),
                                'rules'   => 'required|trim|xss_clean'
                            ),array(
                                'field'   => 'seo_url',
                                'label'   =>  $this->lang->line('seo_url'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'seo_keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'tag',
                                'label'   =>  $this->lang->line('tag'),
                                'rules'   => 'required|trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'description',
                                'label'   =>  $this->lang->line('content'),
                                'rules'   => 'required|trim|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                if($params){
                                        //edit data
					$this->post_model->update($this->view_data["post"], $params);
                                        $logAction                              = '[UpdatePostSuccess] '.$this->lang->line('update_post_success');
				}else{
					$params                                 = $this->post_model->create($this->view_data["post"]);
                                        $logAction                              = '[AddPostSuccess] '.$this->lang->line('add_post_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/post');
				}
                        }
            }
            
            if(isset($params)){
                    $post_query	= $this->post_model->find_by(array('id'=>$params));
                    
                    if(!isset($post_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/post'));
                            exit();
                    }
                    $post_query[0]->image    = json_decode($post_query[0]->feature_img);
                    $this->smarty->assign(array(
                        'post'       =>  $post_query[0]
                    ));
            }

            $this->smarty->assign(array(
                'type'          =>  $this->post_model->post_list(),
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

            $this->smarty->display('auth/post/edit');
	}
}