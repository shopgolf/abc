<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
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
                $this->load->model('maker_model');
                
                $this->load->library("pagination");
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

	public function new_products_go($params1=3)
	{
		$offset      = ($params1-1) * 18;
		$this->pagination->initialize(pagination(base_url().$this->lang->language['hang_moi_ve'],100));
		$order       = 'id';
		$order_value = 'DESC';
                require_once APPPATH . 'modules/frontend/list_product.php';
                $this->smarty->assign(array(
			'title'         => $this->lang->language['title_hang_moi_ve'],
			'page_class'    => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function order($params1=NULL)
	{
                $this->load->model('checkout_model');
                require_once APPPATH . 'modules/frontend/order.php';
                
		$this->smarty->assign(array(
			'title'      => $this->lang->language['add_to_cart'],
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function checkout($params1=NULL,$params2=NULL)
	{
		$this->smarty->assign(array(
			'title' 	 => 'Thanh toán',
			'menu_home'  => 'templates/frontend/menu_page.tpl',
			'content'    => 'frontend/product/checkout.tpl',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function top_view_product($params1=3){
		$offset      = ($params1-1) * 18;
		$this->pagination->initialize(pagination(base_url().$this->lang->language['xem_nhieu'],100));
		$order       = 'view';
		$order_value = 'DESC';
                require_once APPPATH . 'modules/frontend/list_product.php';
		$this->smarty->assign(array(
			'title'         => $this->lang->language['title-xem-nhieu'],
			'page_class'    => 'category-page'
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function sell_product($params1=3){
		$offset      = ($params1-1) * 18;
		$this->pagination->initialize(pagination(base_url().$this->lang->language['xem_nhieu'],100));
		$order       = 'checkout';
		$order_value = 'DESC';
        require_once APPPATH . 'modules/frontend/list_product.php';
		$this->smarty->assign(array(
			'title'         => $this->lang->language['title-xem-nhieu'],
			'page_class'    => 'category-page'
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function detail($params1=NULL,$params2=NULL){
        $info               =   $this->product_model->find_by(array('seo_url'=>trim($params2)));
        if(empty($info)){
            redirect(base_url());
        }
        $data               =   $this->product_model->getProCateById(array('status'=>1),array('key'=>'checkout','value'=>'DESC'),5);
        $data_related       =   $this->product_model->getProCateById(array('status'=>1,'category'=>$info[0]->category),array('key'=>'checkout','value'=>'DESC'),5);
                
		$this->smarty->assign(array(
			'title'        => $this->lang->language['detail'].''.$this->lang->language['product'],
			'page_class'   => 'product-page right-sidebar category-page ',
			'data_category' => $this->category_model->getCategoryById(array('parent_category_not_null'=>true,'type'=>1,'random'=>TRUE)),
			'info'         => $info[0],
			'data'         => $data,
			'data_related' => array_chunk($data_related,3),
                        'token'        => md5('shop'.$info[0]->product_id)
		));
                 
                require_once APPPATH . 'modules/frontend/detail_product.php';
		$this->smarty->display('templates/frontend/layout');
	}

	public function category($params1=3){
		pre($params1);
		$offset      = ($params1-1) * 18;
		$this->pagination->initialize(pagination(base_url().$this->lang->language['hang_moi_ve'],100));
		$order       = 'id';
		$order_value = 'DESC';
        require_once APPPATH . 'modules/frontend/list_product.php';
        $this->smarty->assign(array(
			'title'         => $this->lang->language['title_hang_moi_ve'],
			'page_class'    => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}

	public function fillter_list(){
		pre("ok");
	}
        
        public function orderSuccess()
	{
		
		$this->smarty->assign(array(
			'title'      => $this->lang->language['add_to_cart'],
                        'content'    => 'Đơn hàng đã được đặt',
			'page_class' => 'category-page',
		));
		$this->smarty->display('templates/frontend/layout');
	}
}