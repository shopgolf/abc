<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('partner'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
<?php echo form_open(); ?>
<div class="top-button">
	<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
	<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
 	<a href="<?php echo site_url('auth/partner'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
</div>
<?php   
	echo form_fieldset($this->lang->line('partner_require'));	
		echo form_label($this->lang->line('partner_name'), 'name');
		echo form_input(array('name' => 'name', 'id' => 'name', 'value' => $partner->name));
		echo form_error('name');

		echo form_label($this->lang->line('partner_code'), 'code');
		echo form_input(array('name' => 'code', 'id' => 'code', 'value' => $partner->code));
		echo form_error('code');

	echo form_fieldset_close();
	
	echo form_fieldset($this->lang->line('partner_details'));
	
		echo form_label($this->lang->line('partner_homepage'), 'homepage');
		echo form_input(array('name' => 'homepage', 'id' => 'homepage', 'value' => $partner->homepage));
		echo form_error('homepage');
	
		echo form_label($this->lang->line('partner_description'), 'description');
		echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => $partner->description));
		echo form_error('description');
		
		echo form_label($this->lang->line('partner_language'), 'language_id');
		echo form_dropdown('language_id', $this->language_model->get_select_box(), $partner->language_id);
		echo form_error('language_id');
		
	echo form_fieldset_close();
?>
<div class="bottom-button">
	<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
	<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
 	<a href="<?php echo site_url('auth/partner'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
</div>
<?php
echo form_close();
?>
</div>

<?php $this->load->view('templates/backend/footer'); ?>