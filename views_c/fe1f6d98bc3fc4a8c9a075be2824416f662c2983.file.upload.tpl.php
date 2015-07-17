<?php /* Smarty version Smarty-3.1.11, created on 2015-07-17 06:46:05
         compiled from "application\views\auth\product\upload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:299955a840114a0c60-40475536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe1f6d98bc3fc4a8c9a075be2824416f662c2983' => 
    array (
      0 => 'application\\views\\auth\\product\\upload.tpl',
      1 => 1437090334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299955a840114a0c60-40475536',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a840114a57c0_39986097',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a840114a57c0_39986097')) {function content_55a840114a57c0_39986097($_smarty_tpl) {?><div id="foneadd">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
        <input type="file" accept='image/*' class="upload" id="1" onchange="getValueById(this)">
        <input type="text" class="form-control" id="image1" name="image[]" placeholder="">
        <input type="hidden" name="img-submit[]" id="img-submit-1" value=""/>
    </div>
</div>
<br/><button name="" type="button" class="btn btn-success" id="more">MORE</button>
<script type="text/javascript">
    $(document).ready(function() {
        var fone_add = 2;
        $("#more").on('click',function (e) {
            $("#foneadd").append('<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input type="file" class="upload" id="'+fone_add+'" onchange="getValueById(this)"><input style="width:83.5%" type="text" class="form-control" id="image'+fone_add+'"name="image[]" placeholder=""><input type="hidden" name="img-submit[]" id="img-submit-'+fone_add+'" value=""/>&nbsp;&nbsp;<button name="" type="button" class="btn btn-danger" onclick="javascript:$(this).parent().remove();">DELETE</button></div>');
            fone_add = fone_add+1;
        });
    });
    
    function getValueById(input){
        var id      = input.id;
        var val   = input.value;

        document.getElementById("image"+id).value       = val.replace("C:\\fakepath\\", "");
        readURL(input,id);
    }
    
    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (input) {
                $('#img-submit-'+id).attr('value', reader.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script><?php }} ?>