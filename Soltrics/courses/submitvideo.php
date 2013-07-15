<?php
	session_start();
	$cid=$_SESSION['cid'];
	echo $cid;
	include('dbconn.php');
	$video=$_POST['video'];
	$sql="insert into files(cid,video) values('$cid','$video')";
	mysql_query($sql) or die(mysql_error());
	echo "Video Submitted";
?>