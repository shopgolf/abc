<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Contact extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                $this->load->language('frontend');//file ngon ngu home_lang.php lat noi sau
				require_once(APPPATH . 'modules/frontend/autoload.php');//load cai file autoload.php file nay dung chung nen include 1 lan thoi
                
                $this->load->model('home_model');//call model home

                //day la thu vien common.js day nhung cai linh tinh thi bo vao day 
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
	}

	public function index(){
		$this->smarty->assign(array(
			'title' 	 => 'liên hệ',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/contact/contact.tpl',
			'page_class' => 'category-page option3',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}
}