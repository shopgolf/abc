<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('group'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
<?php
echo form_open();

	echo form_fieldset($this->lang->line('group_require'));	
	
		echo form_label($this->lang->line('group_title'), 'title');
		echo form_input(array('name' => 'title', 'id' => 'title', 'value' => $group->title));
		echo form_error('title');

		echo form_label($this->lang->line('group_description'), 'description');
		echo form_textarea(array('name' => 'description', 'id' => 'description', 'value' => $group->description));
		echo form_error('description');
		
		echo form_input(array('name' => 'group_id', 'id' => 'group_id', 'value' => $group->id>0?$group->id:'tmp_'.rand(), 'type' => 'hidden'));
		
	echo form_fieldset_close();
	
	//echo form_fieldset($this->lang->line('group_right'));
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo $this->lang->line('group_right');?></th>
            <?php foreach($permission_list as $item):?>
                <th><?php echo $item->name;?></th>
            <?php endforeach;?>
        </tr>
    </thead>
    <tbody>
         <?php foreach($this->role_model->find_by(NULL, 'title, id') as $role_item):?>
            <tr>
                <td><?php echo $role_item->title;?></td>
                <?php foreach($permission_list as $permission_item):?>
                    <td>
                    <input class="checkbox_button" type="checkbox" <?php if($this->group_model->has_right($group->id, $role_item->id, $permission_item->id)):?>checked="checked"<?php endif;?>name="<?php echo $permission_item->id?>__<?php echo $role_item->id?>" value="<?php echo $permission_item->id?>__<?php echo $role_item->id?>" id="<?php echo $permission_item->id?>__<?php echo $role_item->id?>"/>
                    </td>
                <?php endforeach;?>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<?php	
		
	//echo form_fieldset_close();
	
?>
<br/>
	<?php echo form_button(array('id' => 'submit', 'value' => '', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save').' & '.$this->lang->line('create'),'class' => 'btn btn-success', 'onclick' => 'javascript:jQuery(this).val(\'create\');'));?>
	<?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary'));?>
	 <a href="<?php echo site_url('auth/group'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
<?php
echo form_close();
?>
</div>
<script>
var groupId 	= $("input[name=group_id]").val();
var published 	= '';
</script>

<?php $this->load->view('templates/backend/footer'); ?>