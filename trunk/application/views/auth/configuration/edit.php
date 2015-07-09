<?php $this->load->view('templates/backend/header'); ?>

<h3><?php if ($this->uri->segment(4) == "add") echo $this->lang->line('create'); else echo $this->lang->line('edit') ?> <?php echo mb_strtolower($this->lang->line('configuration'), 'utf-8')?></h3>

<?php if (isset($flash_message)  && $flash_message!=NULL ): ?>
<div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $flash_message; ?></strong></div>
<?php endif; ?>
<div class="well">
    <?php echo form_open(); ?>

        <div class="top-button">
                <?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
                <a href="<?php echo site_url('auth/configuration'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
        </div>
        <?php
                echo form_label($this->lang->line('title'), 'title');
                echo form_input(array('name' => 'title', 'id' => 'title', 'value' => $configuration->title));
                echo form_error('title');

                echo form_label($this->lang->line('value'), 'value');
                echo form_textarea(array('name' => 'value', 'id' => 'value', 'value' => $configuration->value));
                echo form_error('value');
                
                echo form_label($this->lang->line('code'), 'code');
                echo form_input(array('name' => 'code', 'id' => 'code', 'value' => $configuration->code));
                echo form_error('code');
        ?>
        <div class="bottom-button">
                <?php echo form_button(array('id' => 'submit', 'value' => 'Update', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('save'),'class' => 'btn btn-primary')); ?>
                <a href="<?php echo site_url('auth/configuration'); ?>" class="btn"><?php echo $this->lang->line('cancel')?></a>
        </div>
    <?php echo form_close(); ?>
</div>
<?php $this->load->view('templates/backend/footer'); ?>