<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Maker Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Maker extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('maker');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('maker_model');
                $this->set_controller('maker');
                $this->set_model($this->maker_model);
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
                   $this->maker_model->delete(array('id'=>$vals));
               }
               $this->session->set_flashdata('flash_message', $this->lang->line('delete_successful'));
               $this->adminlog($this->lang->line('delete_successful').' - Maker ID = '.$this->input->post('id'));
               die("1");
            }
        }
        
        protected function update($params=NULL){
		if($this->input->server('REQUEST_METHOD')=='POST'){
                        $this->view_data["maker"]                                     = new stdClass();
                        $this->view_data["maker"]->name                               = $this->input->post('maker_name');
                        $this->view_data["maker"]->keyword                            = $this->input->post('keyword');
                        $this->view_data["maker"]->description                        = $this->input->post('description');
                        $this->view_data["maker"]->owner                              = $this->session->userdata['user_id'];
                        $this->view_data["maker"]->lastupdated                        = time();
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'maker_name',
                                'label'   =>  $this->lang->line('name'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
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
					$this->maker_model->update($this->view_data["maker"], $params);
                                        $logAction                              = '[UpdateMakerSuccess] '.$this->lang->line('update_maker_success');
				}else{
					$params                                 = $this->maker_model->create($this->view_data["maker"]);
                                        $logAction                              = '[AddMakerSuccess] '.$this->lang->line('add_maker_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        redirect('auth/maker');
				}
                        }
            }
            
            if(isset($params)){
                    $maker_query	= $this->maker_model->find_by(array('id'=>$params));
                    
                    if(!isset($maker_query[0])){
                            $this->session->set_flashdata('flash_message', $this->lang->line('not_exists'));
                            redirect(site_url('auth/maker'));
                            exit();
                    }
                    $maker_query[0]->image    = json_decode($maker_query[0]->image);
                    $this->smarty->assign(array(
                        'maker'       =>  $maker_query[0],
                        'count_img'     =>  count($maker_query[0]->image)
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

            $this->smarty->display('auth/maker/edit');
	}
}