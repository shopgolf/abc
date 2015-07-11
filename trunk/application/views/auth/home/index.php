<?php $this->load->view('templates/backend/header_guest'); ?>

<div class="well login">
  <div class="page-header">
    <h2><?php echo $this->lang->line('logo')?></h2>
  </div>
  <?php
  echo form_open('auth/home/authenticate', array('formType' => 'hashPassword'));

  if (isset($login_error) && $login_error!=NULL) {
          echo '<div class="alert alert-error"><strong>' . $login_error . '</strong></div>';
  }
	  echo form_label($this->lang->line('user_username'), 'username');
	  echo form_input('username', isset($username)?$username:"");
	
	  echo form_label($this->lang->line('user_password'), 'password');
	  echo form_password('password');
  ?>
  <p>
  <?php
  echo form_button(array('id' => 'submit', 'value' => 'Login', 'name' => 'submit', 'type' => 'submit', 'content' => $this->lang->line('user_login'), 'class' => 'btn btn-primary'));
  ?>
  </p>
  <?php
  echo form_close();
  ?>
</div>
<script>
	var published ="";
</script>
<?php $this->load->view('templates/backend/footer_guest'); ?>
