<?php

		$link=mysql_connect("localhost","root","")or die("can not connect");
		mysql_select_db("soltrics",$link) or die("can not select database");
		
		$nm=mysql_real_escape_string ($_POST['fname']);
		$cnm=mysql_real_escape_string ($_POST['lname']);
		$addr=mysql_real_escape_string ($_POST['dept']);
		$ph=mysql_real_escape_string ($_POST['phone']);
		$email=mysql_real_escape_string ($_POST['email']);
		$profile=mysql_real_escape_string ($_POST['univ']);
		$pwd=mysql_real_escape_string ($_POST['pw']);
		
		
		$q="insert into faculty(fname,lname,department,university,email,password,phone)
		   values ('$nm','$cnm','$addr','$profile','$email','$pwd','$ph')";
		   
		mysql_query($q,$link)or die("wrong query");
		mysql_close($link);
		header("Location:index.php");

?>
