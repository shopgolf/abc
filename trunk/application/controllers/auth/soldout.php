<?php 
if (!defined('BASEPATH')){
	exit('No direct script access allowed');
}

/**
 * Soldout Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Soldout extends BACKEND_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->language('soldout');
        require_once(APPPATH . 'modules/backend/autoload.php');
        if($this->is_logged_in() == FALSE) {
                $this->session->set_userdata('redirect_uri', current_url());redirect('auth');
        }

        $this->load->model('soldout_model');
        $this->set_controller('soldout');
        $this->set_model($this->soldout_model);
        
        $this->load->library('bookinglib');
        $this->bookinglib = new bookinglib();
        $this->smarty->assign(array(
            "lang"          =>  $this->lang->language
        ));
    }
}