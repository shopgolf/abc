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
                        $this->smarty->display('auth/configuration/index');
		}else{
                        $this->smarty->assign(array(
                            "flash_message"  =>  $this->lang->line('database_connect_failed')
                        ));
                        $this->smarty->display('auth/stats/dashboard');
		}
	}
        
        public function add(){
            echo '<pre>';
            print_r('fewafewa');
            echo '</pre>';
            exit;
        }
}