{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{$lang.add}} {{$lang.product}} <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{$lang.add}} {{$lang.product}}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    {{if isset($validation) && $validation}}
        <div class="bs-example">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{$validation}}
            </div>
        </div>
    {{/if}}
    <span class="error_box"></span>
    <!-- Title, seo, keyword, desctition-->
    <form action="{{$link_bk}}/product/index/add.html" method="post" accept-charset="utf-8" enctype="multipart/form-data" name="validate_scl">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">{{$lang.normal_info}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_code">{{$lang.product_code}}</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                      <input type="text" class="form-control" id="product_code" placeholder="" name="product_code">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="col-md-6">
                    <label>{{$lang.type}} {{$lang.product}}</label>
                    <select class="form-control" name="product_type">
                        {{foreach $type as $vals}}
                            <option>{{$vals->name}}</option>
                        {{/foreach}}
                    </select>
                  </div>
                  <!-- phan loai san pham -->
                  <div class="col-md-6">
                    <label>{{$lang.category}}</label>
                    <select class="form-control" name="category">
                        {{foreach $category as $valss}}
                            <option>{{$valss->name}}</option>
                        {{/foreach}}
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="product_name">{{$lang.product_name}}</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                      <input type="text" class="form-control" id="product_name" placeholder="" name="product_name">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_keyword">{{$lang.seo_keyword}}</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <input type="text" class="form-control" id="seo_keyword" placeholder="about 6 word" name="keyword">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_metadata">{{$lang.seo_metadata}}:</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <textarea class="form-control" id="seo_metadata" rows="4" placeholder="" name="description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="image_product">{{$lang.image}} {{$lang.product}}</label>
                     {{include file = 'auth/product/upload.tpl'}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{$lang.info}} {{$lang.product}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon"><label for="net_price">{{$lang.net_price}}</label></div>
                            <input type="text" class="form-control" id="net_price" placeholder="Giá ban đầu sản phẩm" name="net_price">
                            <input type="hidden" id="net_price_fake" value="" name="net_price_fake">
                        <div class="input-group-addon">{{$lang.ext_price}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                            <div class="input-group-addon"><label for="final_price">{{$lang.final_price}}:</label></div>
                            <input type="text" class="form-control" id="final_price" placeholder="Giá cuối sản phẩm" name="final_price">
                            <input type="hidden" id="final_price_fake" value="" name="final_price_fake">
                        <div class="input-group-addon">{{$lang.ext_price}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-solid box-success">
                      <div class="box-header">
                        <h3 class="box-title">{{$lang.bid}} {{$lang.product}}</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="begin_price">{{$lang.begin_price}}</label></div>
                            <input type="text" class="form-control" id="begin_price" placeholder="" name="begin_price">
                            <input type="hidden" id="begin_price_fake" name="begin_price_fake">
                          <div class="input-group-addon">.000 {{$lang.ext_price}}</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="begin_time">{{$lang.begin_time}}</label></div>
                          <input type="text" class="form-control" id="begin_time" placeholder="" name="begin_time">
                          <div class="input-group-addon">{{$lang.ext_time}}</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="end_time">{{$lang.end_time}}</label></div>
                          <input type="text" class="form-control" id="end_time" placeholder="" name="end_time">
                          <div class="input-group-addon">{{$lang.ext_time}}</div>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="box box-solid box-primary">
                      <div class="box-header">
                        <h3 class="box-title">{{$lang.parameters}} {{$lang.product}}</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>{{$lang.name}}</th>
                              <th>{{$lang.parameters}}</th>
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
                <h3 class="box-title">{{$lang.product_detail}}</h3>
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
              <textarea name="info" cols="40" rows="10" id="info" class="tinymcefull"></textarea>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-12">
          <div class="col-md-3 pull-right">
            <button class="btn btn-block btn-success btn-lg" onclick="return validateForm();">{{$lang.completed}}</button>
          </div>
        </div>
      </div>
    </form>
    <span class="error_box"></span>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script src="{{$static_bk}}/js/autoNumeric.js"></script>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#net_price').autoNumeric('init',{aSign:'',mDec:0, pSign:'s' });
    $("#net_price").blur(function() {
        document.getElementById("net_price_fake").value       = UnFormatNumber($("#net_price").val());
    });
    
    $('#final_price').autoNumeric('init',{aSign:'',mDec:0, pSign:'s' });
    $("#final_price").blur(function() {
        document.getElementById("final_price_fake").value       = UnFormatNumber($("#final_price").val());
    });
    
    $('#begin_price').autoNumeric('init',{aSign:'',mDec:0, pSign:'s' });
    $("#begin_price").blur(function() {
        document.getElementById("begin_price_fake").value       = UnFormatNumber($("#begin_price").val());
    });
});
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'product_code',
        display: '{{$lang.product_code}}',
        rules: 'required',
        class:'alert'
    }, {
        name: 'product_name',
        display: '{{$lang.product_name}}',
        rules: 'required'
    }, {
        name: 'keyword',
        display: '{{$lang.seo_keyword}}',
        rules: 'required'
    }, {
        name: 'description',
        display: '{{$lang.description}}',
        rules: 'required'
    }, {
        name: 'net_price',
        display: '{{$lang.net_price}}',
        rules: 'required'
    }, {
        name: 'info',
        display: '{{$lang.product_detail}}',
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
            form.submit();
        }

        if (evt && evt.preventDefault) {
            evt.preventDefault();
        } else if (event) {
            event.returnValue = false;
        }
    });
}

function FormatNumber(x) {
    if (typeof x === "undefined") {
        return '';
    } else {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ';
    }
};

function UnFormatNumber(x) {
    if (typeof x === "undefined") {
        return '';
    } else {
    return x.toString().replace(/,|VNĐ|\s/g, "");
    }
};
</script>
{{include file = 'templates/backend/footer.tpl'}}