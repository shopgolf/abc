<?php $this->load->view('templates/backend/header'); ?>
<?php $this->load->view('templates/backend/body'); ?>

<div class="content-wrapper" style="min-height: 467px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh Sách Sản Phẩm
            <small class="label label-success">Các sản phẩm hiện có</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">request</li>
        </ol>
    </section>
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Sản Phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                                <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Thêm Sản Phẩm</button>
                        </div>
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 48px;">ID</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã Sản Phẩm: activate to sort column ascending" style="width: 186px;">Mã Sản Phẩm</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên Sản Phẩm: activate to sort column ascending" style="width: 170px;">Tên Sản Phẩm</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Giá Sản phẩm: activate to sort column ascending" style="width: 165px;">Giá Sản phẩm</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chức năng: activate to sort column ascending" style="width: 298px;">Chức năng</th></tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><div class="icheckbox_flat-blue" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                                                <td>Internet Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>
                                                    <button type="" class="btn btn-default btn-sm"><i class="fa fa-edit"></i>Edit</button> 
                                                    <button type="" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-trash"></i>Delete</button>
                                                    <button class="btn bg-orange btn-sm">Unslider</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr><th rowspan="1" colspan="1">ID</th><th rowspan="1" colspan="1">Mã Sản Phẩm</th><th rowspan="1" colspan="1">Tên Sản Phẩm</th><th rowspan="1" colspan="1">Giá Sản phẩm</th><th rowspan="1" colspan="1">Chức năng</th></tr>
                                        </tfoot>
                                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 13 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">Next</a></li></ul></div></div></div></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section><!-- / .content input member> -->
</div>
<?php $this->load->view('templates/backend/footer'); ?>