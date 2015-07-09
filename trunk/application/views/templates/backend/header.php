<!DOCTYPE html>
<html lang="en">
<head>
	<META http-equiv=Content-Type content ="text/html; charset=utf-8">
	<title><?php echo $this->config->item('site_title'); ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>third_party/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(). 'static/templates/frontend/home/css/typography.css';?>">
	<link rel="stylesheet" href="<?php echo base_url(). 'static/templates/frontend/home/css/typo_tm.css';?>">  
	  
	<script language="javascript">
		var baseUrl 	= '<?php echo base_url(); ?>';
		var action 		= '';
	</script>
	  
	<?php if (isset($css)): ?>
		<?php foreach ($css as $stylesheet): ?>
			<link rel="stylesheet" href="<?php echo $stylesheet; ?>">
		<?php endforeach; ?>
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>static/templates/backend/css/main.css">
	<link rel="shortcut icon" href="<?php echo STATIC_URL.'backend/images/icon/favicon.ico'; ?>">
	  
	<script type="text/javascript" src="<?php echo base_url(); ?>third_party/jquery/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>third_party/bootstrap/js/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>third_party/tiny_mce/jquery.tinymce.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>third_party/ckfinder/ckfinder.js"></script>
        <script type="text/javascript" src="<?php echo STATIC_URL.'backend/js/tinymce_functions.js'?>"></script>
        <script type="text/javascript" src="<?php echo STATIC_URL.'backend/js/ckfinder_function.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>third_party/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
        
	<?php if (isset($js)): ?>
		<?php foreach ($js as $script): ?>
			<script type="text/javascript" src="<?php echo $script; ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo site_url('auth'); ?>" style="font-size: 14px;"><?php echo $this->config->item('site_title'); ?></a>
      <div class="nav-collapse">
      	<?php $this->load->view('templates/backend/menu'); ?>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">