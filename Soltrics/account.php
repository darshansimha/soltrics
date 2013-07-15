<?php
	
	session_start();
	include("db.php");
	if(isset($_SESSION['email'])){
		$sql="select email,password from student where email='$email'";
		while ($row=mysql_fetch_array($sql)) {
			$email=$row['email'];
			$password=$row['password'];
		}
		
		if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['conf_password']) && $new_password==$conf_password){
			$old_password=$_POST['old_password'];
			$new_password=$_POST['new_password'];
			$conf_password=$_POST['conf_password'];
			if(md5($old_password)==$password){
				$sql_Update="update table student set email='$email',password='$newpassword' where email='$email'";
				mysql_query($sql_Update) or die(mysql_error());
			}
		}
			
	}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<table>
		<form action="account.php" id="account" name="account">
		<tr>
		<td> Old Password:</td>
		<td><input type="password" name="old_password" id="old_password" /></td>
		</tr>
		<tr>
		<td> New Password:</td>
		<td><input type="password" name="new_password" id="new_password" /></td>
		</tr>
		<tr>
		<td> Confirm Password:</td>
		<td><input type="password" name="conf_password" id="conf_password" /></td>
		</tr>
		<input type="submit" id="Submit" />
		</form>
	</table>
</html>