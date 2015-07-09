<table class="table table-striped table-bordered" id="data-table" width="100%">
	<thead>
		<tr>
			<?php foreach($datatables['init_data'] as $item):?>
				<th width="<?php echo isset($item['width'])?$item['width']:""?>"><?php echo isset($item['label'])?$item['label']:""?></th>
			<?php endforeach;?>	
		</tr>
	</thead>
	<tfoot>
		<tr>
			<?php foreach($datatables['init_data'] as $item):?>
				<th width="<?php echo isset($item['width'])?$item['width']:""?>"><?php echo isset($item['label'])&&$item['name']!="button"?$item['label']:""?></th>
			<?php endforeach;?>
		</tr>
	</tfoot>
	<tbody>
	</tbody>
</table>

<script type="text/javascript">
$(function () {
	$('#data-table').dataTable({
		"sPaginationType": "full_numbers",
		"sPaginationType": "bootstrap",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "<?php echo $datatables['json_data']?>",		
		"aoColumnDefs": [
        <?php foreach($datatables['init_data'] as $k=>$item):?>
        	<?php if(isset($item['sort']) && $item['sort']!=FALSE):?>
        	<?php $sort = '['.$k.', "'.$item['sort'].'"'.']'?>
        	<?php endif;?>
     		<?php if(isset($item['searchoptions']) && !$item['searchoptions']):?>
     			{ "bSortable": false, "aTargets": [<?php echo $k;?>] },
     		<?php endif;?>
     	<?php endforeach;?>
			
		],
		"aaSorting": [<?php echo isset($sort)?$sort:"";?>],
		"aoColumns": [
				<?php foreach($datatables['init_data'] as $item):?>
		        	<?php if(isset($item['visible'])&&$item['visible']==false):?>
		        	{"bVisible": false},
		        	<?php else:?>
		        	null,
		        	<?php endif;?>
		        <?php endforeach;?>
		 ],		
		"fnServerData": function( sUrl, aoData, fnCallback ) {
			$.ajax( {
				"url": sUrl,
				"data": aoData,
				"type": "POST",
				"success": fnCallback,
				"dataType": "jsonp",
				"cache": false
			} );
		}
	}).columnFilter({
		sPlaceHolder: "",
		aoColumns: [
		 <?php foreach($datatables['init_data'] as $item):?>
		 	<?php if(isset($item['searchoptions'])&&$item['searchoptions']!=FALSE):?>
			{
			<?php if(isset($item['searchoptions']['type'])):?>type: "<?php echo $item['searchoptions']['type'];?>",<?php endif;?>
			<?php if(isset($item['searchoptions']['values'])):?>values: <?php echo $item['searchoptions']['values'];?>,<?php endif;?>
			
			},
			<?php else:?>
			null,
			<?php endif;?>
		<?php endforeach;?>
		]

	});
	$("div#data-table_filter").html('<?php echo $datatables['filter'];?>');
});
</script>

<style type="text/css">
	select, input{
		width: 100% !important;
		padding: 4px 0px !important;
	}
	.dataTables_processing {
		background-color: white;
		border: 1px solid #DDDDDD;
		color: #999999;
		font-size: 14px;
		height: 30px;
		left: 50%;
		margin-left: -125px;
		margin-top: -15px;
		padding: 14px 0 2px;
		position: absolute;
		text-align: center;
		top: 50%;
		width: 250px;
	}
</style>