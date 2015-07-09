<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('user'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
	<?php echo form_open('', array('formType' => 'hashPassword'));?>
	
		<div class="top-button">
			<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' =>  $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
			<a href="<?php echo site_url('auth/user'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
		</div>
		
		<ul class="nav nav-tabs" id="tabs">
		    <li class="active"><a href="#main"><?php echo $this->lang->line('user_require');?></a></li>   
		    <li><a href="#details"><?php echo $this->lang->line('user_details');?></a></li>
		</ul>
		
		<div class="tab-content">	
			<div class="tab-pane active" id="main">
				<?php 
					echo form_label($this->lang->line('user_username'), 'username');
					
					if($user->id>0):
					echo form_input(array('name' => 'username', 'id' => 'username', 'value' => $user->username, 'readonly' => 'true'));
					else:
					echo form_input(array('name' => 'username', 'id' => 'username', 'value' => $user->username));
					endif;
					echo form_error('username');
					
					echo form_label($this->lang->line('user_password'), 'password');
					echo form_input(array('name' => 'password', 'id' => 'password', 'value' => '', 'type' => 'password'));
					echo form_error('password');
					
					echo form_label($this->lang->line('user_re_password'), 're_password');
					echo form_input(array('name' => 're_password', 'id' => 'password', 'value' => '', 'type' => 'password'));
					echo form_error('re_password');
					
					echo form_label($this->lang->line('user_email'), 'email');
					echo form_input(array('name' => 'email', 'id' => 'email', 'value' => $user->email));
					echo form_error('email');
					
					echo form_label($this->lang->line('user_active'), 'active');
					echo form_dropdown('active', $this->user_model->active_list, $user->active);
					echo form_error('active');
					
					echo form_label($this->lang->line('user_group'), 'group_id');
					echo form_dropdown('group_id', $this->group_model->get_select_box(), $user->group_id);
					echo form_error('group_id');
				?>
			</div>
			<div class="tab-pane" id="details">
				<?php 
					echo form_label($this->lang->line('user_firstname'), 'firstname');
					echo form_input(array('name' => 'firstname', 'id' => 'firstname', 'value' => $user->firstname));
					echo form_error('firstname');
					
					echo form_label($this->lang->line('user_lastname'), 'lastname');
					echo form_input(array('name' => 'lastname', 'id' => 'lastname', 'value' => $user->lastname));
					echo form_error('lastname');
					
					echo form_error('address');
					echo form_label($this->lang->line('user_address'), 'address');
					echo form_input(array('name' => 'address', 'id' => 'address', 'value' => $user->address));
					
					echo form_label($this->lang->line('user_phone'), 'phone');
					echo form_input(array('name' => 'phone', 'id' => 'phone', 'value' => $user->phone));
					echo form_error('phone');
					
					echo form_label($this->lang->line('user_image'), 'image');
					echo form_input(array('name' => 'image', 'id' => 'image', 'value' => $user->image));
					echo form_error('image');
					
					echo form_label($this->lang->line('user_gender'), 'gender');
					echo form_dropdown('gender', $this->user_model->get_gender_list(), $user->gender);
					echo form_error('gender');
					
					echo form_label($this->lang->line('language'), 'language_id');
					echo form_dropdown('language_id', $this->language_model->get_select_box(), $user->language_id);
					echo form_error('language_id');
				?>
			</div>
		</div>
		<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
		<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' =>  $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
		<a href="<?php echo site_url('auth/user'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
	
	<?php echo form_close(); ?>
</div>

<?php $this->load->view('templates/backend/footer'); ?>

<script language="javascript" type="text/javascript" src="<?php echo base_url() . 'static/templates/backend/js/tabs.js';?>"></script>

<script type="text/javascript">
function image_manager(){
	$("input[name=image]").click();
}

var userId 		= $("input[name=user_id]").val();
var published 	= '';
var action 		= 'updateuser';
</script>