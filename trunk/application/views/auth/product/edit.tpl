{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{if segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}} {{$lang.product}}{{/if}} <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}} {{$lang.product}}{{/if}}</li>
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
        {{form_open('',["enctype"=>"multipart/form-data","name"=>"validate_scl"])}}
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
                      <input type="text" class="form-control" id="product_code" placeholder="" name="product_code" value="{{if isset($product->product_code ) && $product->product_code}}{{$product->product_code}}{{/if}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="col-md-6">
                    <label>{{$lang.type}} {{$lang.product}}</label>
                    <select class="form-control" name="product_type">
                        {{foreach $type as $key => $vals}}
                            {{if isset($product->product_type) && $vals->id == $product->product_type}}
                                <option selected="selected" value="{{$vals->id}}">{{$vals->name}}</option>
                            {{else}}
                                <option value="{{$vals->id}}">{{$vals->name}}</option>
                            {{/if}}
                        {{/foreach}}
                    </select>
                  </div>
                  <!-- phan loai san pham -->
                  <div class="col-md-6">
                    <label>{{$lang.category}}</label>
                    <select class="form-control" name="category">
                        {{foreach $category as $keys => $values}}
                            {{if isset($product->category) && $values->category == $product->category}}
                                <option selected="selected" value="{{$values->id}}">{{$values->name}}</option>
                            {{else}}
                                <option value="{{$values->id}}">{{$values->name}}</option>
                            {{/if}}
                        {{/foreach}}
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="product_name">{{$lang.product_name}}</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                      <input type="text" class="form-control" id="product_name" placeholder="" name="product_name" value="{{if isset($product->product_name ) && $product->product_name}}{{$product->product_name}}{{/if}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_keyword">{{$lang.seo_keyword}}</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <input type="text" class="form-control" id="seo_keyword" placeholder="about 6 word" name="keyword" value="{{if isset($product->keyword ) && $product->keyword}}{{$product->keyword}}{{/if}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="seo_metadata">{{$lang.seo_metadata}}:</label>
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                      <textarea class="form-control" id="seo_metadata" rows="4" placeholder="" name="description">{{if isset($product->description ) && $product->description}}{{$product->description}}{{/if}}</textarea>
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
                            {{form_input(["class"=>"form-control","id"=>"net_price","placeholder"=>"Giá ban đầu sản phẩm","name"=>"net_price",value=>"{{if isset($product->net_price )}}{{$product->net_price}}{{/if}}"])}}
                            {{form_input(["type"=>"hidden","id"=>"net_price_fake","name"=>"net_price_fake","value"=>"{{if isset($product->net_price )}}{{$product->net_price}}{{/if}}"])}}
                        <div class="input-group-addon">{{$lang.ext_price}}</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                            <div class="input-group-addon"><label for="final_price">{{$lang.final_price}}:</label></div>
                            {{form_input(["class"=>"form-control","id"=>"final_price","placeholder"=>"Giá cuối sản phẩm","name"=>"final_price",value=>"{{if isset($product->final_price )}}{{$product->final_price}}{{/if}}"])}}
                            {{form_input(["type"=>"hidden","id"=>"final_price_fake","name"=>"final_price_fake","value"=>"{{if isset($product->final_price )}}{{$product->final_price}}{{/if}}"])}}
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
                            <input type="text" class="form-control" id="begin_price" placeholder="" name="begin_price" value="{{if isset($product->begin_price)}}{{$product->begin_price}}{{/if}}">
                            <input type="hidden" id="begin_price_fake" name="begin_price_fake" value="{{if isset($product->begin_price)}}{{$product->begin_price}}{{/if}}">
                          <div class="input-group-addon">.000 {{$lang.ext_price}}</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="begin_time">{{$lang.begin_time}}</label></div>
                            <input type="text" class="form-control" id="begin_time" placeholder="" name="begin_time" value="{{if isset($product->begin_time)}}{{$product->begin_time}}{{/if}}">
                          <div class="input-group-addon">{{$lang.ext_time}}</div>
                        </div>
                      </div>
                      <div class="box-body">
                        <div class="input-group">
                            <div class="input-group-addon"><label for="end_time">{{$lang.end_time}}</label></div>
                          <input type="text" class="form-control" id="end_time" placeholder="" name="end_time" value="{{if isset($product->end_time ) && $product->end_time}}{{$product->end_time}}{{/if}}">
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
                              <td><input type="text" class="form-control" id="classification" name="classification" placeholder="" value="{{if isset($product->classification ) && $product->classification}}{{$product->classification}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td><label for="manufacturer">Manufacturer</label></td>
                              <td><input type="text" class="form-control" id="manufacturer" placeholder="" name="manufacturer" value="{{if isset($product->manufacturer ) && $product->manufacturer}}{{$product->manufacturer}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td><label for="model">Model</label></td>
                              <td><input type="text" class="form-control" id="model" placeholder="" name="model" value="{{if isset($product->model ) && $product->model}}{{$product->model}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">4</th>
                              <td><label for="shaft">Shaft</label></td>
                              <td><input type="text" class="form-control" id="shaft" placeholder="" name="shaft" value="{{if isset($product->shaft)}}{{$product->shaft}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">5</th>
                              <td><label for="count">Count</label></td>
                              <td><input type="text" class="form-control" id="count" placeholder="" name="count" value="{{if isset($product->count)}}{{$product->count}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">6</th>
                              <td><label for="loft">Loft</label></td>
                              <td><input type="text" class="form-control" id="loft" placeholder="" name="loft" value="{{if isset($product->loft)}}{{$product->loft}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">7</th>
                              <td><label for="hardness">Hardness</label></td>
                              <td><input type="text" class="form-control" id="hardness" placeholder="" name="hardness" value="{{if isset($product->hardness)}}{{$product->hardness}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">8</th>
                              <td><label for="gross">Gross weight</label></td>
                              <td><input type="text" class="form-control" id="gross" placeholder="" name="gross" value="{{if isset($product->gross)}}{{$product->gross}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">9</th>
                              <td><label for="balance">Balance</label></td>
                              <td><input type="text" class="form-control" id="balance" placeholder="" name="balance" value="{{if isset($product->balance)}}{{$product->balance}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">10</th>
                              <td><label for="l-price">List price</label></td>
                              <td><input type="text" class="form-control" id="l-price" placeholder="" name="l-price" value="{{if isset($product->price)}}{{$product->price}}{{/if}}"></td>
                            </tr>
                            <tr>
                              <th scope="row">11</th>
                              <td><label for="club">Club rank</label></td>
                              <td><input type="text" class="form-control" id="club" placeholder="" name="club" value="{{if isset($product->club)}}{{$product->club}}{{/if}}"></td>
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
              <textarea name="info" cols="40" rows="10" id="info" class="tinymcefull">{{if isset($product->info)}}{{$product->info}}{{/if}}</textarea>
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
          {{form_input(["type"=>"hidden","id"=>"id","name"=>"id","value"=>$product->id])}}
    {{form_close()}}
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