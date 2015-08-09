<?php
$this->smarty->assign(array(
        'data_slider'          =>       $data_slider
));

$this->smarty->assign(array(
        'slide_category'          =>       $this->category_model->getCategoryById(array('random'=>true,'type'=>1,'limit'=>10,'parent_category_not_null'=>true))
));
$this->smarty->assign(array(
        'slider'          =>       $this->smarty->view_tmp('templates/frontend/slider','slider')
    
));

$content  =   $this->smarty->view_tmp('frontend/home/index','content');
