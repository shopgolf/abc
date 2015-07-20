{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{$lang.configuration}} <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{$lang.configuration}}</li>
    </ol>
  </section>
  <!-- Main content -->
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
                        {{form_open('http://shoppings.dev/auth/configuration/add.html',["name"=>"validate_config"])}}
                        
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.site_title}},'site_title')}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.site_title}}",'value'=>'','name'=>'title','id'=>'site_title'])}}
                          </div>
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.site_logo}},'site_logo')}}
                              <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                  {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.site_logo}}",'value'=>'','name'=>'logo','id'=>'logo'])}}
                              </div>
                          </div>
                          <div class="col-md-12 form-group has-success">
                              {{form_label({{$lang.seo_keyword}},'seo_keyword',['class'=>'fa fa-check'])}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_keyword}}",'value'=>'','name'=>'keyword','id'=>'seo_keyword'])}}
                          </div>
                          <div class="col-md-12 form-group has-warning">
                              {{form_label({{$lang.seo_metadata}},'seo_metadata',['class'=>'control-label fa fa-bell-o'])}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_metadata}}",'value'=>'','name'=>'description','id'=>'seo_metadata'])}}
                          </div>
                            <div class="col-md-6">
                                <input name="validate_config" onclick="return validateForms();" type="button" class="btn btn-success glyphicon glyphicon-floppy-disk" value="SAVE">
                            </div>
                            {{form_close()}}
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /. box -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>
<script type="text/javascript">
function validateForms(){
    new FormValidator('validate_config', [{
        name: 'title',
        display: '1111111111111',
        rules: 'required'
    }], function(errors, evt) {
        /*
         * VALIDATE CODE BY PHUC NGUYEN
         * Email: nguyenvanphuc0626@gmail.com
         */
        var SELECTOR_ERRORS = $('.error_box');
        if (errors.length > 0) {
            SELECTOR_ERRORS.empty();

            for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                SELECTOR_ERRORS.append('<p style="color:red;margin:0"><strong>'+errors[i].message + '</strong></p>');
            }

            SELECTOR_SUCCESS.css({ display: 'none' });
            SELECTOR_ERRORS.fadeIn(200);
            return false;
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