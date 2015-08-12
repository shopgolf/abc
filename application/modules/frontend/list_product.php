<?php
$special_products                   =   $this->product_model->find_by(array('status'=>1),'product_id,product_code,product_name,seo_url,image,net_price',TRUE,array('key'=>'checkout','value'=>'DESC',1));
$json                               =   json_decode($special_products->image);
$special_products->image            =   $json[0];
$special_products->product_link     =   $this->bookinglib->build_url($special_products->seo_url);

$this->smarty->assign(array(
    'data_category'         => $this->category_model->find_by('','name,id,seo_url'),
    'data'                  => $this->product_model->find_by(array('status'=>1),"id,seo_url,product_name,net_price,image,product_code,description",FALSE,array('key'=>'id','value'=>'DESC'),'18'),
    'pagination'            => $this->pagination->create_links(),
    'special_products'      => $special_products
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/list_product','list_product')
));