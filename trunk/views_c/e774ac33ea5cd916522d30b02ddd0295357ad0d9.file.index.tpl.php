<?php /* Smarty version Smarty-3.1.11, created on 2015-07-20 07:01:17
         compiled from "application\views\auth\configuration\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183855ac21083fa525-06443945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e774ac33ea5cd916522d30b02ddd0295357ad0d9' => 
    array (
      0 => 'application\\views\\auth\\configuration\\index.tpl',
      1 => 1437350476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183855ac21083fa525-06443945',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55ac21084258c0_73521726',
  'variables' => 
  array (
    'lang' => 0,
    'validation' => 0,
    'static_bk' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ac21084258c0_73521726')) {function content_55ac21084258c0_73521726($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('templates/backend/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('templates/backend/body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $_smarty_tpl->tpl_vars['lang']->value['configuration'];?>
 <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['page_home'];?>
</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['lang']->value['configuration'];?>
</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['input_text'];?>
</h3>
                      <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                        <?php if (isset($_smarty_tpl->tpl_vars['validation']->value)&&$_smarty_tpl->tpl_vars['validation']->value){?>
                            <div class="bs-example">
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <?php echo $_smarty_tpl->tpl_vars['validation']->value;?>

                                </div>
                            </div>
                        <?php }?>
                        <span class="error_box"></span>
                        <?php echo form_open('http://shoppings.dev/auth/configuration/add.html',array("name"=>"validate_config"));?>

                        
                          <div class="col-md-12 form-group">
                              <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['lang']->value['site_title'];?>
<?php $_tmp1=ob_get_clean();?><?php echo form_label($_tmp1,'site_title');?>

                              <?php echo form_input(array("class"=>"form-control",'placeholder'=>((string)$_smarty_tpl->tpl_vars['lang']->value['input_text'])." ".((string)$_smarty_tpl->tpl_vars['lang']->value['site_title']),'value'=>'','name'=>'title','id'=>'site_title'));?>

                          </div>
                          <div class="col-md-12 form-group">
                              <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['lang']->value['site_logo'];?>
<?php $_tmp2=ob_get_clean();?><?php echo form_label($_tmp2,'site_logo');?>

                              <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                  <?php echo form_input(array("class"=>"form-control",'placeholder'=>((string)$_smarty_tpl->tpl_vars['lang']->value['input_text'])." ".((string)$_smarty_tpl->tpl_vars['lang']->value['site_logo']),'value'=>'','name'=>'logo','id'=>'logo'));?>

                              </div>
                          </div>
                          <div class="col-md-12 form-group has-success">
                              <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['lang']->value['seo_keyword'];?>
<?php $_tmp3=ob_get_clean();?><?php echo form_label($_tmp3,'seo_keyword',array('class'=>'fa fa-check'));?>

                              <?php echo form_input(array("class"=>"form-control",'placeholder'=>((string)$_smarty_tpl->tpl_vars['lang']->value['input_text'])." ".((string)$_smarty_tpl->tpl_vars['lang']->value['seo_keyword']),'value'=>'','name'=>'keyword','id'=>'seo_keyword'));?>

                          </div>
                          <div class="col-md-12 form-group has-warning">
                              <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['lang']->value['seo_metadata'];?>
<?php $_tmp4=ob_get_clean();?><?php echo form_label($_tmp4,'seo_metadata',array('class'=>'control-label fa fa-bell-o'));?>

                              <?php echo form_input(array("class"=>"form-control",'placeholder'=>((string)$_smarty_tpl->tpl_vars['lang']->value['input_text'])." ".((string)$_smarty_tpl->tpl_vars['lang']->value['seo_metadata']),'value'=>'','name'=>'description','id'=>'seo_metadata'));?>

                          </div>
                            <div class="col-md-6">
                                <input name="validate_config" onclick="return validateForms();" type="button" class="btn btn-success glyphicon glyphicon-floppy-disk" value="SAVE">
                            </div>
                            <?php echo form_close();?>

                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /. box -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/js/validate.min.js"></script>
<script type="text/javascript">
function validateForms(){
    new FormValidator('validate_config', [{
        name: 'title',
        display: '1111111111111',
        rules: 'required'
    }], function(errors, evt) {
        /*
         * VALIDATE CODE BY PHUC NGUYEN
         * Email: nguyenvanphuc0626@gmail.com
         */
        var SELECTOR_ERRORS = $('.error_box');
        if (errors.length > 0) {
            SELECTOR_ERRORS.empty();

            for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                SELECTOR_ERRORS.append('<p style="color:red;margin:0"><strong>'+errors[i].message + '</strong></p>');
            }

            SELECTOR_SUCCESS.css({ display: 'none' });
            SELECTOR_ERRORS.fadeIn(200);
            return false;
        } else {
            SELECTOR_ERRORS.css({ display: 'none' });
            SELECTOR_SUCCESS.fadeIn(200);
            form.submit();
        }

        if (evt && evt.preventDefault) {
            evt.preventDefault();
        } else if (event) {
            event.returnValue = false;
        }
    });
}
</script>
<?php echo $_smarty_tpl->getSubTemplate ('templates/backend/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>