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
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.site_name}},'title',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.site_name}}",'value'=>"{{if isset($configuration->title)}}{{$configuration->title}}{{/if}}",'name'=>'title','id'=>'title'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.company}},'company',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.company}}",'value'=>"{{if isset($configuration->company)}}{{$configuration->company}}{{/if}}",'name'=>'company','id'=>'company'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.site_logo}},'site_logo',['class'=>'fa fa-check'])}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                {{form_input(["type"=>"file","class"=>"upload",'placeholder'=>"{{$lang.site_logo}}",'onchange'=>'getValueById(this)','accept'=>'image/*','id'=>'logo_site'])}}
                                {{form_input(["class"=>"form-control",'placeholder'=>"",'value'=>"{{if isset($configuration->logo_site)}}{{$configuration->logo_site}}{{/if}}",'name'=>'logo_site','id'=>'logo_site_fake'])}}
                                {{form_input(["type"=>"hidden","class"=>"form-control",'placeholder'=>"",'value'=>'','name'=>'savelogo_site','id'=>'savelogo_site'])}}
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.address}},'address',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.address}}",'value'=>"{{if isset($configuration->address)}}{{$configuration->address}}{{/if}}",'name'=>'address','id'=>'address'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.phone}},'phone',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.phone}}",'value'=>"{{if isset($configuration->phone)}}{{$configuration->phone}}{{/if}}",'name'=>'phones','id'=>'phone'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.email}},'email',['class'=>'fa fa-check'])}}
                            {{form_input(["type"=>"email","class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.email}}",'value'=>"{{if isset($configuration->email)}}{{$configuration->email}}{{/if}}",'name'=>'email','id'=>'email'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.tax_codes}},'tax_codes',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.tax_codes}}",'value'=>"{{if isset($configuration->tax_codes)}}{{$configuration->tax_codes}}{{/if}}",'name'=>'tax_codes','id'=>'tax_codes'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.bank_name}},'bank_name',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.bank_name}}",'value'=>"{{if isset($configuration->bank_name)}}{{$configuration->bank_name}}{{/if}}",'name'=>'bank_name','id'=>'bank_name'])}}
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.account_name}},'account_name',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.account_name}}",'value'=>"{{if isset($configuration->account_name)}}{{$configuration->account_name}}{{/if}}",'name'=>'account_name','id'=>'account_name'])}}
                        </div>
                    
                        <div class="col-md-12 form-group">
                            {{form_label({{$lang.logo_bank}},'logo_bank')}}
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                                {{form_input(["type"=>"file","class"=>"upload",'placeholder'=>"{{$lang.logo_bank}}",'onchange'=>'getValueById(this)','accept'=>'image/*','id'=>'logo_bank'])}}
                                {{form_input(["class"=>"form-control",'placeholder'=>"",'value'=>"{{if isset($configuration->logo_bank)}}{{$configuration->logo_bank}}{{/if}}",'name'=>'logo_bank','id'=>'logo_bank_fake'])}}
                                {{form_input(["type"=>"hidden","class"=>"form-control",'placeholder'=>"",'value'=>'','name'=>'savelogo_bank','id'=>'savelogo_bank'])}}
                            </div>
                        </div>
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.seo_keyword}},'keyword',['class'=>'fa fa-check'])}}
                            {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_keyword}}",'value'=>"{{if isset($configuration->keyword)}}{{$configuration->keyword}}{{/if}}",'name'=>'keyword','id'=>'keyword'])}}
                        </div>  
                        <div class="col-md-12 form-group has-success">
                            {{form_label({{$lang.seo_metadata}},'description',['class'=>'control-label fa fa-bell-o'])}}
                            {{form_textarea(["rows"=>"5","class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.seo_metadata}}",'value'=>"{{if isset($configuration->description)}}{{$configuration->description}}{{/if}}",'name'=>'description','id'=>'description'])}}
                        </div>
                        <div class="col-md-6">
                            <button name="validate_config" class="btn btn-success glyphicon glyphicon-floppy-disk" id="accept">{{$lang.save}}</button>
                            <span id="simple"></span>
                            {{form_input(["type"=>"hidden",'id'=>'id','name'=>'id','value'=>"{{if isset($configuration->id)}}{{$configuration->id}}{{/if}}"])}}

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
        data : {title:$("#title").val(),keyword:$("#keyword").val(),description:$("#description").val(),
                logo_site:$("#logo_site").val(),savelogo_site:$("#savelogo_site").val(),
                logo_bank:$("#logo_bank").val(),savelogo_bank:$("#savelogo_bank").val(),
                tax_codes:$("#tax_codes").val(),account_name:$("#account_name").val(),bank_name:$("#bank_name").val(),
                company:$("#company").val(),address:$("#address").val(),phone:$("#phone").val(),
                email:$("#email").val(),id:$("#id").val()},
        cache: true,
        beforeSend: function(){
            $("#success").html("<img src='{{$static_bk}}/images/icon/loading-2.gif'  /> <br/> Đang xử lí");
        },
        success:function(data)
        {
            if(data == 1){
                alert("{{$lang.error}}");
            } else {
                alert("{{$lang.update_successful}}");
                window.location.href="{{$link_bk}}/configuration.html";
            }
        },
        error: function() 
        {
            $("#success").html("Thao tác thất bại!");
        }
    });
});

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