<?php 
session_start();
include('dbconn.php');
error_reporting(0);
$username=mysql_real_escape_string ($_POST['email']);
$pass=md5(mysql_real_escape_string ($_POST['pw']));
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$query="select * from users where email='$email'";
	$res=mysql_query($query);
	$urow=mysql_fetch_assoc($res);
	$category=$urow['category'];
	if($category=="student")
	header('Location:dashboard.php');
	if($category=="author")
	header('Location:courses/adashboard.php');
}
if(!empty($username) ){

$sql = "SELECT * FROM users WHERE(email='$username' AND password='$pass')";
$result=mysql_query($sql) or die("wrong query");

$count=mysql_num_rows($result);
	 if($count>0){	
		$row=mysql_fetch_assoc($result);
		$_SESSION['email']=$row['email'];
		$_SESSION['uid']=$row['uid'];
		if($row['category']=="author")
		{
		header("Location:courses/adashboard.php");
		}
		
		else if($row['category']=="student"){
		header("Location:dashboard.php");
		}
								
	}

	else
	{
	$errormsg= "Sorry Wrong Login Credentials!";
	header("Location:index.php");
	}

}

?>

<!DOCTYPE html>
<html class="no-js">
	<title>Soltrics</title>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
			footer{
				background:#222;
				height:73px;
				margin-bottom:-42px;
				
			}
			#foot{
				float:left;
				margin-left:50px;
				text-align:center;
				padding:10px;
			}
			#profiles{
				float:right;
				margin-right:50px;
				padding-right:10px;
			}
            .card{
                margin-top: 10px;
                height:200px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script type="text/javascript">
        function validEmail(){
				  
			var email = document.getElementById('uname');
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (!filter.test(email.value) || email.value==null || email.value=="") {
			//email.focus();
			//document.getElementById("uerror").innerHTML="<sup>?<sup>";
			document.getElementById("uname").style.borderColor="rgb(238, 212, 216)";
			return false;
			}
			//document.getElementById("uerror").innerHTML="";
			document.getElementById("uname").style.border="rgb(255, 255, 255)";
			return true;
	}
	function validPassword(){
	
		var pwd=document.getElementById("pw");
		if(pwd.value.length<5 || pwd.value==null || pwd.value=="" ){
			//pwd.value="";
			//pwd.focus();
			//document.getElementById("pwerror").innerHTML="<sup>?<sup>";
			document.getElementById("pw").style.background="rgb(248, 189, 189)";
			return false;
		}
		//document.getElementById("pwerror").innerHTML="";
		document.getElementById("pw").style.background="rgb(255, 255, 255)";
		return true;
	}
        </script>
        </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner" style="background: #222222;">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></a>
                    
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#" style="background: #222222;font-weight: bold;">About Us </a></li>
                            <li class="active"><a href="#" style="background: #222222;font-weight: bold;">Courses </a></li>
                        </ul>
                        
                        <a href="signup.php"><button class="btn pull-right" style="margin-left: 4px;">Sign Up</button></a>
                        
                          
                        <form class="navbar-form pull-right offset4" method="post" action="index.php">
                            <input class="span2" type="text" placeholder="Email" name="email" id="uname" onblur="return validEmail()" autofocus="true"><span id="uerror" style="color:red;margin-top:100px;"></span>
                            <input class="span2" type="password" placeholder="Password" id="pw" name="pw" onblur="return validPassword()"><span id="pwerror" style="color:red;"></span>
                            <input type="submit" class="btn" value="Sign In">
                        </form>
                           
                            <!--<a href="signup.php"><button class="btn pull-right">Sign Up</button></a>-->
                       
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        
	<div class="content wide-content">
        <div class="coverarea container">
            <div class="row titletext"> 
            <div class="span6 offset1">
           <h4>Learn Brainstorm Innovate</h4>
           </div></div><br>
            <form method="get" class="span6 offset1" action="/search" id="search">
                <input name="q" type="text" size="40" placeholder="Search for Courses..." style="
                

                border-color: rgb(255, 163, 0);
                border-width: 1px;
                height:40px;
                border-radius:5px;
                color: white;
                font-weight:bold;"/>
            </form>
        </div>
             
                 
         <div class="container" >
         <div ><a href="#"><h5>View Courses Starting Soon</h5></a>
          </div>  


            <!-- Example row of columns -->
                <div class="row-fluid">

                    <div class="span4 card">
                        <a href="#">
                            <img src="img/course.jpg" class="img-polaroid">

                            <h5 style="line-height:0px">course Engineering<br></h5>
                        <p>Schlumberger, Germany</p>
                        </a>

                    </div>

                    <div class="span4 card">
                        <a href="#">
                            <img src="img/course.jpg" class="img-polaroid">
                            <h5 style="line-height:0px">Petroleum Sciences</h5>
                            <p>Indian Oils Ltd.</p>
                        </a>
                    </div>

                    <div class="span4 card">
                        <a href="#">
                        <img src="img/course.jpg" class="img-polaroid">
                        <h5 style="line-height:0px">Electronics & Communication</h5>
                        <p>Samsung Electronics</p></a>
                    </div>

                </div>
                <div class="row-fluid">
                    <div class="span4 card">
                        <a href="#">
                        <img src="img/course.jpg" class="img-polaroid">
                        <h5 style="line-height:0px">Electronics & Communication</h5>
                        <p>Samsung Electronics</p></a>
                    </div>
                    <div class="span4 card">
                        <a href="#">
                        <img src="img/course.jpg" class="img-polaroid">
                        <h5 style="line-height:0px">Electronics & Communication</h5>
                        <p>Samsung Electronics</p></a>
                    </div>
                    <div class="span4 card">
                        <a href="#">
                        <img src="img/course.jpg" class="img-polaroid">
                        <h5 style="line-height:0px">Electronics & Communication</h5>
                        <p>Samsung Electronics</p></a>
                    </div>

                </div>  
        </div> <!-- /container --> 
        </div>
        <footer>
		    <div id="foot">
            <a href="#">Terms</a>
			<a href="#" >
            Career</a>
		    </div>
    		<div id="profiles"><img style="padding:10px;" src="img/g+.png"><img src="img/fb.png"><img style="padding:10px;" src="img/linkedin.png"></div>
            </footer>
<script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>

    <script src="js/theme.js"></script>

    </body>
    
</html>