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
		"sAjaxSource": "{{$datatables.json_data}}",		
		"aoColumnDefs": [
                    {{foreach $datatables.init_data as $k => $item}}
                        {{if isset($item.searchoptions) && $item.searchoptions!=''}}
                            { "bSortable": false, "aTargets": [{{$k}}] },
                        {{/if}}
                    {{/foreach}}
		],
		"aaSorting": [
                    {{foreach $datatables.init_data as $k => $item}}
                        {{if isset($item.sort) && $item.sort!=FALSE}}
                                [{{$k}}, "{{$item['sort']}}"]
                        {{/if}}
                    {{/foreach}}
                ],
		"aoColumns": [
                    {{foreach $datatables.init_data as $k => $item}}
                            {{if isset($item.visible) && $item.visible!=FALSE}}
                                {"bVisible": false}
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