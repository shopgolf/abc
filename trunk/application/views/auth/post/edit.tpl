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
                        <div class="col-md-12 form-group">
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
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea name="description" cols="40" rows="10" id="description" class="tinymcefull">{{if isset($post->description)}}{{$post->description}}{{/if}}</textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.tag}},'tag')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.tag}}",'value'=>"{{if isset($post->tag)}}{{$post->tag}}{{/if}}",'name'=>'tag','id'=>'tag'])}}
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
</script>
{{include file = 'templates/backend/footer.tpl'}}