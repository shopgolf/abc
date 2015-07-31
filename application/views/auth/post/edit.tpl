{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{$lang.post}} <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{$lang.post}}</li>
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
                            {{form_label({{$lang.title}},'title')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.site_title}}",'value'=>"{{if isset($post->title)}}{{$post->title}}{{/if}}",'name'=>'title','id'=>'title'])}}
                        </div>
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.seo_url}},'seo_url')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_url}}",'value'=>"{{if isset($post->seo_keyword)}}{{$post->seo_url}}{{/if}}",'name'=>'seo_url','id'=>'seo_url'])}}
                        </div>
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.seo_keyword}},'seo_keyword')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_keyword}}",'value'=>"{{if isset($post->seo_keyword)}}{{$post->seo_keyword}}{{/if}}",'name'=>'seo_keyword','id'=>'seo_keyword'])}}
                        </div>
                        <!--<div class="col-md-12 form-group">
                            {{form_label({{$lang.type}},'type')}}
                            <select class="form-control" name="type" id="type">
                                {{foreach $type as $key => $vals}}
                                    {{if $key == $post->type}}
                                        <option selected="selected" value="{{$key}}">{{$vals}}</option>
                                    {{else}}
                                        <option value="{{$key}}">{{$vals}}</option>
                                    {{/if}}
                                {{/foreach}}
                            </select>
                        </div>-->
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.content}},'description')}}
                            <textarea name="description" cols="40" rows="10" id="description" class="tinymcefull">{{if isset($post->description)}}{{$post->description}}{{/if}}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.tag}},'tag')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.tag}}",'value'=>"{{if isset($post->tag)}}{{$post->tag}}{{/if}}",'name'=>'tag','id'=>'tag'])}}
                        </div>

                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.image}},'image')}}
                            <div id="fileuploader">Upload</div>
                            <div id="_files">
                                {{if isset($post->image)}}
                                    <ul>
                                        {{foreach $post->image as $key => $value}}
                                            <li id="del_{{$key}}">
                                                <input type="hidden" value="{{$value}}" id="{{$value}}" name="files[]"/>
                                                <img width="20%" src="{{$site_url}}{{$UPLOAD_DIR}}/post/{{$value}}" />
                                                <div class="ajax-file-upload-red" id="deleteImg" value="{{$value}}" onclick="deleteImg(this)">{{$lang.delete}}</div>
                                            </li>
                                        {{/foreach}}
                                    </ul>
                                {{/if}}
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <button onclick="return validateForm();" class="btn btn-success glyphicon glyphicon-floppy-disk" id="accept">{{$lang.save}}</button>
                            <span id="simple"></span>
                            {{form_input(["type"=>"hidden",'value'=>'','name'=>'id','id'=>"{{if isset($post->id)}}{{$post->id}}{{/if}}"])}}

                        </div>
                  </div>
              </div>
          </div>
      </div>
    {{form_close()}}
  </section>
</div>
  <style>
#_files ul
{
    margin: 0;
    padding: 0;
    list-style-type: none;
}
#_files ul li { display: inline; }
</style>
<link href="{{$static_bk}}/css/uploadfile.css" rel="stylesheet">
<script src="{{$static_bk}}/js/jquery.uploadfile.min.js"></script>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>

<script type="text/javascript">
$("#title").on('blur',function(){
    setTimeout(function () {
    $.ajax({
            url : '/auth/post/convertUrl',
            type: "POST",
            data : {title:$("#title").val()},
            cache: true,
            success:function(responseData) 
            {
                var data    = JSON.parse(responseData);
                if(data['error'] == 1){
                    alert("{{$lang.error_contacts_ad}}");
                } else {
                    document.getElementById("seo_url").value       = data['response'];
                }
            },
            error: function() 
            {

            }
        });
    }, 1000);
});

function validateForm(){
    new FormValidator('validate_scl', [{
        name: 'title',
        display: '{{$lang.title}}',
        rules: 'required'
    }, {
        name: 'seo_url',
        display: '{{$lang.seo_url}}',
        rules: 'required'
    }, {
        name: 'seo_keyword',
        display: '{{$lang.seo_keyword}}',
        rules: 'required'
    }, {
        name: 'type',
        display: '{{$lang.type}}',
        rules: 'required'
    }, {
        name: 'description',
        display: '{{$lang.content}}',
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

 $("#fileuploader").uploadFile({
    url:"{{$link_bk}}/post/upload/",
    fileName:"myfile",
    showAbort: false,
    showDone: false,
    showDelete: true,
    showProgress: true,
    acceptFiles: "jpeg,png,gif",
    deleteCallback: function (data) {
        setTimeout(function () {
            $.ajax({
                    url : '/auth/post/deleteImage',
                    type: "POST",
                    data : {url:data},
                    cache: true,
                    success:function(responseData) 
                    {
                        if(responseData != 0){
                            var element = document.getElementById(responseData);
                            element.outerHTML = "";
                            delete element;
                            alert("Xóa ảnh thành công!");
                        } else {
                            alert("Delete Image Fail!");
                        }
                    },
                    error: function() 
                    {

                    }
            });
        }, 1000);
    },
    onSuccess: function (files, response, xhr, pd) {
            $("#_files").append("<input type='hidden' name=files[] value='"+response+"' id='"+response+"' />");
    }
});

function deleteImg(input){
    var del = input.getAttribute("value");
    setTimeout(function () {
        $.ajax({
                url : '/auth/post/deleteImage',
                type: "POST",
                data : {url:del},
                cache: false,
                success:function(responseData) 
                {
                    if(responseData != 0){
                        var element = document.getElementById(responseData);
                        element.outerHTML = "";
                        delete element;

                        $(input).parent().remove();

                        alert("Xóa ảnh thành công!");
                    } else {
                        alert("Delete Image Fail!");
                    }
                },
                error: function() 
                {

                }
        });
    }, 1000);
}
</script>
{{include file = 'templates/backend/footer.tpl'}}