<?php $this->load->view('templates/backend/header'); ?>
<?php $this->load->view('templates/backend/body'); ?>

<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> WithGone Việt Nam <small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('page_home'); ?></a></li>
      <li class="active">Here</li>
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
            <h3>150</h3>
            <p>Đơn đặt hàng</p>
          </div>
          <div class="icon"> <i class="fa fa-shopping-cart"></i> </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /  row like, user-->
    <div class="row">
      <!-- Đon đặt hàng -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Đơn đặt hàng mới</h3>
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
                    <th><?php echo $this->lang->line('product_code');?></th>
                    <th>Số lượng </th>
                    <th>Thông tin</th>
                    <th>Khách Hàng</th>
                    <th>Địa chỉ</th>
                    <th>SDT</th>
                    <th>Ngày đặt</th>
                    <th>Chuc nang</th>
                  </tr>
                </thead>
                <tbody id="show">
                    <?php
                    foreach($list as $keys => $vals){
                        echo '<tr>';
                        echo '<td><a>'.$vals->product_code.'</a></td>';
                        echo '<td><a>'.$vals->quantity.'</a></td>';
                        echo '<td><a>'.$vals->info.'</a></td>';
                        echo '<td><a>'.$vals->cname.'</a></td>';
                        echo '<td><a>'.$vals->caddress.'</a></td>';
                        echo '<td><a>'.$vals->cphone.'</a></td>';
                        echo '<td><a>'.date("d-m-Y H:i:s",$vals->createdTime).'</a></td>';
                        echo '<td><button type="" class="btn btn-default btn-sm"><i class="fa fa-remove"></i>Xóa</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer clearfix"> <span id="loading"></span><a id="showall" href="<?php echo base_url("{$this->uri->segment(1)}/{$this->uri->segment(2)}/");?>" class="btn btn-sm btn-info btn-flat pull-right">View All Orders</a> </div>
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
        $("#loading").html("<img src='<?php echo STATIC_BK."images/icon/loading.gif"?>' />");
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

<?php $this->load->view('templates/backend/footer'); ?>