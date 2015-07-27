{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.role}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.role}}</li>
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
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$lang.input_text}}</h3>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.role_title}},'role_title')}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.role_title}}",'value'=>"{{if isset($role->title)}}{{$role->title}}{{/if}}",'name'=>'role_title','id'=>'role_title'])}}
                          </div>
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.role_code}},'role_code')}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.role_code}}",'value'=>"{{if isset($role->code)}}{{$role->code}}{{/if}}",'name'=>'role_code','id'=>'role_code'])}}
                          </div>
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.role_description}},'role_description')}}
                              {{form_textarea(["rows"=>"4","class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.role_description}}",'value'=>"{{if isset($role->description)}}{{$role->description}}{{/if}}",'name'=>'role_description','id'=>'role_description'])}}
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
        name: 'role_title',
        display: '{{$lang.role_title}}',
        rules: 'required'
    }, {
        name: 'role_code',
        display: '{{$lang.role_code}}',
        rules: 'required'
    }, {
        name: 'role_description',
        display: '{{$lang.role_description}}',
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