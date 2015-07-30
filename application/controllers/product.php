<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
class Product extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                $this->load->language('frontend');//file ngon ngu home_lang.php lat noi sau
				require_once(APPPATH . 'modules/frontend/autoload.php');//load cai file autoload.php file nay dung chung nen include 1 lan thoi
                
                $this->load->model('product_model');//call model home
                $this->load->model('producttype_model');
                $this->load->library("pagination");
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

		$field = array('id','seo_url','product_name','net_price','image','product_code','description');
		$config['base_url']        = base_url().'hang-moi-ve/';
		$config['total_rows']      = 100;
		$config['per_page']        = 12;
		$config['uri_segment']     = '2';
		$config['first_link']      = '<<';
		$config['last_link']       = '>>';
		$config['first_tag_open']   = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open']   = '<li >';
		$config['last_tag_close']  = '</li>';
		$config['prev_tag_open']   = '<li >';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li >';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li >';
		$config['num_tag_close']   = '</li>';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Prev';
		$config['cur_tag_open']    = '<li class="active"><a>';
		$config['cur_tag_close']   = '</a></li>';
		$start                     = $this->uri->segment(2);
		$this->pagination->initialize($config);
		$data = $this->product_model->new_product($field,$limit = $config['per_page'],$offset = $start,$order_by = 'DESC',$param = 'id');
		//pre($data);
		$this->smarty->assign(array(
			'title'      => 'Hàng mới về',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/list_product.tpl',
			'page_class' => 'category-page',
			'data'       => $data,
			'pagination' => $this->pagination->create_links() 
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
		$field = array('id','seo_url','product_name','net_price','image','product_code','description');
		$config['base_url']        = base_url().'xem-nhieu/';
		$config['total_rows']      = 100;
		$config['per_page']        = 12;
		$config['uri_segment']     = '2';
		$config['first_link']      = '<<';
		$config['last_link']       = '>>';
		$config['first_tag_open']   = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open']   = '<li >';
		$config['last_tag_close']  = '</li>';
		$config['prev_tag_open']   = '<li >';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li >';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li >';
		$config['num_tag_close']   = '</li>';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Prev';
		$config['cur_tag_open']    = '<li class="active"><a>';
		$config['cur_tag_close']   = '</a></li>';
		$start                     = $this->uri->segment(2);
		$this->pagination->initialize($config);
		$data = $this->product_model->new_product($field,$limit = $config['per_page'],$offset = $start,$order_by = 'DESC',$param = 'view');
		//pre($data);
		$this->smarty->assign(array(
			'title' 	 => 'Sản phẩm xem nhiều',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/list_product.tpl',
			'page_class' => 'category-page',
			'data'       => $data,
			'pagination' => $this->pagination->create_links() 
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