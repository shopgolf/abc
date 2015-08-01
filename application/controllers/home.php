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
                $this->load->model('maker_model');//call model home
                $this->load->model('post_model');//call model home

                //day la thu vien common.js day nhung cai linh tinh thi bo vao day 
                $this->load->library('bookinglib');
                $this->bookinglib = new bookinglib();
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
	}

	public function index(){
		$field = array('id','seo_url','product_name','net_price','image','product_code');
		$data                 = $this->product_model->new_product($field,$limit = 12,$offset = FALSE,$order_by = 'DESC',$param = 'id',$where=array('status'=>1));
		$data_old_product     = $this->product_model->new_product($field,$limit = 12,$offset = FALSE,$order_by = 'RANDOM',$param = 'id',$where=array('status'=>1));
		$data_topview_product = $this->product_model->new_product($field,$limit = 8,$offset = FALSE,$order_by = 'DESC',$param = 'view',$where=array('status'=>1));
		$data_checkout        = $this->product_model->new_product($field,$limit = 6,$offset = FALSE,$order_by = 'DESC',$param = 'checkout',$where=array('status'=>1));
		$data_maker           = $this->maker_model->get_data();
		$field_post           = array('id','seo_url','title','description','feature_img'); 		
		$data_post			  = $this->post_model->data_post($field_post,$limit = 3,$offset = FALSE,$order_by = 'DESC',$param = 'id');	
		//pre($data_post);
		$this->smarty->assign(array(
			'title'                => 'With one',
			'menu_home'            => 'templates/frontend/menu_home.tpl',
			'content'              => 'frontend/home/index.tpl',
			'page_class'           => 'home',
			'data'                 => array_chunk($data,4), 
			'data_old_product'     => array_chunk($data_old_product,4), 
			'data_topview_product' => $data_topview_product, 
			'data_checkout'        => array_chunk($data_checkout, 3), 
			'data_maker'           => $data_maker, 
			'data_post'            => $data_post, 
		));
		$this->smarty->display('templates/frontend/layout.tpl');//hien thi template cai nay e bit ma
	}
}