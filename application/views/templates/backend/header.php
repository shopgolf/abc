<html>
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sản Phẩm</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo STATIC_BK.'css/bootstrap.min.css';?>" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_BK.'css/AdminLTE.min.css';?>" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_BK.'css/datatables/dataTables.bootstrap.css';?>" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_BK.'css/skin-blue.min.css';?>" rel="stylesheet" type="text/css">
    <link href="<?php echo STATIC_BK.'js/iCheck/flat/blue.css';?>" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="javascript">
        var baseUrl 	= '<?php echo base_url(); ?>';
        var action 	= '';
    </script>
    
    <?php if (isset($css)): ?>
        <?php foreach ($css as $stylesheet): ?>
                <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js)): ?>
		<?php foreach ($js as $script): ?>
			<script type="text/javascript" src="<?php echo $script; ?>"></script>
		<?php endforeach; ?>
    <?php endif; ?>
                        
</head>