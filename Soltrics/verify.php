<?php
	
	$host="localhost";
	$user="root";
	$pass="";
	$db="soltrics";
	$dbcon=mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($db) or die("Could not select database");
	
	if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['password']) && !empty($_GET['password'])){
		$email=mysql_real_escape_string($_GET['email']);
		$password=mysql_real_escape_string($_GET['password']);
		
		$check="select email,password,activate from users where email='.$email',password='.$password' ,activate=0 ";
		$count=mysql_num_rows($check);
		
		if($count>0){
			$update="update users set activate=1 where email='.$email',password='.$password',activate=0";
			header("Location:registration.php");
			echo "Account has been activated!!!You may login now :D :D";
		}
		
		else{
			echo "invalid User!!!!Account cant be activated";
		}
		
	}
	
	
?>