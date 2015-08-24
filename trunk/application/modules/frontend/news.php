<?php
if(isset($params1)){
    $info   = $this->news_model->find_by(array('seo_url'=>trim($params1)));
    $count  = count($info);
    $news   = $info[0];
} else {
    $news   = $this->news_model->find_by(FALSE,'*',FALSE,array('key'=>'id','value'=>'DESC'),12);
    $count  = count($news);
}

$this->smarty->assign(array(
    'news'      =>      $news,
    'count'     =>      $count
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/news/list_news','content')
));