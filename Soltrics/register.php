<?php
	session_start();
	error_reporting(0);
	include('dbconn.php');
	$email=mysql_real_escape_string($_POST['email']);
	$name=mysql_real_escape_string($_POST['name']);
	$password=mysql_real_escape_string(md5($_POST['password']));
	$category=$_POST['category'];
	if(!empty($_POST['email']) && !empty($_POST['name']) && $category != "Choose" && !empty($password)){
	$query="select * from users where email='$email'";
	$res=mysql_query($query);
	$row=mysql_fetch_assoc($res);
	$count=mysql_num_rows($res);
	
	if($count>0){
		$errorMsg="Email Already exists";
	}
	else{
		$sql="insert into users(email,password,name,category) values('$email','$password','$name','$category')";
		mysql_query($sql);
		$_SESSION['email']=$email;
		$_SESSION['name']=$name;
		$_SESSION['category']=$category;
		$_SESSION['uid']=$row['uid'];
		if($category=="student")
		header("Location:dashboard.php");
		if($category=="author")
		header("Location:courses/adashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Soltrics</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">
	
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/signup.css" type="text/css" media="screen" />
	<link href="css/lib/select2.css" type="text/css" rel="stylesheet">
    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <div class="header">
        <a href="index.php">
            <b>Soltrics</b>
        </a>
    </div>
    <div class="row-fluid login-wrapper">
        <div class="box">
            <div class="content-wrap">
			<div class="errormsg"><?php if(!empty($errorMsg)) echo "Email Already Exists"; ?></div>
                <h6>Sign Up</h6>
				<form name="signup" action="signup.php" method="post">
				<input class="span12" type="text" placeholder="Full Name" id="name" name="name" onblur="return validName()"><span id="namecheck"></span>
                <input class="span12" id="uname" type="text" placeholder="E-mail address" name="email" onblur="return validEmail()"><span id="emailcheck"></span>
                <input class="span12" id="pw" type="password" placeholder="Password" name="password" onblur="return validPassword()"><span id="pwerror"></span>
				<select name="category" style="width:250px; margin-left:-80px;" class="select2 span8">
					<option>Choose</option>
					<option value="student">Student</option>
					<option value="author">Author</option>
				</select>
                                            
                <div class="action">
                    <input type="submit" class="btn-glow primary signup" value="Sign up">
                </div>                
            </div>
        </div>

        <div class="span4 already">
            <p>Already have an account?</p>
            <a href="index.php">Sign in</a>
        </div>
    </div>

	<!-- scripts -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
	<script src="js/select2.min.js"></script>
	
	<script type="text/javascript">
		 function validName(){
				  
			var name = document.getElementById('name');

			if (name.value==null || name.value=="") {
			//email.focus();
			//document.getElementById("uerror").innerHTML="<sup>?<sup>";
			document.getElementById("name").style.borderColor="rgb(238, 212, 216)";
			return false;
			}
			
			document.getElementById("name").style.borderColor="rgb(255,255,255)";
			return true;
	}
	
        function validEmail(){
				  
			var email = document.getElementById('uname');
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (!filter.test(email.value) || email.value==null || email.value=="") {
			//email.focus();
			//document.getElementById("uerror").innerHTML="<sup>?<sup>";
			document.getElementById("uname").style.borderColor="rgb(238, 212, 216)";
			return false;
			}
			
			document.getElementById("uname").style.borderColor="rgb(255,255,255)";
			return true;
	}
	function validPassword(){
	
		var pwd=document.getElementById("pw");
		if(pwd.value.length<5 || pwd.value==null || pwd.value=="" ){
			//pwd.value="";
			//pwd.focus();
			document.getElementById("pw").style.borderColor="rgb(238, 212, 216)";
			return false;
		}
		document.getElementById("pw").style.borderColor="rgb(255,255,255)";
		return true;
	}
        </script>
		
</body>
</html>