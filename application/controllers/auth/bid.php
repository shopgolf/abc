<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Bid Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Bid extends BACKEND_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->language('product');
        require_once(APPPATH . 'modules/backend/autoload.php');
        if($this->is_logged_in() == FALSE) {
                $this->session->set_userdata('redirect_uri', current_url());redirect('auth');
        }

        $this->load->model('bid_model');
        $this->set_controller('bid');
        $this->set_model($this->bid_model);
        
        $this->load->library('bookinglib');
        $this->bookinglib = new bookinglib();
        $this->smarty->assign(array(
            "lang"          =>  $this->lang->language
        ));
    }
}