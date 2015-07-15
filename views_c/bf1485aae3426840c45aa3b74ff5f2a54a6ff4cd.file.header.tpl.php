<?php /* Smarty version Smarty-3.1.11, created on 2015-07-14 12:01:00
         compiled from "application\views\templates\backend\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2383455a47b52715d33-76488028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf1485aae3426840c45aa3b74ff5f2a54a6ff4cd' => 
    array (
      0 => 'application\\views\\templates\\backend\\header.tpl',
      1 => 1436850057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2383455a47b52715d33-76488028',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a47b5286f341_33375528',
  'variables' => 
  array (
    'static_bk' => 0,
    'site_url' => 0,
    'js' => 0,
    'script' => 0,
    'css' => 0,
    'stylesheet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a47b5286f341_33375528')) {function content_55a47b5286f341_33375528($_smarty_tpl) {?><html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Backend</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/css/bootstrap.min.css" type="text/css"/>
        <link href="<?php echo base_url('third_party/datatables/css/dataTables.bootstrap.css');?>
" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/css/AdminLTE.min.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/css/skin-blue.min.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/js/iCheck/flat/blue.css" type="text/css"/>

        <link rel="stylesheet" href="<?php echo base_url('third_party/datatables/css/dataTables.bootstrap.css');?>
" type="text/css"/>

        <script type="text/javascript" src="<?php echo base_url('third_party/jquery/jquery-1.8.2.min.js');?>
"></script>
        <script type="text/javascript" src="<?php echo base_url('third_party/bootstrap/js/bootstrap.min.js');?>
"></script>
        
        <script language="javascript">
            var baseUrl 	= '<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
';
            var action 		= '';
	</script>
        
        <?php if (isset($_smarty_tpl->tpl_vars['js']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
"></script>
            <?php } ?>
        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['css']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value){
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['stylesheet']->value;?>
"></script>
            <?php } ?>
        <?php }?>
    </head><?php }} ?>