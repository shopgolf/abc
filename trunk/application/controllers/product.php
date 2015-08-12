<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                $this->load->language('product');
                require_once(APPPATH . 'modules/frontend/autoload.php');
                
                $this->load->model('product_model');
                $this->load->model('producttype_model');
                $this->load->model('category_model');
                $this->load->model('menu_model');
                
                $this->load->library("pagination");
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
                
                require_once APPPATH . 'modules/frontend/menu.php';
	}

	public function index()
	{
                
		$this->smarty->assign(array(
			'title' 	=> 'giới thiệu',
			'content'       => 'frontend/about/about.tpl',
			'page_class'    => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function new_products_go($params1=NULL)
	{
		$this->pagination->initialize(pagination(base_url().$this->lang->language['hang_moi_ve'],$total = 100));
                require_once APPPATH . 'modules/frontend/list_product.php';
		
                $this->smarty->assign(array(
			'title'         => $this->lang->language['title_hang_moi_ve'],
			'page_class'    => 'category-page'
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function order()
	{
		$this->smarty->assign(array(
			'title'      => 'Giỏ hàng',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/order.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function checkout()
	{
		$this->smarty->assign(array(
			'title' 	 => 'Thanh toán',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/checkout.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function top_view_product(){
		$field         = array('id','seo_url','product_name','net_price','image','product_code','description');
		$url           = base_url().'xem-nhieu';
		$config        = pagination($url,$total = 100);
		$start         = $this->uri->segment(2);
		$this->pagination->initialize($config);
		$data          = $this->product_model->new_product($field,$limit = 18,$offset = $start,$order_by = 'DESC',$param = 'view',$where=array('status'=>1));
		$data_category = $this->category_model->get_data();
		$this->smarty->assign(array(
			'title'         => 'Sản phẩm xem nhiều',
			'menu_home'     => 'templates/frontend/menu_page.tpl',
			'content'       => 'frontend/product/list_product.tpl',
			'page_class'    => 'category-page',
			'data'          => $data,
			'data_category' => $data_category,
			'pagination'    => $this->pagination->create_links() 
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function sell_product(){
		$field         = array('id','seo_url','product_name','net_price','image','product_code','description');
		$url           = base_url().'ban-chay';	
		$config        =  pagination($url,$total = 100);
		$start         = $this->uri->segment(2);
		$this->pagination->initialize($config);
		$data          = $this->product_model->new_product($field,$limit = 18,$offset = $start,$order_by = 'DESC',$param = 'checkout',$where=array('status'=>1));
		$data_category = $this->category_model->get_data();
		$this->smarty->assign(array(
			'title'         => 'Sản phẩm bán chạy',
			'menu_home'     => 'templates/frontend/menu_page.tpl',
			'content'       => 'frontend/product/list_product.tpl',
			'page_class'    => 'category-page',
			'data'          => $data,
			'data_category' => $data_category,
			'pagination'    => $this->pagination->create_links() 
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function detail(){
		$url          = $this->uri->segment(1);
		$id           = array_pop(explode('p', $url));
		$info         = $this->product_model->get_rows($id);
		//pre($info->info);
		$cate_id	  = $info->category;
		$field        = array('id','seo_url','product_name','net_price','image','product_code','description');
		$data         = $this->product_model->new_product($field,$limit = 5,$offset = FALSE,$order_by = 'DESC',$param = 'checkout',$where=array('status'=>1));
		$data_related = $this->product_model->new_product($field,$limit = 18,$offset = FALSE,$order_by = 'DESC',$param = 'checkout',$where=array('status'=>1,'category'=> $cate_id));
		$this->smarty->assign(array(
			'title'        => 'Sản phẩm bán chạy',
			'menu_home'    => 'templates/frontend/menu_page.tpl',
			'content'      => 'frontend/product/detail.tpl',
			'page_class'   => ' product-page right-sidebar category-page ',
			'info'         => $info,
			'data'         => $data,
			'data_related' => array_chunk($data_related,3),
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function category(){
		$field         = array('id','seo_url','product_name','net_price','image','product_code','description');
		$url_cate           = $this->uri->segment(1);
		$cate_id       = array_pop(explode('c', $url_cate));
		$url           = base_url().$url_cate;	
		$config        = pagination($url,$total = 100);
		$start         = $this->uri->segment(2);
		$this->pagination->initialize($config);
		$data          = $this->product_model->new_product($field,$limit = 18,$offset = $start,$order_by = 'DESC',$param = 'checkout',$where=array('status'=>1,'category'=>$cate_id));
		$data_category = $this->category_model->get_data();
		$this->smarty->assign(array(
			'title'         => 'Sản phẩm bán chạy',
			'menu_home'     => 'templates/frontend/menu_page.tpl',
			'content'       => 'frontend/product/list_product.tpl',
			'page_class'    => 'category-page',
			'data'          => $data,
			'data_category' => $data_category,
			'pagination'    => $this->pagination->create_links() 
		));
		$this->smarty->display('templates/frontend/layout');
	}
}