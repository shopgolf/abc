{{include file = 'templates/backend/header.tpl'}}
{{include file = 'templates/backend/body.tpl'}}

<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> WithGone Việt Nam <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>{{$lang.page_home}}</a></li>
      <li class="active">{{$lang.stats_cart}}</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$count}}</h3>
            <p>{{$lang.stats_cart}}</p>
          </div>
          <div class="icon"> <i class="fa fa-shopping-cart"></i> </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
          
    <!-- /  row like, user-->
    {{if isset($flash_message) && $flash_message != ''}}
        <div class="alert alert-success"><a class="close" paymentAir-dismiss="alert">x</a><strong>{{$flash_message}}</strong></div>
    {{/if}}
    <div class="row">
      <!-- Đon đặt hàng -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{$lang.stats_cart}}</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus box-title"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times box-title"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th>{{$lang.product_code}}</th>
                    <th>{{$lang.quantity}}</th>
                    <th>{{$lang.info}}</th>
                    <th>{{$lang.customers}}</th>
                    <th>{{$lang.address}}</th>
                    <th>{{$lang.phone}}</th>
                    <th>{{$lang.created}}</th>
                    <th>{{$lang.action}}</th>
                  </tr>
                </thead>
                <tbody id="show">
                    {{foreach $list as $vals}}
                            <tr>
                                <td>{{$vals->product_code}}</td>
                                <td>{{$vals->quantity}}</td>
                                <td>{{$vals->info}}</td>
                                <td>{{$vals->cname}}</td>
                                <td>{{$vals->caddress}}</td>
                                <td>{{$vals->cphone}}</td>
                                <td>{{$vals->createdTime|date_format:"%d-%m-%Y %H:%M:%S"}}</td>
                                <td>
                                    <a class="btn btn-default btn-sm" data-toggle="modal" href="#delete_confirm" onclick="delete_confirm('/auth/stats/delete/{{$vals->id}}')"><i class="fa fa-check"></i>{{$lang.delete}}</a>
                                    <button class="btn btn-default btn-sm"><i class="fa fa-check"></i>{{$lang.accept}}</button>
                                </td>
                            </tr>
                    {{/foreach}}
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer clearfix"> <span id="loading"></span><a id="showall" href="{{$link_bk}}/stats" class="btn btn-sm btn-info btn-flat pull-right">View All Orders</a> </div>
          <!-- /.box-footer -->
        </div>
        <!-- / box box-new request -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<script>
$(document).ready(function() {
    $("#showall").on('click',function(e)
    {
        $("#loading").show();
        $("#loading").html("<img src='{{$static_bk}}/images/icon/loading.gif' />");
        setTimeout(function () {
            $.ajax(
                {
                    url : $("#showall").attr("href"),
                    type: "POST",
                    data:{showall:1},
                    cache: true,
                    beforeSend: function(){

                    },
                    success:function(data) 
                    {
                        $("#show").stop().html(data).hide(0).fadeIn("slow");
                        $("#loading").hide();
                    },
                    error: function() 
                    {

                    }
                });
        }, 2000);
        e.preventDefault();	//STOP default action
    });
});
</script>

{{include file = 'templates/backend/footer.tpl'}}