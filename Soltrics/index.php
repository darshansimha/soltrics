<?php 

session_start();


$username=mysql_real_escape_string ($_POST['uname']);

$pass=mysql_real_escape_string ($_POST['pw']);

if(!empty($username)&&!empty($pass)){


include("include/dbconn.conf");



			$_SESSION = array();
			
			$_SESSION['fname']=$row['fname'];
				$_SESSION['lname']=$row['lname'];
			$_SESSION['email']=$row['email'];
			$_SESSION['univ']=$row['university'];
			
			
			header("location:student_dash.php");
		}

}

?>



