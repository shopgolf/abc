<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Hotdeal Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Hotdeal extends BACKEND_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->language('hotdeal');
        require_once(APPPATH . 'modules/backend/autoload.php');
        if($this->is_logged_in() == FALSE) {
                $this->session->set_userdata('redirect_uri', current_url());redirect('auth');
        }

        $this->load->model('hotdeal_model');
        $this->set_controller('hotdeal');
        $this->set_model($this->hotdeal_model);
        
        $this->load->library('bookinglib');
        $this->bookinglib = new bookinglib();
        $this->smarty->assign(array(
            "lang"          =>  $this->lang->language
        ));
    }
}