<!DOCTYPE html>
<html lang="en">
<head>
<title>404 Page Not Found</title> 
<meta http-equiv="REFRESH" content="105;url=<?php echo config_item('base_url');?>">
<style type="text/css">

::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	/*border: 1px solid #D0D0D0;*/
	
}
#container img{
    -webkit-box-shadow: 0 0 8px 6px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
<script language="javascript" type="text/javascript">
     <!--
     window.setTimeout('window.location="<?php echo config_item('base_url');?>"; ',2000);
     // -->
 </script>
</head>
<body>
	<div id="container">
        <div style="width:550px; height:350px; margin:0px auto;">
            <img width="550" height="350" src="<?php echo STATIC_URL;?>frontend/home/images/404.jpg"/>
        </div>
	</div>
</body>
</html>