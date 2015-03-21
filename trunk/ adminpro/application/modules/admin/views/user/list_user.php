<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
        	<i class="fa fa-user" style="color:#e07901"></i><?php $title?><small> List </small>
        </h3>
    </div>
</div>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-6">
        <div class="btn-group" id="bulk-action-container" style="display: inline-block;">
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
                <li><a href="http://localhost/pageflex/admin/?admin-page=galleries"> All</a></li>
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
                    <select class="form-control" data-url="http://localhost/pageflex/admin/?admin-page=galleries&amp;action=index&amp;page=" onchange="return false;"><option value="1" selected="selected">1</option>         </select>
                </div>
             </div>
          	</div>        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
    	<form action="">
    		<div class="table-responsive">
                <table class="table table-bordered table-hover"  id="example" class="display" cellspacing="0">
                	<thead>
	                	<tr>
	                		<th>#</th>
	                		<th><input type="checkbox"></th>
	                		<th>Username</th>
	                		<th>Fullname</th>
	                		<th>Email</th>
	                		<th>Role</th>
	                		<th>Activation</th>
	                		<th>Action</th>
	                	</tr>	
                	</thead>
                	<tbody>
                		<?php $stt = 1?>
                		<?php if(!empty($result) && is_array($result)){ foreach($result as $value):?>
	                		<tr>
	                			<td><?php echo $stt++?></td>
	                			<td><input type="checkbox" name="id[]" value="<?php echo $value['id']?>"></td>
	                			<td><?php echo $value['user_name'];?></td>
	                			<td><?php echo $value['user_fullname'];?></td>
	                			<td><?php echo $value['user_email'];?></td>
	                			<td><?php echo $value['user_role'];?></td>
	                			<td>
	                				<?php if($value['user_role'] == 1){ ?>
	                					<a href="javascript:void(0);" class=" label label-success"> Activated</a>
	                				<?php }else{ ?>
	                					<a href="javascript:void(0);" class="label label-danger"> Not Activated</a>	
	                				<?php } ?>
	                			</td>
	                			<td>
	                				<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-files-o"></i></button>
	                				<button type="button" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></button>
	                				<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-minus-circle"></i></button>
	                			</td>
	                		</tr>
                		<?php endforeach; }else{ ?>
							<tr>
								<td colspan="8" style="text-align:center;">Data empty!</td>
							</tr>
						<?php } ?>
                	</tbody>
                </table>
            </div>
    	</form>
    </div>
</div>
<script>
jQuery(document).ready(function(){
	$('#example').dataTable();
});
</script>