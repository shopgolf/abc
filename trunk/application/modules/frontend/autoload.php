<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->library('session');
$this->load->language('frontend');
$this->load->language('button');

$this->database_connect_status 	= FALSE;
$this->load->database();

if($this->db->conn_id != FALSE){
    $this->database_connect_status = TRUE;
    $this->load->model('user_model');
    $this->load->library('smarty3');
    $this->load->library('bookinglib');
    $this->bookinglib = new bookinglib();
    
    $this->smarty = new CI_Smarty3();
    $static     =   json_decode(STATIC_URL);
    $userinfo   =   (isset($this->session->userdata['user_id']))?$this->user_model->find_by(array('id'=>$this->session->userdata['user_id'])):'';
    $this->smarty->assign(array(
        'bookinglib'    =>  $this->bookinglib,
        "lang"          =>  $this->lang->language,
        'site_url'      =>  base_url(),
        "UPLOAD_DIR"    =>  base_url().'static/uploads/',
        "static_ft"     =>  base_url($static->STATIC_FT),
        'ship_price'    =>  $static->SHIP_PRICE,
        'controller'    =>  $this->uri->segment(1),
        'menu_rewrite'  =>  'danh-muc'
    ));
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$this->datetime = date('Y-m-d H:i:s');