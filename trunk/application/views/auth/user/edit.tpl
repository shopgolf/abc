{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.user}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.user}}</li>
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
        {{form_open('',["name"=>"validate_scl"])}}
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">{{$lang.required_info}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 form-group">
                    {{form_label({{$lang.user_username}},'user_username')}}
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                        {{form_input(["class"=>"form-control","id"=>"user_username","placeholder"=>"{{$lang.user_username}}","name"=>"user_username",value=>"{{if isset($user->username)}}{{$user->username}}{{/if}}"])}}
                    </div>
                </div>
                
                <div class="col-md-12 form-group">
                    {{form_label({{$lang.user_password}},'user_password')}}
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                        {{form_input(["type"=>"password","class"=>"form-control","id"=>"user_password","placeholder"=>"{{$lang.user_password}}","name"=>"user_password",value=>""])}}
                    </div>
                </div>
                
                <div class="col-md-12 form-group">
                    {{form_label({{$lang.user_re_password}},'user_re_password')}}
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                        {{form_input(["type"=>"password","class"=>"form-control","id"=>"user_re_password","placeholder"=>"{{$lang.user_re_password}}","name"=>"user_re_password",value=>""])}}
                    </div>
                </div>
                    
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_email}},'user_email')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["type"=>"email","class"=>"form-control","id"=>"user_email","placeholder"=>"{{$lang.user_email}}","name"=>"user_email",value=>"{{if isset($user->email)}}{{$user->email}}{{/if}}"])}}
                        </div>
                </div>
                        
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_active}},'user_active')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_dropdown('user_active', $active_list,"{{if isset($user->active)}}{{$user->active}}{{/if}}","class='form-control'")}}
                        </div>
                </div>
                        
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_group}},'user_group')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_dropdown('user_group', $group_list,"{{if isset($user->group_id)}}{{$user->group_id}}{{/if}}","class='form-control'")}}
                        </div>
                </div>
                    
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{$lang.detail_info}}</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_firstname}},'user_firstname')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["class"=>"form-control","id"=>"user_firstname","placeholder"=>"{{$lang.user_firstname}}","name"=>"user_firstname",value=>"{{if isset($user->firstname)}}{{$user->firstname}}{{/if}}"])}}
                        </div>
                </div>
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_lastname}},'user_lastname')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["class"=>"form-control","id"=>"user_lastname","placeholder"=>"{{$lang.user_lastname}}","name"=>"user_lastname",value=>"{{if isset($user->lastname)}}{{$user->lastname}}{{/if}}"])}}
                        </div>
                </div>
                <div class="col-md-12 form-group">
                       {{form_label({{$lang.user_address}},'user_address')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["class"=>"form-control","id"=>"user_address","placeholder"=>"{{$lang.user_address}}","name"=>"user_address",value=>"{{if isset($user->address)}}{{$user->address}}{{/if}}"])}}
                        </div>
                </div>
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.phone}},'phone')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["class"=>"form-control","id"=>"phone","placeholder"=>"{{$lang.phone}}","name"=>"phone",value=>"{{if isset($user->phone)}}{{$user->phone}}{{/if}}"])}}
                        </div>
                </div>
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_image}},'user_image')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                                {{form_input(["class"=>"form-control","id"=>"user_image","placeholder"=>"{{$lang.user_image}}","name"=>"user_image",value=>"{{if isset($user->image)}}{{$user->image}}{{/if}}"])}}
                        </div>
                </div>
                <div class="col-md-12 form-group">
                        {{form_label({{$lang.user_gender}},'user_gender')}}
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil text-aqua"></i></span>
                            {{form_dropdown('user_gender', array("","Nam","Nữ"),'',"class='form-control'")}}
                        </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-12">
          <div class="col-md-3 pull-right">
            <button class="btn btn-block btn-success btn-lg" onclick="return validateForm();">{{$lang.completed}}</button>
          </div>
        </div>
      </div>
          {{form_input(["type"=>"hidden","id"=>"id","name"=>"id","value"=>"{{if isset($user->id)}}{{$user->id}}{{/if}}"])}}
    {{form_close()}}
    <span class="error_box"></span>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>
{{include file = 'templates/backend/datetimepicker.tpl'}}
<script type="text/javascript">
$(document).ready(function() {
  
  
  
});
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'user_username',
        display: '{{$lang.user_username}}',
        rules: 'required',
        class:'alert'
    }, {
        name: 'user_password',
        display: '{{$lang.user_password}}',
        rules: 'required'
    }, {
        name: 'user_re_password',
        display: '{{$lang.user_re_password}}',
        rules: 'required'
    }, {
        name: 'user_active',
        display: '{{$lang.user_active}}',
        rules: 'required'
    }, {
        name: 'user_group',
        display: '{{$lang.user_group}}',
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
{{include file = 'templates/backend/footer.tpl'}}