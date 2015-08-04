<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}
/**
 * Configuration Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */
class Configuration extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('configuration');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                $this->load->model('configuration_model');
                $this->set_controller('configuration');
                $this->set_model($this->configuration_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
	}

	public function index(){
		if($this->database_connect_status){
                        $info   =   $this->configuration_model->find_by();
                        if(empty($info)){
                            $info[0] = array();
                        }
                        $this->smarty->assign(array(
                            "configuration"  =>  $info[0]
                        ));
                        $this->smarty->display('auth/configuration/index');
		}else{
                        $this->smarty->assign(array(
                            "flash_message"  =>  $this->lang->line('database_connect_failed')
                        ));
                        $this->smarty->display('auth/stats/dashboard');
		}
        }
        
        public function upload($params1,$params2){
            if($params1 && $params2){
                preg_match('/data:image\/([^;]*);base64,(.*)/', $params1, $matches);
                $ext        =   $matches[1];
                $data       =   base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $params1));
                file_put_contents('static/uploads/logo/'.md5($params2).'.'.$ext, $data);
                return md5($params2).'.'.$ext;
            }
        }
        
        public function add(){
            if($this->input->server('REQUEST_METHOD')=='POST'){
                
                        $this->view_data["configuration"]                                     = new stdClass();
                        $this->view_data["configuration"]->title                          = $this->input->post('title');
                        $this->view_data["configuration"]->company                        = $this->input->post('company');
                        $this->view_data["configuration"]->keyword                        = $this->input->post('keyword');
                        $this->view_data["configuration"]->description                        = $this->input->post('description');
                        $this->view_data["configuration"]->address                        = $this->input->post('description');
                        $this->view_data["configuration"]->phone                        = $this->input->post('phone');
                        $this->view_data["configuration"]->email                        = $this->input->post('email');
                        $this->view_data["configuration"]->youtube                        = $this->input->post('youtube');
                        $this->view_data["configuration"]->account_name                        = $this->input->post('account_name');
                        $this->view_data["configuration"]->bank_name                        = $this->input->post('bank_name');
                        $this->view_data["configuration"]->tax_codes                        = $this->input->post('tax_codes');
                        
                        $this->load->helper('form');
                        $this->load->helper('character');
                        $this->load->library('form_validation');
                        $rules = array(
                            array(
                                'field'   => 'title',
                                'label'   =>  $this->lang->line('title'),
                                'rules'   => 'required|trim|max_length[150]|xss_clean'
                            ),array(
                                'field'   => 'company',
                                'label'   =>  $this->lang->line('company'),
                                'rules'   => 'required|trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'keyword',
                                'label'   =>  $this->lang->line('seo_keyword'),
                                'rules'   => 'trim|max_length[100]|xss_clean'
                            ),array(
                                'field'   => 'description',
                                'label'   =>  $this->lang->line('description'),
                                'rules'   => 'trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'address',
                                'label'   =>  $this->lang->line('address'),
                                'rules'   => 'trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'phone',
                                'label'   =>  $this->lang->line('phone'),
                                'rules'   => 'trim|max_length[255]|xss_clean'
                            ),array(
                                'field'   => 'email',
                                'label'   =>  $this->lang->line('email'),
                                'rules'   => 'trim|max_length[40]|xss_clean'
                            ),array(
                                'field'   => 'youtube',
                                'label'   =>  $this->lang->line('youtube'),
                                'rules'   => 'trim|max_length[255]|xss_clean'
                            )
                        );
                        $this->form_validation->set_error_delimiters('<p><strong>'.$this->lang->line('error').' : </strong> ',' </p>');
                        $this->form_validation->set_rules($rules);

                        if ($this->form_validation->run()==TRUE){
                                if($this->input->post('savelogo_site')){
                                    $this->view_data["configuration"]->logo_site              = $this->upload($this->input->post('savelogo_site'),$this->input->post('logo_site'));
                                }
                                
                                if($this->input->post('savelogo_bank')){
                                    $this->view_data["configuration"]->logo_bank              = $this->upload($this->input->post('savelogo_bank'),$this->input->post('logo_bank'));
                                }
                                
                                if($this->input->post('id')){
					$this->configuration_model->update($this->view_data["configuration"], $this->input->post('id'));
                                        $logAction                              = '[UpdateConfigurationSuccess] '.$this->lang->line('update_configuration_success');
				}else{
					$params                                 = $this->configuration_model->create($this->view_data["configuration"]);
                                        $logAction                              = '[AddConfigurationSuccess] '.$this->lang->line('add_configuration_success');
				}
                                
				if($logAction){
					$this->session->set_flashdata('flash_message', $this->lang->line('update_successful'));
					$this->adminlog($logAction);
                                        die("0");
				}
                        } else {
                                die("1");
                        }
            }
        }
}