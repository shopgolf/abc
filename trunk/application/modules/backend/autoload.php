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
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$this->datetime = date('Y-m-d H:i:s');