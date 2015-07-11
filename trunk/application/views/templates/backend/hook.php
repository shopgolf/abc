<div>
<div class="content-wrapper" style="min-height: 677px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $datatables['label']?><small>Have a nice day</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('page_home') ?></a></li>
      <li class="active"><?php echo $datatables['label']?></li>
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
            <h3 class="box-title">Đơn đặt hàng mới</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus box-title"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times box-title"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
                <?php if ($this->database_connect_status != FALSE ): ?>
                    <?php $this->load->view('templates/backend/datatables'); ?>
                <?php else:?>
                    <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->lang->line('database_failed') ?></strong></div>
                <?php endif; ?>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix"> <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-right">View All Orders</a> </div>
          <!-- /.box-footer -->
        </div>
        <!-- / box box-new request -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
</div>