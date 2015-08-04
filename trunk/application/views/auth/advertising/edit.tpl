{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}
<style>
.upload{
width:89%;
}
</style>
<div class="content-wrapper">

  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.advertising}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.advertising}}</li>
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
                            <div class="col-md-12 form-group has-success">
                                {{form_label({{$lang.title}},'title',['class'=>'control-label fa fa-check'])}}
                                {{form_input(["class"=>"form-control","id"=>"title","placeholder"=>"{{$lang.title}}","name"=>"title",value=>"{{if isset($advertising->title)}}{{$advertising->title}}{{/if}}"])}}
                            </div>
                            <div class="col-md-12 form-group has-success">
                                {{form_label({{$lang.link_detail}},'link',['class'=>'control-label fa fa-check'])}}
                                {{form_input(["class"=>"form-control","id"=>"link","placeholder"=>"{{$lang.link_detail}}","name"=>"link",value=>"{{if isset($advertising->link)}}{{$advertising->link}}{{/if}}"])}}
                            </div>
                            <div class="col-md-12 form-group has-success">
                                {{form_label({{$lang.image}},'image',['class'=>'control-label fa fa-check'])}}
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                    {{form_input(["type"=>"file","class"=>"upload",'placeholder'=>"{{$lang.image}}",'onchange'=>'getValueById(this)','accept'=>'image/*','id'=>'image'])}}
                                    {{form_input(["class"=>"form-control",'placeholder'=>"",'value'=>"{{if isset($advertising->image)}}{{$advertising->image}}{{/if}}",'name'=>'image','id'=>'image_fake'])}}
                                    {{form_input(["type"=>"hidden","class"=>"form-control",'placeholder'=>"",'value'=>'','name'=>'saveimage','id'=>'saveimage'])}}
                                </div>
                            </div>
                            <div class="col-md-12 form-group has-success">
                                {{form_label({{$lang.status}},'status',['class'=>'control-label fa fa-check'])}}
                                <select class="form-control" name="status" id="status">
                                    {{foreach $status_list as $key => $vals}}
                                        {{if isset($advertising->status) && $key == $advertising->status}}
                                            <option selected="selected" value="{{$key}}">{{$vals}}</option>
                                        {{else}}
                                            <option value="{{$key}}">{{$vals}}</option>
                                        {{/if}}
                                    {{/foreach}}
                                </select>
                            </div>
                            <div class="col-md-12 form-group has-success">
                                {{form_label({{$lang.description}},'description',['class'=>'control-label fa fa-check'])}}
                                {{form_textarea(["rows"=>"5","class"=>"form-control","id"=>"description","placeholder"=>"{{$lang.description}}","name"=>"description",value=>"{{if isset($advertising->description)}}{{$advertising->description}}{{/if}}"])}}
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

function getValueById(input){
    var val         = input.value;
    var ids         = input.id;
    document.getElementById(ids+'_fake').value       = val.replace("C:\\fakepath\\", "");
    delete(val);delete(ids);
    readURL(input);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader      = new FileReader();
        var ids         = input.id;
        
        reader.onload = function (input) {
            document.getElementById('save'+ids).value       = reader.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
{{include file = 'templates/backend/footer.tpl'}}