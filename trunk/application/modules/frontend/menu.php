<?php
$lists              = array();
$child_category     = array();
foreach($this->menu_model->find_by(array('status'=>1)) as $key => $val){
    
    $arr                =   new stdClass();
    $list_category      =   json_decode($val->category);
    foreach($list_category as $k => $v){
        $category       =   $this->menu_model->getCategoryById(array('category_id'=>$v));
        $cate[]         =   array(
            'category_name'     =>      $category[0]->name,
            'seo_url'           =>      $category[0]->seo_url,
            'type'              =>      $category[0]->type
        );
        
        if($val->id == 5){
            foreach($this->menu_model->getCategoryById(array('child_category'=>$v)) as $ks => $vs){
              $child_category[]             =   array(
                  'name'            =>  $vs->name,
                  'seo_url'         =>  $vs->seo_url,
                  'type'            =>  $vs->type
              );
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

switch($this->router->fetch_class()){
    case "home":
        $menu  =   $this->smarty->view_tmp('templates/frontend/menu_home','menu_home');
        break;
    case "product":
        $menu  =   $this->smarty->view_tmp('templates/frontend/menu_page','menu_page');
        break;
}

$this->smarty->assign(array(
    'menu' 	 => $menu
));