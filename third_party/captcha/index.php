<?php
	header("HTTP/1.0 404 not found"); 
	echo "<h1>Not Found</h1>";
	echo "<p>The requested URL ".$_SERVER['PHP_SELF'];
	echo " was not found on this server.</p>";
	die();
?>