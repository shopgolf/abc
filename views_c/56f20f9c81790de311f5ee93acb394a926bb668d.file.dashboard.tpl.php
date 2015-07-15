<?php /* Smarty version Smarty-3.1.11, created on 2015-07-14 18:45:59
         compiled from "application\views\auth\stats\dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210555a4f677ecfd92-32616077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56f20f9c81790de311f5ee93acb394a926bb668d' => 
    array (
      0 => 'application\\views\\auth\\stats\\dashboard.tpl',
      1 => 1436799120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210555a4f677ecfd92-32616077',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'count' => 0,
    'flash_message' => 0,
    'list' => 0,
    'vals' => 0,
    'link_bk' => 0,
    'static_bk' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a4f6787a7652_33142541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a4f6787a7652_33142541')) {function content_55a4f6787a7652_33142541($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\sourceweb\\SVN\\OTHERS\\shoppings.dev\\www\\application\\libraries\\smarty3\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('templates/backend/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('templates/backend/body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> WithGone Việt Nam <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $_smarty_tpl->tpl_vars['lang']->value['page_home'];?>
</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['lang']->value['stats_cart'];?>
</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['lang']->value['stats_cart'];?>
</p>
          </div>
          <div class="icon"> <i class="fa fa-shopping-cart"></i> </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
          
    <!-- /  row like, user-->
    <?php if (isset($_smarty_tpl->tpl_vars['flash_message']->value)&&$_smarty_tpl->tpl_vars['flash_message']->value!=''){?>
        <div class="alert alert-success"><a class="close" paymentAir-dismiss="alert">x</a><strong><?php echo $_smarty_tpl->tpl_vars['flash_message']->value;?>
</strong></div>
    <?php }?>
    <div class="row">
      <!-- Đon đặt hàng -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['stats_cart'];?>
</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus box-title"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times box-title"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['product_code'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['quantity'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['info'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['customers'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['address'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['phone'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['created'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['action'];?>
</th>
                  </tr>
                </thead>
                <tbody id="show">
                    <?php  $_smarty_tpl->tpl_vars['vals'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vals']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vals']->key => $_smarty_tpl->tpl_vars['vals']->value){
$_smarty_tpl->tpl_vars['vals']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->product_code;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->quantity;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->info;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->cname;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->caddress;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['vals']->value->cphone;?>
</td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vals']->value->createdTime,"%d-%m-%Y %H:%M:%S");?>
</td>
                                <td>
                                    <a class="btn btn-default btn-sm" data-toggle="modal" href="#delete_confirm" onclick="delete_confirm('/auth/stats/delete/<?php echo $_smarty_tpl->tpl_vars['vals']->value->id;?>
')"><i class="fa fa-check"></i><?php echo $_smarty_tpl->tpl_vars['lang']->value['delete'];?>
</a>
                                    <button class="btn btn-default btn-sm"><a onclick="action_accept('<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/stats/accept/<?php echo $_smarty_tpl->tpl_vars['vals']->value->id;?>
')" ><i class="fa fa-check"></i><?php echo $_smarty_tpl->tpl_vars['lang']->value['accept'];?>
</a></button>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer clearfix"> <span id="loading"></span><a id="showall" href="<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/stats" class="btn btn-sm btn-info btn-flat pull-right">View All Orders</a> </div>
          <!-- /.box-footer -->
        </div>
        <!-- / box box-new request -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready(function() {
    $("#showall").on('click',function(e)
    {
        $("#loading").show();
        $("#loading").html("<img src='<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/images/icon/loading.gif' />");
        setTimeout(function () {
            $.ajax(
                {
                    url : $("#showall").attr("href"),
                    type: "POST",
                    data:{showall:1},
                    cache: true,
                    beforeSend: function(){

                    },
                    success:function(data) 
                    {
                        $("#show").stop().html(data).hide(0).fadeIn("slow");
                        $("#loading").hide();
                    },
                    error: function() 
                    {

                    }
                });
        }, 2000);
        e.preventDefault();	//STOP default action
    });
});

function action_accept(url){
        $.ajax({
            url : url,
            type: "POST",
            cache: true,
            beforeSend: function(){
                
            },
            success:function(data) 
            {
                $.fancybox(data, {
                    margin		: 0,
                    padding		: 0,
                    maxWidth	: '480px',
                    maxHeight	: '400px',
                    fitToView	: false,
                    width		: '100%',
                    height		: '100%',
                    autoSize	: false,
                    closeClick	: false,
                    openEffect	: 'none',
                    closeEffect	: 'none',
                    titleShow	: true,
                    closeBtn	: false,
                }); // fancybox
            },
            error: function() 
            {

            }
        });
}

</script>

<?php echo $_smarty_tpl->getSubTemplate ('templates/backend/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>