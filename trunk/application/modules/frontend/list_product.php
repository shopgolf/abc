<?php
$special_products                   =   $this->product_model->getProCateById(array('status'=>1),array('key'=>'checkout','value'=>'DESC'),1);
$json                               =   json_decode($special_products[0]->image);
$special_products[0]->image         =   $json[0];
$special_products[0]->product_link  =   $this->bookinglib->build_url($special_products[0]->cat_url,$special_products[0]->seo_url);

$this->smarty->assign(array(
    'build_url'             => $this->bookinglib->build_url(),
    'data_category'         => $this->category_model->getCategoryById(array('parent_category_not_null'=>true,'type'=>1,'random'=>TRUE)),
    'data'                  => $this->product_model->getProCateById(array('status'=>1),array('key'=>$order,'value'=>$order_value),18,$offset),
    'pagination'            => $this->pagination->create_links(),
    'special_products'      => $special_products[0],
    'hardness'              => $this->product_model->hardness(),
    'club_rank'             => $this->product_model->club_rank(),
    'loft'                  => $this->product_model->loft(),
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/list_product','list_product')
));