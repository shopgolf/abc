<?php /* Smarty version Smarty-3.1.11, created on 2015-07-15 05:55:50
         compiled from "application\views\auth\stats\accept.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1960855a59376ce46a2-87230847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd824e03f45d842fbae1999cb2f5618afb75df1c' => 
    array (
      0 => 'application\\views\\auth\\stats\\accept.tpl',
      1 => 1436798871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1960855a59376ce46a2-87230847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_bk' => 0,
    'link_bk' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a59377170071_34783264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a59377170071_34783264')) {function content_55a59377170071_34783264($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/css/notice.css" />
<script>
function continues(){
    $("#success").html("<img scr='<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/images/icon/loading.gif' /><br/> Vui lòng chờ");
    setTimeout(function () {
        $.ajax(
            {
                url : '<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/stats/action_accept/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
',
                type: "POST",
                cache: true,
                beforeSend: function(){
                    $("#success").html("<img scr='<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/images/icon/loading.gif'><br/> Đang xử lý");
                },
                success:function(data)
                {
                    setTimeout(function () {
                        if(data==1){
                            $("#success").html("Xác nhận đơn hàng thành công!");
                            setTimeout(function () {
                                closeFancy();
                                window.top.location.href="<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/stats";
                            },2000);
                        }
                    },1000);
                },
                error: function() 
                {
                    $("#success").html("Gởi tin nhắn thất bại!");
                }
            });
     },2000);
}
function closeFancy(){
    parent.jQuery.fancybox.close();
}
</script>

<div id="container2">
    <h3 id="nav2" class="logo">
        <a>VUI LÒNG XÁC NHẬN</a>
    </h3>
    <div id="wufoo-mz9i3ib0wkzqls">
        <div style="padding-left:10px">
            <div id="content-sms">
                <p style="text-align:center;">VUI LÒNG XÁC NHẬN</p>
            </div>
        </div>
        <div class="top-button">
            <button id="submit" class="btn btn-primary" onclick="continues()">Tiếp tục</button>
            <button name="" id="cancel" class="btn" onclick="closeFancy()">ĐÓNG</button>                
        </div>
        <div id="success"></div>
    </div>
</div>
<?php }} ?>