<?php $this->load->view('templates/backend/header'); ?>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>

<?php if (isset($flash_message_error)  && $flash_message_error!=NULL ): ?>
<div class="alert alert-error"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message_error; ?></strong></div>
<?php endif; ?>
<h3>Thống kê</h3>


<style type="text/css">
.center {
	text-align: center !important;
}

#history {
	color: black;
	font-family: Arial;
	font-size: 12px;
	line-height: 1;
}

.table tbody td {
	background: none repeat scroll 0 0 #FFFFFF !important;
}

.table th,.table td {
	border-top: 1px solid #DDDDDD !important;
	line-height: 20px;
	padding: 8px;
	text-align: left;
	vertical-align: top;
}

.table-striped tbody tr:nth-child(2n+1) td,.table-striped tbody tr:nth-child(2n+1) th
	{
	background-color: #F9F9F9 !important;
}

.table th {
	font-weight: bold !important;
}

.table-bordered th,.table-bordered td {
	border-left: 1px solid #DDDDDD !important;
}

.table,.with-head {
	border: none !important;
	margin-bottom: 1.667em;
}

.table-bordered {
	-moz-border-bottom-colors: none;
	-moz-border-left-colors: none;
	-moz-border-right-colors: none;
	-moz-border-top-colors: none;
	border-collapse: separate;
	border-color: #DDDDDD #DDDDDD #DDDDDD -moz-use-text-color !important;
	border-image: none !important;
	border-radius: 4px 4px 4px 4px !important;
	border-style: solid solid solid none !important;
	border-width: 1px 1px 1px 0 !important;
}

.table thead th,.table thead td,.head {
	background: -moz-linear-gradient(center top, #FFFFFF, #FFFFFF) repeat
		scroll 0 0 transparent !important;
	border-color: white #999999 #828282 #DDDDDD;
	border-style: none;
	border-width: 1px;
	color: black;
	text-shadow: none;
}
</style>
<div>
	<div style="width: 98%">
		<div class="pie_chart_render" style="width: 60%; float: left"></div>
	
		<div id="history" style="width: 40%; float: right">
			<div class="accordion" id="accordion2">
			<?php if(isset($other_statistics)):?>			
				<?php if(isset($news_top_last)):?>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
						<?php echo $this->lang->line('stats_news_last_top')?>
						</a>
					</div>					
					<div id="collapseOne" class="accordion-body collapse in">
						<?php foreach($news_top_last as $k=>$news_top_last_item):?>
							<div class="accordion-inner">
							<?php echo $k+1 .'. '. $news_top_last_item->title . " (" . $news_top_last_item->created . ")";?>
							</div>
						<?php endforeach;?>
					</div>					
				</div>
				<?php endif;?>
				
				<?php if(isset($news_top_hits)):?>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
						<?php echo $this->lang->line('stats_news_top_hits')?>
						</a>
					</div>					
					<div id="collapse2" class="accordion-body collapse">
					<!-- top 10 hits -->						
							<!-- datapiker -->
							<link rel="stylesheet" href="<?php echo base_url();?>third_party/bootstrap/css/bootstrap-datetimepicker.min.css">
							<script type="text/javascript" src="<?php echo base_url();?>third_party/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
							<script type="text/javascript" src="<?php echo base_url();?>static/templates/backend/js/main.js"></script>
							<script type="text/javascript" src="<?php echo base_url();?>static/templates/backend/js/view_hits_news.js"></script>
							<div id="datetimepicker" class="input-append">
								<?php 
								echo form_input(array('type' => 'text', 'name' => 'published', 'id' => 'published', 'data-format' => 'yyyy-MM-dd'));   				
								?>
								<span class="add-on">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar">
								</i>
								</span>
							</div>
							<script type="text/javascript">
								var published = "<?php echo date("Y-m-d",time())?>";
							</script>
							
							<a style="margin-left: 50px;margin-top: -11px;" href="<?php base_url();?>stats/list_news_hits"  id="view-hits" class="btn btn-primary" value="Update" type="submit" name="submit">Xem</a>
							
							
							<!-- datapiker -->
							<div id="content-top-hits">
								<?php foreach($news_top_hits as $k=>$news_top_hits_item):?>
									<div class="accordion-inner">
									<?php echo $k+1 .'. '. $news_top_hits_item->title . " (" . $news_top_hits_item->hits . ")";?>
									</div>
								<?php endforeach;?>
							</div>											
						<!-- end top 10 hits -->					
					</div>					
				</div>
				<?php endif;?>
				
				<?php foreach($other_statistics as $k=>$item):?>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse">
							(<?php echo $item['total'];?>)  <?php echo $item['title'];?>
							</a>
						</div>
					</div>
				<?php endforeach;?>
			<?php endif;?>
	</div>
		</div>
	
		<div class="bar_chart_render" style="width: 60%; float: left"></div>
		<div class="pie_chart_render" style="width: 60%; float: left"></div>
	
	</div>
</div>
<div style="clear: both;"></div>

<script src="<?php echo base_url();?>third_party/highcharts/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
(function($){
	   var chartType = {
			pie_chart : {
	         chart: { type: 'pie' },
	         title: {},
	         tooltip: {
	        	    pointFormat: '{point.percentage} %',
	            	percentageDecimals: 2
	         },
	         plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                        color: '#000000',
	                        connectorColor: '#000000',
	                        formatter: function() {
	                            return '<b>'+ this.point.name +'</b>: '+ this.y +' <?php echo $this->lang->line('stats_post')?>, '+ (this.point.percentage).toFixed(2)+ ' %';
	                        },
	                    },
	                }
	         },
	         xAxis: {},
	         yAxis: {},
	         series: []
	      },
	      
	      bar_chart : {
              chart: {type: 'bar'},
              title: {},
              xAxis: {},
              yAxis: {},
              legend: {
                  backgroundColor: '#FFFFFF',
                  reversed: true
              },
              tooltip: {
                  formatter: function() {
                      return ''+
                          this.series.name +': '+ this.y +'';
                  }
              },
              plotOptions: {
                  series: {
                      stacking: 'normal'
                  }
              },
             series: []
	      }
	   };
	   
	   var methods = {
	      init:
	         function (chartName, options) {
	            return this.each(function(i) {
	               optsThis = options[i];
	               chartType[chartName].chart.renderTo = this;
	               optsHighchart = $.extend (true, {}, chartType[chartName], optsThis);
	               new Highcharts.Chart (optsHighchart);
	            });
	         }
	   };
	   $.fn.cbhChart = function (action,objSettings) {
	      if ( chartType[action] ) {
	         return methods.init.apply( this, arguments );
	      } else if ( methods[action] ) {
	         return methods[method].apply(this,Array.prototype.slice.call(arguments,1));
	      } else if ( typeof action === 'object' || !action ) {
	         $.error( 'Invalid arguments to plugin: jQuery.cbhChart' );
	      } else {
	         $.error( 'Action "' +  action + '" does not exist on jQuery.cbhChart' );
	      }
	   };
	})(jQuery);

	$(function(){
	   chart_news = {
	      title: { text: '<?php echo $this->lang->line('stats_news')?>' },
	      series: [{
	    	   data: <?php echo isset($series_data_news)?$series_data_news:""?>
	      }]
	   };

	   chart_data = {
		         plotOptions: {
		                pie: {
		                    allowPointSelect: true,
		                    cursor: 'pointer',
		                    dataLabels: {
		                        enabled: true,
		                        color: '#000000',
		                        connectorColor: '#000000',
		                        formatter: function() {
		                            return '<b>'+ this.point.name +'</b>: '+ this.y +' files, '+ (this.point.percentage).toFixed(2)+ ' %';
		                        },
		                    },
		                }
		         },
			      title: { text: '<?php echo $this->lang->line('stats_data')?>' },
			      series: [{
			    	  data: <?php echo isset($series_data_data)?$series_data_data:""?>
			      }]
		};

	   chart_advertising = {
			      title: { text: '<?php echo $this->lang->line('stats_advertising')?>' },			      
		          xAxis: {
		                categories: [<?php echo isset($series_category_advertising)?$series_category_advertising:""?>]
		          },
		          yAxis: {
		                min: 0,
		                title: {
		                    text: ''
		                }
		          },
			      series: [<?php echo isset($series_data_advertising_disable)?$series_data_advertising_disable:""?>,<?php echo isset($series_data_advertising_active)?$series_data_advertising_active:""?>]
		};
			
		pie_chart_array = [chart_news , chart_data];
		bar_chart_array = [chart_advertising];
		$('.pie_chart_render').cbhChart('pie_chart', pie_chart_array);
	    $('.bar_chart_render').cbhChart('bar_chart', bar_chart_array);	   
	});
	$(function(){
		$("dt#opened").click();
	});
</script>


<?php $this->load->view('templates/backend/footer'); ?>