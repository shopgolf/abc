{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.group}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{if $segment == "add"}} {{$lang.add}} {{else}}{{$lang.edit}}{{/if}} {{$lang.group}}</li>
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
                              {{form_label({{$lang.group_title}},'group_title')}}
                              {{form_input(["class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.group_title}}",'value'=>"{{if isset($group->title)}}{{$group->title}}{{/if}}",'name'=>'group_title','id'=>'group_title'])}}
                          </div>
                          
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.group_description}},'group_description')}}
                              {{form_textarea(["rows"=>"4","class"=>"form-control",'placeholder'=>"{{$lang.input_text}} {{$lang.group_description}}",'value'=>"{{if isset($group->description)}}{{$group->description}}{{/if}}",'name'=>'group_description','id'=>'group_description'])}}
                          </div>
                          
                          <div class="col-md-12 form-group">
                              {{form_label({{$lang.group_right}},'group_right')}}
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Quyền hạn</th>
                                          <th>Xem</th>
                                          <th>Thêm mới</th>
                                          <th>Chỉnh sửa</th>
                                          <th>Xóa bỏ</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      {{foreach $role as $role_item}}
                                      <tr>
                                          <td>{{$role_item->title}}</td>
                                          {{foreach $permission as $permission_item}}
                                          <td>
                                         {{if $this->group_model->has_right($group->id, $role_item->id, $permission_item->id)}}
                                            {{$checked = 'checked="checked"'}}
                                         {{else}}
                                            {{$cheked = ""}}
                                         {{/if}}
<input class="checkbox_button" type="checkbox" {{$checked}} name="{{$permission_item->id}}__{{$role_item->id}}" value="{{$permission_item->id}}__{{$role_item->id}}" id="{{$permission_item->id}}__{{$role_item->id}}"/>
                                          </td>
                                          {{/foreach}}
                                      </tr>
                                      {{/foreach}}
                                  </tbody>
                              </table>
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
<script type="text/javascript">
$(document).ready(function() {
  
  
  
});

</script>
{{include file = 'templates/backend/footer.tpl'}}