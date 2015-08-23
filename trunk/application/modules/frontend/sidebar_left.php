<?php
$special_products                   =   $this->product_model->getProCateById(array('status'=>1),array('key'=>'checkout','value'=>'DESC'),1);
$json                               =   json_decode($special_products[0]->image);
$special_products[0]->image         =   $json[0];
$special_products[0]->product_link  =   $this->bookinglib->build_url($special_products[0]->cat_url,$special_products[0]->seo_url);

$this->smarty->assign(array(
    'data_category'         => $this->category_model->getCategoryById(array('parent_category_not_null'=>true,'type'=>1,'random'=>TRUE)),
    'special_products'      => $special_products[0],
));

$this->smarty->assign(array(
    'sidebar_left' 	 => $this->smarty->view_tmp('templates/frontend/sidebar_left','sidebar_left')
));