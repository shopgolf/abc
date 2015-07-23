{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}
<style>
.upload{
width:89%;
}
</style>
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
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.site_title}},'title')}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.site_title}}",'value'=>"{{if isset($configuration->title)}}{{$configuration->title}}{{/if}}",'name'=>'title','id'=>'title'])}}
                        </div>
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.site_logo}},'site_logo')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                {{form_input(["type"=>"file","class"=>"upload",'placeholder'=>"{{$lang.site_logo}}",'onchange'=>'getValueById(this)','accept'=>'image/*'])}}
                                {{form_input(["class"=>"form-control",'placeholder'=>"",'value'=>"{{if isset($configuration->logo)}}{{$configuration->logo}}{{/if}}",'name'=>'image','id'=>'image'])}}
                                {{form_input(["type"=>"hidden","class"=>"form-control",'placeholder'=>"",'value'=>'','name'=>'saveimg','id'=>'saveimg'])}}
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.seo_keyword}},'keyword',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_keyword}}",'value'=>"{{if isset($configuration->keyword)}}{{$configuration->keyword}}{{/if}}",'name'=>'keyword','id'=>'keyword'])}}
                        </div>
                        <div class="col-md-12 form-group has-warning">
                            {{form_label({{$lang.seo_metadata}},'description',['class'=>'control-label fa fa-bell-o'])}}
                            {{form_textarea(["rows"=>"5","class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_metadata}}",'value'=>"{{if isset($configuration->description)}}{{$configuration->description}}{{/if}}",'name'=>'description','id'=>'description'])}}
                        </div>
                        <div class="col-md-6">
                            <button name="validate_config" class="btn btn-success glyphicon glyphicon-floppy-disk" id="accept">{{$lang.save}}</button>
                            <span id="simple"></span>
                            {{form_input(["type"=>"hidden",'value'=>'','name'=>'id','id'=>'id'])}}

                        </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
<script type="text/javascript" src="{{$static_bk}}/js/validate.min.js"></script>
<script type="text/javascript">
$("#accept").on('click',function(){
    $.ajax({
        url : '{{$link_bk}}/configuration/add',
        type: "POST",
        data : {title:$("#title").val(),keyword:$("#keyword").val(),description:$("#description").val(),image:$("#image").val(),saveimg:$("#saveimg").val()},
        cache: true,
        beforeSend: function(){
            $("#success").html("<img src='<?php echo STATIC_URL;?>/backend/images/icon/loading-2.gif' /> <br/> Đang xử lí");
        },
        success:function(data)
        {
            if(data == 1){
                alert("{{$lang.error}}");return false;
            } else {
                alert("{{$lang.update_successful}}");
            }
        },
        error: function() 
        {
            $("#success").html("Thao tác thất bại!");
        }
    });
});
    


function getValueById(input){
        var val   = input.value;

        document.getElementById("image").value       = val.replace("C:\\fakepath\\", "");
        readURL(input);
    }
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (input) {
                $('#saveimg').attr('value', reader.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
{{include file = 'templates/backend/footer.tpl'}}