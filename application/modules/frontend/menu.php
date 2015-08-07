<?php
$menu   = $this->menu_model->find_by(array('status'=>1));

$lists  = array();
foreach($menu as $key => $val){
    
    foreach(json_decode($val->category) as $k => $v){
        $category   =   $this->home_model->getCategoryById(array('category_id'=>$v));
        $cate[]     =   $category[0]->name;
    }
    
    $arr            =   new stdClass();
    $arr->name      =   $val->name;
    $arr->category  =   $cate;
      
    $lists[$key]    =   $arr;
    unset($arr);
    unset($cate);
}
$this->smarty->assign(array(
        'lists'          =>       $lists
));
$menu_home  =   $this->smarty->view_tmp('frontend/menu_home','menu_home');
