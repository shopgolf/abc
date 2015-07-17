<div>
<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{$datatables.label}}<small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> {{$lang.page_home}}</a></li>
      <li class="active">{{$datatables.label}}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- /  row like, user-->
    <div class="row">
      <!-- Đon đặt hàng -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{$lang.product}}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus box-title"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times box-title"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              {{if $database_connect_status != FALSE}}
                    {{include file = 'templates/backend/datatables.tpl'}}
              {{else}}
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a><strong>
                            {{$lang.database_failed}}</strong>
                    </div>
              {{/if}}
            <!-- /.table-responsive -->
          </div>
        </div>
        <!-- / box box-new request -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</div>
            
{{include file = 'templates/backend/hook_js.tpl'}}