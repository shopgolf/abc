<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Backend</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
<!--        <link rel="stylesheet" href="<?php echo base_url().'third_party/bootstrap/css/bootstrap.min.css';?>" />-->
        <link rel="stylesheet" href="<?php echo STATIC_BK.'css/bootstrap.min.css';?>" />
        <link href="<?php echo base_url().'third_party/datatables/css/dataTables.bootstrap.css';?> " rel="stylesheet" type="text/css">
        <link href="<?php echo STATIC_BK.'css/AdminLTE.min.css';?>" rel="stylesheet" type="text/css">
        <link href="<?php echo STATIC_BK.'css/skin-blue.min.css';?>" rel="stylesheet" type="text/css">
        <link href="<?php echo STATIC_BK.'js/iCheck/flat/blue.css';?>" rel="stylesheet" type="text/css">
        <script language="javascript">
            var baseUrl 	= 'http://shoppings.dev/';
            var action 		= '';
        </script>
        <link rel="stylesheet" href="<?php echo base_url();?>third_party/datatables/css/dataTables.bootstrap.css">

        <script type="text/javascript" src="<?php echo base_url();?>third_party/jquery/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>third_party/bootstrap/js/bootstrap.min.js"></script>
        
        <?php if (isset($js)): ?>
            <?php foreach ($js as $script): ?>
                <script type="text/javascript" src="<?php echo $script; ?>"></script>
            <?php endforeach; ?>
	<?php endif; ?>
                
    </head>