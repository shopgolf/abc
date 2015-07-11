<?php $this->load->view('templates/backend/header'); ?>
<?php $this->load->view('templates/backend/body'); ?>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
    <div class="alert alert-success"> <a class="close" data-dismiss="alert">x</a> <strong><?php echo $flash_message; ?></strong> </div>
<?php endif; ?>

<?php $this->load->view('templates/backend/hook'); ?>
<?php $this->load->view('templates/backend/modal'); ?>
<?php //$this->load->view('templates/backend/hook_js'); ?>
<?php $this->load->view('templates/backend/footer'); ?>
