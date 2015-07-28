<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Home extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                $this->load->language('frontend');//file ngon ngu home_lang.php lat noi sau
				require_once(APPPATH . 'modules/frontend/autoload.php');//load cai file autoload.php file nay dung chung nen include 1 lan thoi
                
                $this->load->model('product_model');//call model home

                //day la thu vien common.js day nhung cai linh tinh thi bo vao day 
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
	}

	public function index(){
		$data                 = $this->product_model->new_product($limit = 12,$offset = FALSE,$order_by = 'DESC',$param = 'id');
		$data_old_product     = $this->product_model->new_product($limit = 12,$offset = FALSE,$order_by = 'RANDOM',$param = 'id');
		$data_topview_product = $this->product_model->new_product($limit = 8,$offset = FALSE,$order_by = 'DESC',$param = 'view');
		$this->smarty->assign(array(
			'title' 	             => 'With one',
			'menu_home'              => 'templates/frontend/menu_home.tpl',
			'content'                => 'frontend/home/index.tpl',
			'page_class'             => 'home',
			'data'		 			 => $data, 
			'data_old_product'		 => $data_old_product, 
			'data_topview_product'   => $data_topview_product, 
		));
		$this->smarty->display('templates/frontend/layout.tpl');//hien thi template cai nay e bit ma
	}
}