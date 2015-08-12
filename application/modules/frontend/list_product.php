<?php
$special_products                   =   $this->product_model->getProCateById(array('status'=>1),array('key'=>'checkout','value'=>'DESC'),1);
$json                               =   json_decode($special_products[0]->image);
$special_products[0]->image         =   $json[0];
$special_products[0]->product_link  =   $this->bookinglib->build_url($special_products[0]->cat_url,$special_products[0]->seo_url);
// $smarty->assign('movies',$movies);
$this->smarty->assign(array(
    'build_url'             => $this->bookinglib->build_url(),
    'data_category'         => $this->category_model->find_by(FALSE,'name,id,seo_url'),
    'data'                  => $this->product_model->getProCateById(array('status'=>1),array('key'=>'id','value'=>'DESC'),18),
    'pagination'            => $this->pagination->create_links(),
    'special_products'      => $special_products[0]
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/list_product','list_product')
));