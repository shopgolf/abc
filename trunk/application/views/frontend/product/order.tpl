<div class="columns-container">
    <div class="container" id="columns">
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">{{$lang.home}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$lang.order}}</span>
        </div>
        <h2 class="page-heading">
            <span class="page-heading-title2">{{$lang.checkout}}</span>
        </h2>
        
    {{form_open('',["name"=>"validate_scl"])}}
        <div class="page-content checkout-page">
            <h3 class="checkout-sep">1. {{$lang.normal_info}} {{$lang.product}}</h3>
            <div class="box-border">
                <ul>       
                    <li class="row">
                        <div class="col-sm-6">
                            {{form_label({{$lang.product_code}},'product_code')}}
                            {{form_input(['value'=>"{{$data->product_code}}",'name'=>'product_code','id'=>"product_code","class"=>"input form-control","required"=>"required","readonly"=>"true"])}}
                        </div>
                        <input type="hidden" name="c_i_d" id="c_i_d" value="{{$data->product_id}}">
                        <div class="col-sm-6">
                            {{form_label({{$lang.product_name}},'product_name')}}
                            {{form_input(['value'=>"{{$data->product_name}}",'name'=>'product_name','id'=>"product_name","class"=>"input form-control","required"=>"required","readonly"=>"true"])}}
                        </div>
                        <div class="col-sm-12">
                            {{form_label({{$lang.ship_price}},'ship_price')}}
                            {{form_input(['value'=>"{{number_format($ship_price,0,'',',')}} {{$lang.vn_currency}}",'name'=>'ship_price','id'=>"ship_price","class"=>"input form-control","readonly"=>"true"])}}
                            {{form_input(['type'=>'hidden','value'=>"$ship_price",'name'=>'ship_price_fake','id'=>"ship_price_fake","class"=>"input form-control"])}}
                        </div>
                    </li>
                </ul>
            </div>
            
            <h3 class="checkout-sep">{{$lang.your_info}}</h3>
            <div class="box-border">
                
                {{if isset($validation) && $validation}}
                    <div class="bs-example">
                        <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{$validation}}
                        </div>
                    </div>
                {{/if}}
                
                <span class="error_box"></span>
                <ul>       
                    <li class="row">
                        <div class="col-sm-6">
                            {{form_label({{$lang.yourname}},'cu_name')}}
                            {{form_input(['value'=>"",'name'=>'cu_name','id'=>"cu_name","class"=>"input form-control","required"=>"required"])}}
                        </div>

                        <div class="col-sm-6">
                            {{form_label({{$lang.phone}},'cu_phone')}}
                            {{form_input(['value'=>"",'name'=>'cu_phone','id'=>"cu_phone","class"=>"input form-control","onkeypress"=>"checkNumInt(event)","maxlength"=>"11","required"=>"required"])}}
                            
                        </div>
                    </li>

                    <li class="row">
                        <div class="col-sm-6">
                            {{form_label({{$lang.email}},'cu_email')}}
                            {{form_input(['value'=>"",'name'=>'cu_email','id'=>"cu_email","class"=>"input form-control","required"=>"required"])}}
                        </div>

                        <div class="col-sm-6">
                            {{form_label({{$lang.address}},'cu_address')}}
                            {{form_input(['value'=>"",'name'=>'cu_address','id'=>"cu_address","class"=>"input form-control","required"=>"required"])}}
                        </div>
                    </li>
                </ul>
            </div>
                            
            <h3 class="checkout-sep">{{$lang.info_order}}</h3>
            <div class="box-border">
                <ul>       
                    <li class="row">
                         <div class="col-sm-12">
                            {{form_label({{$lang.quantity}},'quantity')}}
                            {{form_input(['value'=>"1",'name'=>'quantity','id'=>"quantity","class"=>"input form-control","required"=>"required"])}}
                        </div>
                        {{if $data->final_price}} 
                                {{$sum_price = $data->final_price}}
                        {{else}}
                                {{$sum_price = $data->net_price}}
                        {{/if}}
                        <div class="col-xs-12">
                            {{form_label({{$lang.net_fare}},'net_fare')}}
                            {{form_input(['value'=>"{{number_format($sum_price,0,'',',')}} {{$lang.vn_currency}}",'name'=>'net_fare','id'=>"net_fare","class"=>"input form-control","readonly"=>"true"])}}                                    
                        </div>
                        <div class="col-xs-12">
                                {{form_label({{$lang.order_price}},'order_price')}}
                                {{form_input(['value'=>"{{number_format($sum_price,0,'',',')}} {{$lang.vn_currency}}",'name'=>'order_price','id'=>"order_price","class"=>"input form-control","readonly"=>"true"])}}
                                {{form_input(["type"=>"hidden",'value'=>"{{$sum_price}}",'name'=>'order_price_fake','id'=>"order_price_fake"])}}
                        </div>
                    </li>
                </ul>
            </div>
        <button class="button pull-right" onclick="return validateForm();">{{$lang.accept}}</button>
        </div>
        {{form_close()}}
    </div>
</div>

<script type="text/javascript" src="http://shoppings.dev/static/templates/backend/js/validate1.min.js"></script>
<script type="text/javascript">
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'cu_name',
        display: '{{$lang.yourname}}',
        rules: 'required',
        class:'alert'
    }, {
        name: 'cu_phone',
        display: '{{$lang.phone}}',
        rules: 'required'
    }, {
        name: 'cu_email',
        display: '{{$lang.email}}',
        rules: 'required'
    }, {
        name: 'cu_address',
        display: '{{$lang.address}}',
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
///,|VNĐ|\s/g
function UnFormatNumber(x) {
    if (typeof x === "undefined") {
        return '';
    } else {
    return x.toString().replace(/,|VNĐ|\s/g, "");
    }
};

function checkNumInt(e)
{
    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;
    if (keycode>31 && (keycode < 48 || keycode > 57))
    {
        e.cancelBubble = true
        e.preventDefault? e.preventDefault() : e.returnValue = false;
    }
}

$(document).ready(function() {
   $("#quantity").on('blur',function(){
       if($(this).val() < 0){
           alert("Số lượng phải lớn hơn 0!");$(this).focus();return false;
       } else {
           document.getElementById("order_price").value             = FormatNumber(UnFormatNumber($('#net_fare').val()) * $("#quantity").val());
           document.getElementById("order_price_fake").value        = UnFormatNumber($('#order_price').val());
       }
   });
   
});
</script>