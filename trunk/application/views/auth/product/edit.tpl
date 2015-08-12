{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.product}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.product}}</li>
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
        {{form_open('',["enctype"=>"multipart/form-data","name"=>"validate_scl"])}}
            <div class="row">
              <div class="col-md-6">
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">{{$lang.normal_info}}</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            {{form_label({{$lang.product_code}},'product_code')}}
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                              {{form_input(["class"=>"form-control","id"=>"product_code","placeholder"=>"{{$lang.product_code}}","name"=>"product_code",value=>"{{if isset($product->product_code)}}{{$product->product_code}}{{/if}}"])}}
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            {{form_label({{$lang.type}},'product_type')}}
                            <select class="form-control" name="product_type" id="product_type">
                                {{foreach $type as $key => $vals}}
                                    {{if isset($product->product_type) && $key == $product->product_type}}
                                        <option selected="selected" value="{{$key}}">{{$vals}}</option>
                                    {{else}}
                                        <option value="{{$key}}">{{$vals}}</option>
                                    {{/if}}
                                {{/foreach}}
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            {{form_label({{$lang.category}},'category')}}
                            <select class="form-control" name="category" id="category">
                                {{foreach $category as $keys => $values}}
                                    {{if isset($product->category) && $values->category == $product->category}}
                                        <option selected="selected" value="{{$values->id}}">{{$values->name}}</option>
                                    {{else}}
                                        <option value="{{$values->id}}">{{$values->name}}</option>
                                    {{/if}}
                                {{/foreach}}
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            {{form_label({{$lang.product_child_category}},'category')}}
                            <select class="form-control" name="category_child" id="category_child">
                                <option value="">--------</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                              {{form_label({{$lang.product_name}},'product_name')}}
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                  {{form_input(["class"=>"form-control","id"=>"product_name","placeholder"=>"{{$lang.product_name}}","name"=>"product_name",value=>"{{if isset($product->product_name)}}{{$product->product_name}}{{/if}}"])}}
                                </div>
                        </div>
                      <div class="col-md-12 form-group">
                          {{form_label({{$lang.product_url_seo}},'product_url_seo')}}
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                              {{form_input(["class"=>"form-control","id"=>"product_url_seo","placeholder"=>"{{$lang.product_url_seo}}","name"=>"product_url_seo",value=>"{{if isset($product->seo_url)}}{{$product->seo_url}}{{/if}}"])}}
                          </div>
                      </div>
                      <div class="col-md-12 form-group">
                          {{form_label({{$lang.seo_keyword}},'seo_keyword')}}
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                            {{form_input(["class"=>"form-control","id"=>"seo_keyword","placeholder"=>"{{$lang.seo_keyword}}","name"=>"seo_keyword",value=>"{{if isset($product->keyword)}}{{$product->keyword}}{{/if}}"])}}
                          </div>                  
                      </div>
                      <div class="col-md-12 form-group">
                          {{form_label({{$lang.seo_metadata}},'seo_metadata')}}
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-yellow"></i></span>
                            {{form_textarea(["rows"=>"4","class"=>"form-control","id"=>"seo_metadata","placeholder"=>"{{$lang.seo_metadata}}","name"=>"seo_metadata",value=>"{{if isset($product->description)}}{{$product->description}}{{/if}}"])}}
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
                            <div class="form-group input-group">
                                <div class="input-group-addon">{{form_label({{$lang.net_price}},'net_price')}}</div>
                                  {{form_input(["class"=>"form-control","id"=>"net_price","placeholder"=>"Giá ban đầu sản phẩm","name"=>"net_price",value=>"{{if isset($product->net_price )}}{{$product->net_price}}{{/if}}"])}}
                                  {{form_input(["type"=>"hidden","id"=>"net_price_fake","name"=>"net_price_fake","value"=>"{{if isset($product->net_price )}}{{$product->net_price}}{{/if}}"])}}
                              <div class="input-group-addon">{{$lang.ext_price}}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group input-group">
                                  <div class="input-group-addon">{{form_label({{$lang.final_price}},'final_price')}}</div>
                                  {{form_input(["class"=>"form-control","id"=>"final_price","placeholder"=>"Giá cuối sản phẩm","name"=>"final_price",value=>"{{if isset($product->final_price )}}{{$product->final_price}}{{/if}}"])}}
                                  {{form_input(["type"=>"hidden","id"=>"final_price_fake","name"=>"final_price_fake","value"=>"{{if isset($product->final_price )}}{{$product->final_price}}{{/if}}"])}}
                              <div class="input-group-addon">{{$lang.ext_price}}</div>
                            </div>
                        </div>

                        <div class="col-md-12">
                          <div class="box box-solid box-success">
                              <div class="box-header">
                                <h3 class="box-title">{{$lang.bid}} {{$lang.product}}</h3>
                              </div>
                              <div class="box-body input-group">
                                  <div class="input-group-addon">{{form_label({{$lang.begin_price}},'begin_price')}}</div>
                                  {{form_input(["class"=>"form-control","id"=>"begin_price","placeholder"=>"","name"=>"begin_price",value=>"{{if isset($product->begin_price )}}{{$product->begin_price}}{{/if}}"])}}
                                  {{form_input(["type"=>"hidden","id"=>"begin_price_fake","name"=>"begin_price_fake","value"=>"{{if isset($product->begin_price)}}{{$product->begin_price}}{{/if}}"])}}
                                <div class="input-group-addon">{{$lang.ext_price}}</div>
                              </div>
                              <div class="box-body input-group">
                                  <div class="input-group-addon">{{form_label({{$lang.begin_time}},'begin_time')}}</div>
                                  {{form_input(["class"=>"form-control","id"=>"begin_time","placeholder"=>"","name"=>"begin_time",value=>"{{if isset($product->begin_time )}}{{$product->begin_time}}{{/if}}"])}}
                                <div class="input-group-addon">{{$lang.ext_time}}</div>
                              </div>
                              <div class="box-body input-group">
                                  <div class="input-group-addon"><label for="end_time">{{$lang.end_time}}</label></div>
                                  {{form_input(["class"=>"form-control","id"=>"end_time","placeholder"=>"","name"=>"end_time",value=>"{{if isset($product->end_time )}}{{$product->end_time}}{{/if}}"])}}
                                <div class="input-group-addon">{{$lang.ext_time}}</div>
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
              </div>

              <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{$lang.parameters}} {{$lang.product}}</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="box-body pad">
                    <textarea name="parameters" cols="40" rows="10" id="parameters" class="tinymcefull">{{if isset($product->parameters)}}{{$product->parameters}}{{/if}}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="box box-info">
                  <div class="box-header">
                    <div class="box-header with-border">
                      <h3 class="box-title">{{$lang.product_detail}}</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="box-body pad">
                    <textarea name="info" cols="40" rows="10" id="info" class="tinymcefull">{{if isset($product->info)}}{{$product->info}}{{/if}}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-3 pull-right">
                  <button class="btn btn-block btn-success btn-lg" onclick="return validateForm();">{{$lang.completed}}</button>
                </div>
              </div>
            </div>
        {{form_input(["type"=>"hidden","id"=>"id","name"=>"id","value"=>"{{if isset($product->id)}}{{$product->id}}{{/if}}"])}}
    {{form_close()}}
    <span class="error_box"></span>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script src="{{$static_bk}}/js/autoNumeric.js"></script>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>
{{include file = 'templates/backend/datetimepicker.tpl'}}
<script type="text/javascript">
$(document).ready(function() {
    $("#product_code").focus();
    $("#product_code").on('blur',function(){
        if($("#product_code").val() == ""){
            $("#product_code").focus();
            $('#product_code').addClass( 'alert-error' );
            $('#product_code').parent().addClass( 'alert-error' );
        } else {
            $("#product_name").focus();
            $('#product_code').removeClass( 'alert-error' );
            $('#product_code').parent().removeClass( 'alert-error' );
        }
    });
    
    $("#product_name").on('blur',function(){
        if($("#product_name").val() == ""){
                $("#product_name").focus();
                $('#product_name').addClass( 'alert-error' );
                $('#product_name').parent().addClass( 'alert-error' );
        } else {
                $("#net_price").focus();
                $('#product_name').removeClass( 'alert-error' );
                $('#product_name').parent().removeClass( 'alert-error' );
        }
    });
    
    $("#net_price").on('blur',function(){
        if($("#net_price").val() == ""){
            $("#net_price").focus();
            $('#net_price').addClass( 'alert-error' );
            $('#net_price').parent().addClass( 'alert-error' );
        } else {
            $('#net_price').removeClass( 'alert-error' );
            $('#net_price').parent().removeClass( 'alert-error' );
        }
    });
    
    $("#seo_keyword").on('blur',function(){
        $("#seo_metadata").focus();
    });
    
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
    
    $("#product_name").on('blur',function(){
        setTimeout(function () {
        $.ajax({
                url : '/auth/product/convertUrl',
                type: "POST",
                data : {product_name:$("#product_name").val()},
                cache: true,
                success:function(responseData) 
                {
                    var data    = JSON.parse(responseData);
                    if(data['error'] == 1){
                        alert("{{$lang.error_contacts_ad}}");
                    } else {
                        document.getElementById("product_url_seo").value        = data['response'];
                        document.getElementById("seo_keyword").value            = $("#product_name").val();
                        //document.getElementById("seo_metadata").value           = $("#product_name").val();
                    }
                },
                error: function() 
                {

                }
            });
        }, 1000);
    });
    
    $("#category").on('change',function(e){
        setTimeout(function () {
            $.ajax({
                url : '/auth/product/getCategoryChild/',
                type: "POST",
                data : {category : $("#category").val()},
                cache: true,
                beforeSend: function(){

                },
                success:function(data) 
                {
                    if(data){
                        var json = JSON.parse(data);
                        emptySelectBoxById('category_child',json);
                        delete json;
                    } else {
                        document.getElementById('category_child').innerHTML = "<option value=''>Không có</option>";
                    }
                },
                error: function() 
                {
                    alert("Lỗi! Contact Admin!");
                }
            });
        },1000);
        e.preventDefault();	//STOP default action
   });
    
});

function emptySelectBoxById(eid, value) {
    if(value){
        var text = "";
        $.each(value, function(k, v) {
                //display the key and value pair
                if(k != ""){
                    text += "<option value='" + k + "'>" + v + "</option>";
                }
        });
        document.getElementById(eid).innerHTML = text;
        delete text;
    }
}

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
$(function() {
    $("#begin_time").datetimepicker({ theme:'dark',format:'d-m-Y H:i:s' });
    $("#end_time").datetimepicker({ theme:'dark',format:'d-m-Y H:i:s' });
});
</script>
{{include file = 'templates/backend/footer.tpl'}}