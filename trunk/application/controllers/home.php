<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Home extends FRONTEND_Controller
{	
	public function __construct()
	{
		parent::__construct();				
		$this->load->database();//load db
		$this->load->model('configuration_model');//load model configuration_model
		$this->load->library('session');//load thu vien session
	}
	
	public function index(){
		
		
		$this->load->view('templates/frontend/index',$this->view_data);//include ra view 
	}
	
	
	
}