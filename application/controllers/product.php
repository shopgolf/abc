<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Product extends CI_controller
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

	public function index()
	{
		$this->smarty->assign(array(
			'title' 	 => 'giới thiệu',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/about/about.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function new_products_go()
	{
		$this->smarty->assign(array(
			'title' 	 => 'Hàng mới về',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/list_product.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function order()
	{
		$this->smarty->assign(array(
			'title' 	 => 'Giỏ hàng',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/order.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function checkout()
	{
		$this->smarty->assign(array(
			'title' 	 => 'Thanh toán',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/checkout.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function top_view_product(){
		$this->smarty->assign(array(
			'title' 	 => 'Sản phẩm xem nhiều',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/list_product.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function sell_product(){
		$this->smarty->assign(array(
			'title' 	 => 'Sản phẩm bán chạy',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/list_product.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}

	public function detail(){
		$this->smarty->assign(array(
			'title' 	 => 'Sản phẩm bán chạy',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/detail.tpl',
			'page_class' => ' product-page right-sidebar category-page ',
		));
		$this->smarty->display('templates/frontend/layout.tpl');
	}
}