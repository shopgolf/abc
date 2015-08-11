<?php
$this->smarty->assign(array(
    'data_category'         => $this->category_model->find_by('','name,id,seo_url'),
    'data'                  => $this->product_model->find_by(array('status'=>1),"id,seo_url,product_name,net_price,image,product_code,description",FALSE,array('key'=>'id','value'=>'DESC'),'18'),
    'pagination'            => $this->pagination->create_links() 
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/list_product','list_product')
));