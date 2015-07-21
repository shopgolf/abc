<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->library('session');
$this->load->language('frontend');//load file ngon ngu frontend_lang.php trong thu muc languge/vietnam do
$this->load->language('button');
//may cai nay cu include vao 
$this->database_connect_status 	= FALSE;
$this->load->database();

if($this->db->conn_id != FALSE){
    $this->database_connect_status = TRUE;
    $this->load->model('user_model');//load model user
    $this->load->library('smarty3');//load smarty
    $this->smarty = new CI_Smarty3();
    $static     =   json_decode(STATIC_URL);//STATIC_URL day la hang so ma a define trong thu muc configs/dèine
    $userinfo   =   (isset($this->session->userdata['user_id']))?$this->user_model->find_by(array('id'=>$this->session->userdata['user_id'])):'';
    $this->smarty->assign(array(
        "lang"          =>  $this->lang->language,//assin ngon ngu nghia la no assign file frontend_lang vao
        'site_url'      =>  base_url(),
        "UPLOAD_DIR"    =>  $static->UPLOAD_DIR,
        "static_ft"     =>  base_url($static->STATIC_FT)
    ));
	//o tren a assign het tat ca bien can su dung vao neu e them bien nao thi assign vao
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$this->datetime = date('Y-m-d H:i:s');