<?php $this->load->view('templates/backend/header'); ?>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert">x</a>
		<strong><?php echo $flash_message; ?></strong>
	</div>
<?php endif; ?>

<div class="page-header">
  <h3><?php echo $datatables['label']?></h3> 
  </div>
<div>

<?php $this->load->view('templates/backend/hook'); ?>
    
<?php if ($this->database_connect_status != FALSE ): ?>
	<?php $this->load->view('templates/backend/datatables'); ?>
<?php else:?>
	<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->lang->line('database_failed') ?></strong></div>
<?php endif; ?>
		
</div>

<!-- Modal -->
<div id="delete_confirm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Xác nhận</h3>
	</div>
	<div class="modal-body">
		<p>Bạn thật sự muốn xóa?</p>
	</div>
	<div class="modal-footer">
		<button class="btn btn-danger" onlick="" my-type="delete_confirm">Xóa</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Bỏ qua</button>
	</div>
</div>

<?php $this->load->view('templates/backend/hook_js'); ?>
<?php $this->load->view('templates/backend/footer'); ?>