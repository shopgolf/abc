<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * OrderSuccess Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Ordersuccess extends BACKEND_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->language('ordersuccess');
		require_once(APPPATH . 'modules/backend/autoload.php');
		if($this->is_logged_in() == FALSE) {
			$this->session->set_userdata('redirect_uri', current_url());redirect('auth');
		}
                
                $this->load->model('ordersuccess_model');
                $this->load->model('ordersuccess_model');
                $this->set_controller('ordersuccess');
                $this->set_model($this->ordersuccess_model);
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    "lang"          =>  $this->lang->language
                ));
	}
}