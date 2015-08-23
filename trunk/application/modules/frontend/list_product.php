<?php
$this->smarty->assign(array(
    'data'                  => $this->product_model->getProCateById($where,array('key'=>$order,'value'=>$order_value),18,$offset),
    'pagination'            => $this->pagination->create_links(),
    'hardness'              => $this->product_model->hardness(),
    'club_rank'             => $this->product_model->club_rank(),
    'loft'                  => $this->product_model->loft(),
    'maker'                 => $this->maker_model->find_by(false,'name,id',$order_by = NULL, $limit = NULL),
));
$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/product/list_product','list_product')
));