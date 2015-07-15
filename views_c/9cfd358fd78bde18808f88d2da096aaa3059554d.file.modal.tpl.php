<?php /* Smarty version Smarty-3.1.11, created on 2015-07-14 10:00:34
         compiled from "application\views\templates\backend\modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:492955a47b52a29d30-82567794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cfd358fd78bde18808f88d2da096aaa3059554d' => 
    array (
      0 => 'application\\views\\templates\\backend\\modal.tpl',
      1 => 1436777335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '492955a47b52a29d30-82567794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_bk' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a47b52a86af3_10695463',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a47b52a86af3_10695463')) {function content_55a47b52a86af3_10695463($_smarty_tpl) {?><!-- Modal -->
<div id="delete_confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Xác nhận</h3>
  </div>
  <div class="modal-body">
    <p>Bạn thật sự muốn xóa?</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger" onlick="" my-type="delete_confirm">Xóa</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Bỏ qua</button>
  </div>
</div>
<script>
	function delete_confirm(url){
		$("button[my-type=delete_confirm]").attr('onclick', 'window.location="'+url+'"');
		return true;
	}
</script>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/css/jquery.fancybox.css">
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/js/box.js"></script><?php }} ?>