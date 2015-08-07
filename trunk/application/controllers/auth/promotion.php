<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Promotion Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Promotion extends BACKEND_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->language('promotion');
        require_once(APPPATH . 'modules/backend/autoload.php');
        if($this->is_logged_in() == FALSE) {
                $this->session->set_userdata('redirect_uri', current_url());redirect('auth');
        }

        $this->load->model('promotion_model');
        $this->set_controller('promotion');
        $this->set_model($this->promotion_model);
        
        $this->load->library('bookinglib');
        $this->bookinglib = new bookinglib();
        $this->smarty->assign(array(
            "lang"          =>  $this->lang->language
        ));
    }
}