{{if isset($flash_message) && $flash_message != ''}}    
    <div class="bs-example">
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{$flash_message}}
        </div>
    </div>
{{/if}}

<div class="mailbox-controls">
    <!-- Check all button -->
    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
    <div class="btn-group">
        <button class="btn btn-default btn-sm" onclick="trashAll();"><i class="fa fa-trash-o"></i></button><input type="hidden" value="" id="trashAll"/>
    </div>
    <!-- /.btn-group -->
    
        {{if $controller == "hotdeal" || $controller == "promotion" || $controller == "bid"}}
            {{$controller = "product"}}
        {{/if}}
        {{if $permission.add == 1}}
            <a href="{{$link_bk}}/{{$controller}}/index/add.html">
            <button class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{$lang.add}} {{$datatables.label}}</button></a>
        {{/if}}
</div>
<table class="table table-striped table-bordered" id="data-table" width="100%">
	<thead>
		<tr>
                    {{foreach $datatables.init_data as $item}}
                        <th width="{{if $item.width}}{{$item['width']}}{{/if}}">{{if $item.label}}{{$item.label}}{{/if}}</th>
                    {{/foreach}}
		</tr>
	</thead>
	<tfoot>
		<tr>
                    {{foreach $datatables.init_data as $item}}
                        <th width="{{if $item.width}}$item.width{{/if}}">{{if $item.label && $item.name!="button"}}{{$item.label}}{{/if}}</th>
                    {{/foreach}}
		</tr>
	</tfoot>
	<tbody class="mailbox-messages">
	</tbody>
</table>
<script src="{{$static_bk}}/js/iCheck/icheck.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
	$('#data-table').dataTable({
		"sPaginationType": "full_numbers",
		"sPaginationType": "bootstrap",
		"bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "{{$datatables.json_data}}",		
		"aoColumnDefs": [
                    {{foreach $datatables.init_data as $k => $item}}
                        {{if isset($item.searchoptions) && $item.searchoptions!=''}}
                            { "bSortable":false, "aTargets":[{{$k}}] },
                        {{/if}}
                    {{/foreach}}
		],
		"aaSorting": [
                    {{foreach $datatables.init_data as $k => $item}}
                        {{if isset($item.sort) && $item.sort!=FALSE}}
                                [{{$k}},"{{$item['sort']}}"]
                        {{/if}}
                    {{/foreach}}
                ],
		"aoColumns": [
                    {{foreach $datatables.init_data as $k => $item}}
                            {{if isset($item.visible) && $item.visible!=FALSE}}
                                {"bVisible":false}
                            {{else}}
                                        null,
                            {{/if}}
                    {{/foreach}}
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
                    {{foreach $datatables.init_data as $item}}
                        {{if isset($item.searchoptions) && $item.searchoptions!=FALSE}}
                            {{if isset($item.searchoptions.type)}}
                                type: {{$item.searchoptions.type}}
                            {{/if}}
                            {{if isset($item.searchoptions.values)}}
                                values: {{$item.searchoptions.values}}
                            {{/if}}
                        {{else}}
                            null,
                        {{/if}},
                    {{/foreach}}
		]

	});
	$("div#data-table_filter").html('{{$datatables.filter}}');
});

$(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck").addClass('box_unchecked');
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check").addClass('box_checked');
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }          
          $(this).data("clicks", !clicks);
        });
});
</script>

<style type="text/css">
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