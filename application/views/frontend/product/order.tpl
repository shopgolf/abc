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
        
    <span class="error_box"></span>
    {{form_open('',["name"=>"validate_scl"])}}
        <div class="page-content checkout-page">
            <h3 class="checkout-sep">1. {{$lang.normal_info}} {{$lang.product}}</h3>
            <div class="box-border">
                <ul>       
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="product_code" class="required">{{$lang.product_code}}</label>
                            <input class="input form-control" type="text" name="" id="product_code" value="{{$data->product_code}}" readonly="true">
                        </div>
                        <input type="hidden" name="" id="c_i_d" value="{{$data->product_id}}">
                        <div class="col-sm-6">
                            <label for="product_name" class="required">{{$lang.product_name}}</label>
                            <input class="input form-control" type="text" name="" id="product_name" value="{{$data->product_name}}" readonly="true">
                        </div>
                        <div class="col-sm-12">
                            <label for="ship_price" class="required">{{$lang.ship_price}}</label>
                            <input class="input form-control" type="text" name="" id="ship_price" value="{{number_format($ship_price,0,'',',')}} {{$lang.vn_currency}}" readonly="true">
                        </div>
                    </li>
                </ul>
            </div>
            
            <h3 class="checkout-sep">{{$lang.your_info}}</h3>
            <div class="box-border">
                <ul>       
                    <li class="row">
                        <div class="col-sm-6">
                            <label for="cu_name" class="required">{{$lang.yourname}}</label>
                            <input class="input form-control" type="text" name="cu_name" id="cu_name">
                        </div>

                        <div class="col-sm-6">
                            <label for="cu_phone" class="required">{{$lang.phone}}</label>
                            <input class="input form-control" type="text" name="cu_phone" id="cu_phone">
                        </div>
                    </li>

                    <li class="row">
                        <div class="col-sm-6">
                            <label for="email">{{$lang.email}}</label>
                            <input class="input form-control" type="text" name="" id="email">
                        </div>

                        <div class="col-sm-6">
                            <label for="cu_address" class="required">{{$lang.address}}</label>
                            <input class="input form-control" type="text" name="" id="cu_address">
                        </div>
                    </li>
                </ul>
            </div>
                            
            <h3 class="checkout-sep">{{$lang.info_order}}</h3>
            <div class="box-border">
                <ul>       
                    <li class="row">
                         <div class="col-sm-12">
                                <label for="quantity" class="required">{{$lang.quantity}}</label>
                                <input class="input form-control" type="text" name="" id="quantity" value="{{$data->quantity}}">
                        </div>
                        {{if $data->final_price}} 
                                {{$sum_price = $data->final_price}}
                        {{else}}
                                {{$sum_price = $data->net_price}}
                        {{/if}}
                        <div class="col-xs-12">
                                <label for="net_fare" class="required">{{$lang.net_fare}}</label>
                                <input class="input form-control" type="text" name="" id="net_fare" value="{{number_format($sum_price,0,'',',')}} {{$lang.vn_currency}}" readonly="true">
                        </div>
                        <div class="col-xs-12">
                                <label for="order_price" class="required">{{$lang.order_price}}</label>
                                <input class="input form-control" type="text" name="" id="order_price" value="" readonly="true">
                        </div>
                    </li>
                </ul>
            </div>
        <button class="button pull-right" onclick="return validateForm();">{{$lang.accept}}</button>
        </div>
        {{form_close()}}
    </div>
</div>

<script type="text/javascript" src="http://shoppings.dev/static/templates/backend/js/validate.min.js"></script>
<script type="text/javascript">
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'title',
        display: '{{$lang.title}}',
        rules: 'required',
        class:'alert'
    }, {
        name: 'link',
        display: '{{$lang.link_detail}}',
        rules: 'required'
    }, {
        name: 'saveimage',
        display: '{{$lang.image}}',
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
</script>