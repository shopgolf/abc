<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                require_once(APPPATH . 'modules/frontend/autoload.php');//load cai file autoload.php file nay dung chung nen include 1 lan thoi
                
                $this->load->model('home_model');
                $this->load->model('product_model');
                $this->load->model('maker_model');
                $this->load->model('post_model');
                $this->load->model('advertising_model');
                $this->load->model('menu_model');
                $this->load->model('category_model');
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
	}

	public function index(){
                $string                     =   "id,seo_url,product_name,net_price,image,product_code,description";
                $data_slider                =   $this->advertising_model->find_by(FALSE,'image,link,id,title',FALSE,FALSE);
                $bot_tab_list_cat           =   array();
                $bot_tab_list_pro           =   array();
                
                foreach($this->product_model->listTadBotHome() as $keys => $values){
                    
                    $bot_tab_list_cat[$keys]    =   $values->name;
                    
                    $bot_tab['cat_url']         =   $values->cat_url;
                    $bot_tab['response']        =   $this->product_model->find_by(array('category'=>$values->id,'status'=>1),'product_id,product_name,image,seo_url,net_price,final_price,pecent',FALSE,array('key'=>'view','value'=>'DESC'),12);
                    $bot_tab_list_pro[$keys]             =   $bot_tab;
                }
                
                foreach($this->post_model->find_by(FALSE,'id,seo_url,title,description,feature_img',FALSE,array('key'=>'id','value'=>'DESC'),3) as $key => $value){
                    $lis                =   new stdClass();
                    $lis->id            = $value->id;
                    $lis->seo_url       = $value->seo_url;
                    $lis->title         = $value->title;
                    $lis->description   = $this->bookinglib->getContentDes($value->description);
                    $lis->feature_img   = $value->feature_img;
                    
                    $_data_post[]   =   $lis;
                    unset($lis);
                }
                
		$this->smarty->assign(array(
                        'title'                => $this->lang->language['site_name'],
			'page_class'           => 'home',
			'data'                 => array_chunk($this->product_model->getProCateById(array('status'=>1),array('key'=>'id','value'=>'DESC'),12),4), 
			'data_old_product'     => array_chunk($this->product_model->getProCateById(array('status'=>1),array('key'=>'id','value'=>'RANDOM'),12),4), 
			'data_topview_product' => $this->product_model->getProCateById(array('status'=>1),array('key'=>'view','value'=>'DESC'),8), 
			'data_checkout'        => array_chunk($this->product_model->getProCateById(array('status'=>1),array('key'=>'checkout','value'=>'DESC'),6), 3),
			'data_maker'           => $this->maker_model->find_by(),
			'data_post'            => $_data_post,
			'data_slider'          => $data_slider,
                        'bot_tab_list_cat'         => $bot_tab_list_cat,
                        'bot_tab_list_pro'         => $bot_tab_list_pro
		));
                
                require_once APPPATH . 'modules/frontend/menu.php';
                require_once APPPATH . 'modules/frontend/slider.php';
		$this->smarty->display('templates/frontend/layout');
	}
}