<?php /* Smarty version Smarty-3.1.11, created on 2015-07-14 21:01:00
         compiled from "application\views\templates\backend\hook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2856455a5161c595597-27830577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae561d5dd725f6d6354a912a4fa3eb1467882667' => 
    array (
      0 => 'application\\views\\templates\\backend\\hook.tpl',
      1 => 1436840704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2856455a5161c595597-27830577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datatables' => 0,
    'lang' => 0,
    'database_connect_status' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a5161c6c9b46_40636435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a5161c6c9b46_40636435')) {function content_55a5161c6c9b46_40636435($_smarty_tpl) {?><div>
<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $_smarty_tpl->tpl_vars['datatables']->value['label'];?>
<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['page_home'];?>
</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['datatables']->value['label'];?>
</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- /  row like, user-->
    <div class="row">
      <!-- Đon đặt hàng -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus box-title"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times box-title"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <?php if ($_smarty_tpl->tpl_vars['database_connect_status']->value!=false){?>
                    <?php echo $_smarty_tpl->getSubTemplate ('templates/backend/datatables.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    
              <?php }else{ ?>
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a><strong>
                            <?php echo $_smarty_tpl->tpl_vars['lang']->value['database_failed'];?>
</strong>
                    </div>
              <?php }?>
            <!-- /.table-responsive -->
          </div>
        </div>
        <!-- / box box-new request -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</div><?php }} ?>