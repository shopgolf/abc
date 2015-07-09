<?php foreach($news_top_hits as $k=>$news_top_hits_item):?>
	<div class="accordion-inner">
	<?php echo $k+1 .'. '. $news_top_hits_item->title . " (" . $news_top_hits_item->hits . ")";?>
	</div>
<?php endforeach;?>