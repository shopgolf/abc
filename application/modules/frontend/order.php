<?php
$info = $this->product_model->find_by(array('seo_url'=>trim(strtolower($params1))));
if($this->input->get('token') != md5('shop'.$info[0]->product_id)){
    redirect(site_url());
}

$this->smarty->assign(array(
        'data'               =>       $info[0]
));
$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/order','content')
));
