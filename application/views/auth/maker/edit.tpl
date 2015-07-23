{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">

  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.maker}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.maker}}</li>
    </ol>
  </section>
    
  <section class="content">
      <div class="row">
          <div class="col-md-12">
              <div class="box box-primary">
                  <div class="box-header with-border">
                      <h3 class="box-title">{{$lang.input_text}}</h3>
                      <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                        {{if isset($validation) && $validation}}
                            <div class="bs-example">
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{$validation}}
                                </div>
                            </div>
                        {{/if}}
                        <span class="error_box"></span>
                        {{form_open("",["name"=>"validate_scl"])}}
                                <div class="col-md-6 form-group">
{{form_label({{$lang.maker_name}},'maker_name')}}
{{form_input(["class"=>"form-control","id"=>"maker_name","placeholder"=>"{{$lang.maker_name}}","name"=>"maker_name",value=>"{{if isset($maker->maker_name)}}{{$maker->maker_name}}{{/if}}"])}}
                                </div>
                                <div class="col-md-6 form-group has-success">
{{form_label({{$lang.seo_keyword}},'keyword',['class'=>'control-label fa fa-check'])}}
{{form_input(["class"=>"form-control","id"=>"keyword","placeholder"=>"{{$lang.seo_keyword}}","name"=>"keyword",value=>"{{if isset($maker->keyword)}}{{$maker->keyword}}{{/if}}"])}}
                                </div>
                                <div class="col-md-12 form-group has-warning">
{{form_label({{$lang.maker_description}},'description',['class'=>'control-label fa fa-check'])}}
{{form_textarea(["rows"=>"5","class"=>"form-control","id"=>"description","placeholder"=>"{{$lang.maker_description}}","name"=>"description",value=>"{{if isset($maker->description)}}{{$maker->description}}{{/if}}"])}}
                                </div>
                                
                                <div class="col-md-6">
                                    <button class="btn btn-success glyphicon glyphicon-floppy-disk" onclick="return validateForm();">{{$lang.save}}</button>
                                </div>
                         {{form_close()}}
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   
   
});
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'maker_name',
        display: '{{$lang.maker_name}}',
        rules: 'required',
        class:'alert'
    }, {
        name: 'keyword',
        display: '{{$lang.seo_keyword}}',
        rules: 'required'
    }, {
        name: 'description',
        display: '{{$lang.description}}',
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