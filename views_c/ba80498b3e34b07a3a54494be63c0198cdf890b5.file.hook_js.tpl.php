<?php /* Smarty version Smarty-3.1.11, created on 2015-07-17 07:04:26
         compiled from "application\views\templates\backend\hook_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1507655a8468a540571-83649875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba80498b3e34b07a3a54494be63c0198cdf890b5' => 
    array (
      0 => 'application\\views\\templates\\backend\\hook_js.tpl',
      1 => 1437022923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1507655a8468a540571-83649875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'link_bk' => 0,
    'controller' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a8468a581c77_10564074',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a8468a581c77_10564074')) {function content_55a8468a581c77_10564074($_smarty_tpl) {?><script type="text/javascript">
function get_Checked_Checkbox_By_Name(Input_Name) {
    var arr = [];
    $("input[name='" + Input_Name + "']:checked:enabled").each(function () {
        arr.push($(this).val());
    });
    document.getElementById("trashAll").value           = arr;
}
function trashAll(){
    var trash = $("#trashAll").val();
    if(trash == ""){
        alert("<?php echo $_smarty_tpl->tpl_vars['lang']->value['deleteInfo'];?>
");return false;
    }
    
    $.ajax({
        type        : "POST",
        cache       : false,
        url         : "<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
/trashAll",
        data        : {id:trash},
        success: function(data) {
            if(data == 1){
               window.location.href="<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['controller']->value;?>
";
            } else {
                alert("<?php echo $_smarty_tpl->tpl_vars['lang']->value['error'];?>
");
            }
            return false;
        }
    });
    
}
</script><?php }} ?>