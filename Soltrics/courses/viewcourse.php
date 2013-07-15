<?php
session_start();
include('dbconn.php');
$cid=$_GET['cid'];
$_SESSION['cid']=$cid;
$email=$_SESSION['email'];
$sql="select * from users where email='$email'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>


<head>
	<title>Author Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	footer{
				background:#222;
				height:73px;
				margin-bottom:-42px;
				text-decoration:none;
			}
			#foot{
				float:left;
				margin-left:50px;
				text-align:center;
				padding:10px;
				text-decoration:none;
			}
			#profiles{
				float:right;
				margin-right:50px;
				padding-right:10px;
				text-decoration:none;
			}
        </style>
    
    
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />
    
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="adashboard.php">Soltrics</a>
            <ul class="nav">            

            <li><a href="#">About Us </a></li>
            <li class="dropdown">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    Courses
                    <b class="caret"></b>
                  </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Browse</a></li>
                  <li><a href="#">Create</a></li>
                  <li><a href="adashboard.php">Dashboard</a></li>
                </ul>
            </li>
           
            </ul>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <?php echo $row['name']; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php">Edit info</a></li>
                        <li><a href="adashboard.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
   <div id="sidebar-nav">
        <ul id="dashboard-menu">
            
            <li >
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="adashboard.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
             <li>
             <a href="syllabus.php">
                    <i class="icon-book"></i>
                    <span>Course Syllabus</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="schedule.php">
                    <i class="icon-time"></i>
                    <span>Course Schedule</span>
                    
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="coursecontent.php?cid=<?php echo $cid;?>">
                    <i class="icon-group"></i>
                    <span>Video Lectures</span>
                    <i class="icon-film"></i>
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="assignments.php">
                    <i class="icon-bullseye"></i>
                    <span>Assignments</span>
                    
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="../ideabox">
                    <i class="icon-group"></i>
                    <span>Discussions</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="createquiz.php">
                    <i class="icon-question"></i>
                    <span>Create Quiz</span>
                </a>
            </li>           
        </ul>
    </div>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">
        <div class="container-fluid" style="margin-top: 20px;">
             <div id="pad-wrapper">
                   <div class="span8">
                   <img src="img/logo.png"><br><br>
                   <h2 style="font-family:bebas;" >Solar Cleaning Bot</h2>
                   <hr></div>
                   <div class="span8"><h3>Home</h3><br></br>
                   <p><?php echo $summary;?></p></div>
             </div>
        </div>
	<!-- scripts -->
<script src="code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'chitu'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
    </centre>
    </div>
     <footer>
		    <div id="foot">
            <a style="padding:10px; color: white;
    font-family: calibri;
    font-size: 17px;
    text-decoration:none;" href="#">Terms</a>
			<a href="#" style="
    color: white;
    font-family: calibri;
    font-size: 17px;
    margin-left:40px;
    text-decoration:none;
">Career</a>
		    </div>
		<div id="profiles"><img style="padding:10px;" src="img/g+.png"><img src="img/fb.png"><img style="padding:10px;" src="img/linkedin.png"></div>
        </footer>
</body>


</html>