<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
        	<i class="fa fa-user" style="color:#e07901"></i><?php $title?><small> List </small>
        </h3>
    </div>
</div>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-6">
        <div class="btn-group" id="bulk-action-container" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Bulk Actions  <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#" onclick="bulk_action('delete'); return false;">Delete</a></li>
                <li><a href="#" onclick="bulk_action('publish'); return false;">Publish</a></li>
                <li><a href="#" onclick="bulk_action('unpublish'); return false;">Unpublish</a></li>    
            </ul>
        </div>
    </div>
    <div class="col-md-4" style="height: 34px;">&nbsp;</div>
</div>
<div class="row" style="padding: 10px 0px;">
    <div class="col-md-6">
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                <span id="view-title">All</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('admin/users/index');?>"> All</a></li>
                <li><a href="javascript:view_allstatus(1,'published');"> Published</a></li>
                <li><a href="javascript:view_allstatus(2,'unpublished');"> Unpublished</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <div class="pull-right">
             	<div class="form-inline" id="pagingControl">
	            <div class="form-group">
                    <label for="Page">Page: </label>
                    <select class="page form-control" >
                        <option selected="selected" value="1">1</option> 
                        <option  value="2">2</option>         
                        <option  value="3">3</option>         
                    </select>
                    <input type="hidden" value="1" class="page-hidden">
                </div>
             </div>
          	</div>        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
    	<form action="" method="post">
    		<div class="table-responsive">
                <table  class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Activation</th>
                            <th>Action</th>
                        </tr>   
                    </thead>
                    <tbody id="result">
                    </tbody>
                </table>
                <ul class="pagination pull-right"></ul>
            </div>
    	</form>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {      
        
        $('#check-all').on('ifChecked', function(event){
            $('input[name="id\[\]"]').iCheck('check');
            $('#bulk-action-container').show();
        });

        $('#check-all').on('ifUnchecked', function(event){
            $('input[name="id\[\]"]').iCheck('uncheck');
            $('#bulk-action-container').hide();
        });
       
    });
    
    // ajax pagination
  
    function load_result(page,change_page){
        var base_url = '<?php echo base_url();?>';
        var html = "";
        page = page || 0;
        change_page = change_page || 1;
        $.post(base_url+'admin/users/index/'+page, {ajax:true,data:change_page}, function(data) {
           if(data.results != ''){
                var stt       = 1;
                var arr       = [];
                $.each(data.role, function(index, val) {
                    arr[val.role_id] = val.role_name;
                });
                $.each(data.results, function(index, val) {
                    html += '<tr>';
                        html += '<td>'+ stt++ +'</td>';
                        html += '<td><input type="checkbox" class="check-list" name="id[]" value="'+val.id+'"></td>';
                        html += '<td>'+val.user_name+'</td>';
                        html += '<td>'+val.user_fullname+'</td>';
                        html += '<td>'+val.user_email+'</td>';
                        html += '<td>'+arr[val.user_role]+'</td>';
                        html += '<td>';
                            if(val.user_activation == 1){
                                html += '<span id="change-'+val.id+'">';
                                    html +='<a href="javascript:change_status('+val.id+',2);" class="label label-success">Activated</a>';
                                html += '</span>';
                            }else{
                                html += '<span id="change-'+val.id+'">';
                                    html +='<a href="javascript:change_status('+val.id+',1);" class="label label-danger"> Not Activated</a>';
                                html += '</span>';
                            }
                        html += '</td>';
                        html += '<td>'; 
                            html += ' <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-files-o"></i></button>';
                            html += ' <button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button> ';
                            html += ' <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button> ';
                        html += '</td>';
                    html += '</tr>';
                });
           }else{
                html += '<tr>';
                    html += '<td colspan="8" style="text-align:center;">Data empty!</td>';
                html += '</tr>'; 
           }
           $('#result').html(html);
           $('.pagination').html(data.pagination);
           $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
        },'json');
    }

    load_result();

    // pagination click
    $('.pagination').on('click', '.click a', function(event) {
        var link = $(this).attr("href").split(/\//g).pop();
        var data = $('.page-hidden').attr('value');
        load_result(link,data);
        return false;
    });
    //page pagination
    $('.page').change(function(event) {
        var base_url = '<?php echo base_url(); ?>';
        var data = $(this).val();
        $('.page-hidden').attr('value',data);
        load_result(false,data);
        return false;
    });
   
    function change_status(id,status){
        var base_url = '<?php echo base_url("admin/users/change_status");?>'; 
        $.post(base_url,{action:true,id:id,status:status}, function(results) {
            var html = '';
            if(status == 1){
                html += '<a href="javascript:change_status('+id+',2);" class="label label-success">Activation</a>';
            }else{
                html += '<a href="javascript:change_status('+id+',1)" class="label label-danger">Not Activation</a>'; 
            }
            $("#change-"+id).html(html);
        });
    }

    function view_allstatus(id,status){
        var base_url = '<?php echo base_url("admin/users/index");?>'; 
        $.post(base_url,{action:'view-status',id:id,status:status}, function(results) {
            var html = '';
            if(id == 1){
                $('#view-title').html('Activated');
            }else if(id == 2){
                $('#view-title').html('Not Activated');
            }
            load_result();
        });
    }

</script>