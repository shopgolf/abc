{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">

  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.category}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.category}}</li>
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
{{form_label({{$lang.category_name}},'category_name')}}
{{form_input(["class"=>"form-control","id"=>"category_name","placeholder"=>"{{$lang.category_name}}","name"=>"category_name",value=>"{{if isset($category->category_name)}}{{$category->category_name}}{{/if}}"])}}
                                </div>
                                <div class="col-md-6 form-group has-success">
{{form_label({{$lang.seo_keyword}},'keyword',['class'=>'control-label fa fa-check'])}}
{{form_input(["readonly"=>"true","class"=>"form-control","id"=>"keyword","placeholder"=>"{{$lang.seo_keyword}}","name"=>"keyword",value=>"{{if isset($category->keyword)}}{{$category->keyword}}{{/if}}"])}}
                                </div>
                                <div class="col-md-12 form-group has-warning">
{{form_label({{$lang.category_description}},'description',['class'=>'control-label fa fa-check'])}}
{{form_textarea(["readonly"=>"true","rows"=>"5","class"=>"form-control","id"=>"description","placeholder"=>"{{$lang.category_description}}","name"=>"description",value=>"{{if isset($category->description)}}{{$category->description}}{{/if}}"])}}
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
   $("#category_name").focus();
   $("#category_name").on('blur',function(){
       if($("#category_name").val() == ""){
           $("#category_name").focus();return false;
       } else {
           $("#keyword").removeAttr('readonly');
       }
   });
   $("#keyword").on('blur',function(){
       if($("#keyword").val() == ""){
           $("#keyword").focus();return false;
       } else {
           $("#description").removeAttr('readonly');
       }
   });
});
function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'category_name',
        display: '{{$lang.category_name}}',
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