<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->library('session');
$this->load->helper('backend');
$this->load->language('backend');
$this->load->language('button');

$this->database_connect_status 	= FALSE;
$this->load->database();

if($this->db->conn_id != FALSE){
    $this->database_connect_status = TRUE;
    $this->load->model('user_model');
    $this->load->model('adminlog_model');
    $this->load->library('smarty3');
    $this->smarty = new CI_Smarty3();
    $static     =   json_decode(STATIC_URL);
    $userinfo   =   (isset($this->session->userdata['user_id']))?$this->user_model->find_by(array('id'=>$this->session->userdata['user_id'])):'';
    $this->smarty->assign(array(
        "lang"          =>  $this->lang->language,
        "static_bk"     =>  base_url($static->STATIC_BK),
        "link_bk"       =>  base_url($static->BACKEND),
        'site_url'      =>  base_url(),
        "UPLOAD_DIR"    =>  $static->UPLOAD_DIR,
        "userinfo"      =>  ($userinfo)?$userinfo[0]:'',
        'flash_message' =>  ($this->session->flashdata('flash_message'))?$this->session->flashdata('flash_message'):''
    ));
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$this->datetime = date('Y-m-d H:i:s');