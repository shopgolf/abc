<?php /* Smarty version Smarty-3.1.11, created on 2015-07-15 07:02:49
         compiled from "application\views\auth\product\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1632555a47b52657c39-04920041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '841faa84afdea67699d7366b9e77ad4cb2d8da97' => 
    array (
      0 => 'application\\views\\auth\\product\\edit.tpl',
      1 => 1436918568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1632555a47b52657c39-04920041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_55a47b526e83a2_48174696',
  'variables' => 
  array (
    'lang' => 0,
    'validation' => 0,
    'link_bk' => 0,
    'type' => 0,
    'vals' => 0,
    'category' => 0,
    'valss' => 0,
    'static_bk' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a47b526e83a2_48174696')) {function content_55a47b526e83a2_48174696($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('templates/backend/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('templates/backend/body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo $_smarty_tpl->tpl_vars['lang']->value['add'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
 <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['lang']->value['page_home'];?>
</a></li>
      <li class="active"><?php echo $_smarty_tpl->tpl_vars['lang']->value['add'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php if (isset($_smarty_tpl->tpl_vars['validation']->value)&&$_smarty_tpl->tpl_vars['validation']->value){?>
        <div class="bs-example">
            <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $_smarty_tpl->tpl_vars['validation']->value;?>

            </div>
        </div>
    <?php }?>
    <span class="error_box"></span>
    <!-- Title, seo, keyword, desctition-->
    <form action="<?php echo $_smarty_tpl->tpl_vars['link_bk']->value;?>
/product/index/add.html" method="post" accept-charset="utf-8" name='validate_scl'>
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['normal_info'];?>
</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_code"><?php echo $_smarty_tpl->tpl_vars['lang']->value['product_code'];?>
</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                      <input type="text" class="form-control" id="product_code" placeholder="" name="product_code">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="col-md-6">
                    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['type'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</label>
                    <select class="form-control" name="product_type">
                        <?php  $_smarty_tpl->tpl_vars['vals'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vals']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vals']->key => $_smarty_tpl->tpl_vars['vals']->value){
$_smarty_tpl->tpl_vars['vals']->_loop = true;
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['vals']->value->name;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                  <!-- phan loai san pham -->
                  <div class="col-md-6">
                    <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['category'];?>
</label>
                    <select class="form-control" name="category">
                        <?php  $_smarty_tpl->tpl_vars['valss'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['valss']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['valss']->key => $_smarty_tpl->tpl_vars['valss']->value){
$_smarty_tpl->tpl_vars['valss']->_loop = true;
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['valss']->value->name;?>
</option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="product_name"><?php echo $_smarty_tpl->tpl_vars['lang']->value['product_name'];?>
</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                      <input type="text" class="form-control" id="product_name" placeholder="" name="product_name">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_keyword"><?php echo $_smarty_tpl->tpl_vars['lang']->value['seo_keyword'];?>
</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <input type="text" class="form-control" id="seo_keyword" placeholder="about 6 word" name="keyword">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_metadata"><?php echo $_smarty_tpl->tpl_vars['lang']->value['seo_metadata'];?>
:</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <textarea class="form-control" id="seo_metadata" rows="4" placeholder="" name="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="image_product"><?php echo $_smarty_tpl->tpl_vars['lang']->value['image'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</label>
                    <div class="input-group"> 
                        <a class="btn" style="margin: 0 0 10px 2px;" href="javascript:imageManager($('input[name=image]'));">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                        </a>
                      <input type="text" class="form-control" id="image_product" placeholder="Your URL image thumb" class="input-file" ondblclick="imageManager($(this))">
                      
<input type="text" name="resource" value="" id="resource" ondblclick="imageManager($(this))" class="input-file">
<a class="btn" style="margin: 0 0 10px 2px;" href="javascript:imageManager($('input[name=resource]'));">Chọn tài nguyên</a>             
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['info'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><label for="net_price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['price'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['ext_price'];?>
</label></div>
                        <input type="text" class="form-control" id="net_price" placeholder="Amount" name="net_price">
                        <div class="input-group-addon">.000</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><label for="final_price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['price_down'];?>
:</label></div>
                        <input type="text" class="form-control" id="exampleInputAmount" placeholder="" name="final_price">
                        <div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['lang']->value['ext_price'];?>
</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-solid box-success">
                      <div class="box-header">
                        <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['bid'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="begin_price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['begin_price'];?>
</label></div>
                          <input type="text" class="form-control" id="begin_price" placeholder="" name="begin_price">
                          <div class="input-group-addon">.000 <?php echo $_smarty_tpl->tpl_vars['lang']->value['ext_price'];?>
</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="begin_time"><?php echo $_smarty_tpl->tpl_vars['lang']->value['begin_time'];?>
</label></div>
                          <input type="text" class="form-control" id="begin_time" placeholder="" name="begin_time">
                          <div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['lang']->value['ext_time'];?>
</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="end_time"><?php echo $_smarty_tpl->tpl_vars['lang']->value['end_time'];?>
</label></div>
                          <input type="text" class="form-control" id="end_time" placeholder="" name="end_time">
                          <div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['lang']->value['ext_time'];?>
</div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-solid box-primary">
                      <div class="box-header">
                        <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['parameters'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['product'];?>
</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</th>
                              <th><?php echo $_smarty_tpl->tpl_vars['lang']->value['parameters'];?>
</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">1</th>
                              <td><label for="classification">Classification</label></td>
                              <td><input type="text" class="form-control" id="classification" name="classification" placeholder=""></td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td><label for="manufacturer">Manufacturer</label></td>
                              <td><input type="text" class="form-control" id="manufacturer" placeholder="" name="manufacturer"></td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td><label for="model">Model</label></td>
                              <td><input type="text" class="form-control" id="model" placeholder="" name="model"></td>
                            </tr>
                            <tr>
                              <th scope="row">4</th>
                              <td><label for="shaft">Shaft</label></td>
                              <td><input type="text" class="form-control" id="shaft" placeholder="" name="shaft"></td>
                            </tr>
                            <tr>
                              <th scope="row">5</th>
                              <td><label for="count">Count</label></td>
                              <td><input type="text" class="form-control" id="count" placeholder="" name="count"></td>
                            </tr>
                            <tr>
                              <th scope="row">6</th>
                              <td><label for="loft">Loft</label></td>
                              <td><input type="text" class="form-control" id="loft" placeholder="" name="loft"></td>
                            </tr>
                            <tr>
                              <th scope="row">7</th>
                              <td><label for="hardness">Hardness</label></td>
                              <td><input type="text" class="form-control" id="hardness" placeholder="" name="hardness"></td>
                            </tr>
                            <tr>
                              <th scope="row">8</th>
                              <td><label for="gross">Gross weight</label></td>
                              <td><input type="text" class="form-control" id="gross" placeholder="" name="gross"></td>
                            </tr>
                            <tr>
                              <th scope="row">9</th>
                              <td><label for="balance">Balance</label></td>
                              <td><input type="text" class="form-control" id="balance" placeholder="" name="balance"></td>
                            </tr>
                            <tr>
                              <th scope="row">10</th>
                              <td><label for="l-price">List price</label></td>
                              <td><input type="text" class="form-control" id="l-price" placeholder="" name="l-price"></td>
                            </tr>
                            <tr>
                              <th scope="row">11</th>
                              <td><label for="club">Club rank</label></td>
                              <td><input type="text" class="form-control" id="club" placeholder="" name="club"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <!-- textarea -->
          <div class="box box-info">
            <div class="box-header">
              <!-- tools box -->
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['product_detail'];?>
</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <!--editor-->
              <textarea name="info" cols="40" rows="10" id="description" class="tinymcefull"></textarea>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-12">
          <div class="col-md-3 pull-right">
            <button class="btn btn-block btn-success btn-lg" onclick="return checkForm()"><?php echo $_smarty_tpl->tpl_vars['lang']->value['completed'];?>
</button>
          </div>
        </div>
      </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_bk']->value;?>
/js/validate.min.js"></script>
<script type="text/javascript">
function checkForm(){
    new FormValidator('validate_scl', [{
        name: 'product_code',
        display: '<?php echo $_smarty_tpl->tpl_vars['lang']->value['product_code'];?>
',
        rules: 'required',
        class:'alert'
    }, {
        name: 'product_name',
        display: '<?php echo $_smarty_tpl->tpl_vars['lang']->value['product_name'];?>
',
        rules: 'required'
    }, {
        name: 'keyword',
        display: '<?php echo $_smarty_tpl->tpl_vars['lang']->value['seo_keyword'];?>
',
        rules: 'required'
    }, {
        name: 'description',
        display: '<?php echo $_smarty_tpl->tpl_vars['lang']->value['description'];?>
',
        rules: 'required'
    }], function(errors, evt) {

        /*
         * VALIDATE CODE BY PHUC NGUYEN
         * Email: nguyenvanphuc0626@gmail.com
         */

        var SELECTOR_ERRORS = $('.error_box'),
            SELECTOR_SUCCESS = $('.success_box');

        if (errors.length > 0) {
            SELECTOR_ERRORS.empty();

            for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                SELECTOR_ERRORS.append('<p style="color:red;margin:0"><strong>'+errors[i].message + '</strong></p>');
            }
            
            SELECTOR_SUCCESS.css({ display: 'none' });
            SELECTOR_ERRORS.fadeIn(200);
        } else {
            SELECTOR_ERRORS.css({ display: 'none' });
            SELECTOR_SUCCESS.fadeIn(200);
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