<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class News extends CI_controller
{	
	public function __construct() {
		parent::__construct();
                require_once(APPPATH . 'modules/frontend/autoload.php');
                
                $this->load->model('news_model');
                $this->load->model('product_model');
                $this->load->model('category_model');
                $this->load->model('menu_model');
                
                $this->smarty->assign(array(
                    'lang'          =>  $this->lang->language
                ));
                
                require_once APPPATH . 'modules/frontend/menu.php';
                require_once APPPATH . 'modules/frontend/sidebar_left.php';
	}
        
        public function index(){
                require_once APPPATH . 'modules/frontend/news.php';
		$this->smarty->assign(array(
			'title'         => $this->lang->language['tin_tuc'],
			'page_class'    => 'category-page'
		));
		$this->smarty->display('templates/frontend/layout');
        }

        public function detail($params1){
            
                require_once APPPATH . 'modules/frontend/news.php';
		$this->smarty->assign(array(
			'title'         => $this->lang->language['tin_tuc'],
			'page_class'    => 'category-page'
		));
		$this->smarty->display('templates/frontend/layout');
                
	}
}