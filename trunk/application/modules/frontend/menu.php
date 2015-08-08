<?php
$menu   = $this->menu_model->find_by(array('status'=>1));

$lists              = array();
$child_category     = array();
foreach($menu as $key => $val){
    
    $arr                =   new stdClass();
    $list_category      =   json_decode($val->category);
    foreach($list_category as $k => $v){
        $category       =   $this->home_model->getCategoryById(array('category_id'=>$v));
        $cate[]         =   array(
            'category_name'     =>      $category[0]->name,
            'seo_url'           =>      $category[0]->seo_url
        );
        
        if($val->id == 5){
            foreach($this->home_model->getCategoryById(array('child_category'=>$v)) as $ks => $vs){
              $child_category[]             =   $vs->name;
            }
            $c_child_category[$k]           =   $child_category;
            $arr->child_category            =   $c_child_category;
            
            unset($child_category);
        } else {
            $arr->child_category  =   '';
        }
    }
    
    $arr->name              =   $val->name;
    $arr->category          =   $cate;
    $lists[$key]            =   $arr;
    
    unset($arr);
    unset($cate);
    unset($c_child_category);
}

$this->smarty->assign(array(
        'lists'          =>       $lists
));
$menu_home  =   $this->smarty->view_tmp('frontend/menu_home','menu_home');
