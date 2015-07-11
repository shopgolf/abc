<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('role'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" role-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
<?php
echo form_open();

	echo form_fieldset($this->lang->line('role_require'));	
	
		echo form_label($this->lang->line('role_title'), 'title');
		echo form_input(array('name' => 'title', 'id' => 'title', 'value' => $role->title));
		echo form_error('title');

		echo form_label($this->lang->line('role_description'), 'description');
		echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => $role->description));
		echo form_error('description');		
		
	
		echo form_label($this->lang->line('role_code'), 'code');
		echo form_input(array('name' => 'code', 'id' => 'code', 'value' => $role->code));
		echo form_error('code');
		
	echo form_fieldset_close();
?>
<br/>
	<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
	
	<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary'));?>
	 <a href="<?php echo site_url('auth/role'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
<?php
echo form_close();
?>
</div>
<script>
	var published = "";
</script>

<?php $this->load->view('templates/backend/footer'); ?>