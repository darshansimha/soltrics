	<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="soltrics";
	
	$dbcon=mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($db) or die("Could not select database");
	
	?>