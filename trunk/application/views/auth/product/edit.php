<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('advertising'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>

<div class="well">
	<?php echo form_open();?>	
	<div class="top-button">
		<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
		<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary'));?>
		 <a href="<?php echo site_url('auth/advertising'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
	</div>
	<div class="tab-content">	
		<div class="tab-pane active" id="main">
			<?php 
			echo form_label($this->lang->line('advertising_title'), 'title');
			echo form_input(array('name' => 'title', 'id' => 'title', 'value' => $advertising->title));
			echo form_error('title');
			
			echo form_label($this->lang->line('advertising_link'), 'link');
			echo form_input(array('name' => 'link', 'id' => 'link', 'value' => $advertising->link));
			echo form_error('link');
                        
                        echo form_label($this->lang->line('description'), 'description');
			echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => ''));
			echo form_error('description');
                        
                        echo form_label($this->lang->line('advertising_resource'), 'resource');
			echo form_input(array('name' => 'resource', 'id' => 'resource', 'value' => $advertising->resource, 'ondblclick' => 'imageManager($(this))', 'class'=> 'input-file'));
			?>
			<a class="btn" style="margin: 0 0 10px 2px;" href="javascript:imageManager($('input[name=resource]'));"><?php echo $this->lang->line('choose_resource')?></a>
			<?php
					echo form_error('resource');				
			?>
		</div>
	</div>
	
	<div class="bottom-button">
		<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
		<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary'));?>
		 <a href="<?php echo site_url('auth/advertising'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>		 
	</div>
	
	<?php echo form_close();?>
</div>
<?php $this->load->view('templates/backend/footer'); ?>