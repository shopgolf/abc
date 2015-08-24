<?php
$news = $this->news_model->find_by(array('seo_url'=>trim($params1)));

$this->smarty->assign(array(
    'news'      =>      $news[0]
));

$this->smarty->assign(array(
    'content' 	 => $this->smarty->view_tmp('frontend/news/content','content')
));