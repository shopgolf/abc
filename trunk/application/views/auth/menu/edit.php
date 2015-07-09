<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('menu'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" menu-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
	<?php echo form_open();?>
		<div class="top-button">
			<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
			<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
			<a href="<?php echo site_url('auth/menu'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
		</div>
		
		<ul class="nav nav-tabs" id="tabs">
		    <li class="active"><a href="#main"><?php echo $this->lang->line('menu_require');?></a></li>   
		    <li><a href="#details"><?php echo $this->lang->line('menu_details');?></a></li>
		</ul>
		
		<div class="tab-content">	
			<div class="tab-pane active" id="main">
				<?php 
				echo form_label($this->lang->line('menu_title'), 'title');
				echo form_input(array('name' => 'title', 'id' => 'title', 'value' => $menu->title));
				echo form_error('title');
				
				echo form_label($this->lang->line('menu_link'), 'link');
				echo form_input(array('name' => 'link', 'id' => 'link', 'value' => $menu->link));
				echo form_error('link');
				
				echo form_label($this->lang->line('menu_order'), 'order');
				echo form_input(array('name' => 'order', 'id' => 'order', 'value' => $menu->order));
				echo form_error('order');
				
				echo form_label($this->lang->line('menu_parent'), 'parent_id');
				echo form_dropdown('parent_id', $this->menu_model->get_menu_tree(), $menu->parent_id);
				echo form_error('parent_id');
				
				echo form_label($this->lang->line('menu_position'), 'position');
				echo form_dropdown('position', $this->menu_model->get_position_list(), $menu->position);
				echo form_error('position');
				?>
			</div>
			<div class="tab-pane" id="details">
				<?php 
					echo form_label($this->lang->line('menu_new_page'), 'new_page');
					echo form_dropdown('new_page', $this->menu_model->get_new_page_list(), $menu->new_page);
					echo form_error('new_page');
					
					echo form_label($this->lang->line('menu_type'), 'type');
					echo form_dropdown('type', $this->menu_model->get_type_list(), $menu->type);
					echo form_error('type');
					
					echo form_label($this->lang->line('menu_language'), 'language_id');
					echo form_dropdown('language_id', $this->language_model->get_select_box(), $menu->language_id);
					echo form_error('language_id');
					
					echo form_label($this->lang->line('menu_active'), 'active');
					echo form_dropdown('active', $this->menu_model->get_active_list(), $menu->active);
					echo form_error('active');
				?>
			</div>
		</div>
		<div class="bottom-button">
			<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
			<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
			<a href="<?php echo site_url('auth/menu'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
		</div>
	<?php form_close();?>
</div>

<script language="javascript" type="text/javascript" src="<?php echo base_url() . 'static/templates/backend/js/tabs.js';?>"></script>

<?php $this->load->view('templates/backend/footer'); ?>