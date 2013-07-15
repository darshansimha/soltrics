<?php
  session_start();
  include('dbconn.php');
  $cid=$_GET['cid'];
  $_SESSION['cid']=$cid;
  $query="select * from files where cid='$cid'";
  $res=mysql_query($query);
  $row=mysql_fetch_assoc($res);
  $sql="select * from users where email='$email'";
  $result=mysql_query($sql)or die(mysql_error());
  $row=mysql_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>


<head>
	<title>Soltrics</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
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

    <!-- this is the main css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">




    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
            
            <a class="brand" href="index.html">Soltrics</a>
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
                  <li><a href="createcourse.php">Create</a></li>
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
                        <?php $name=$row['name'];echo $name;?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php">Personal info</a></li>
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
             <a href="createcourse.php">
                    <i class="icon-book"></i>
                    <span>Course Syllabus</span>
                </a>
            </li>
           
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Video Lectures</span>
                    <i class="icon-film"></i>
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-paper-clip"></i>
                    <span>Documents</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-bullseye"></i>
                    <span>Assignments</span>
                    
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-group"></i>
                    <span>Discussions</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-question"></i>
                    <span>FAQs</span>
                    
                </a>
                
            </li>
                       
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">

                <div class="accordion" id="accordion2">
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                            Week 1
                          </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                          <div class="accordion-inner">
                            <?php 
							
							$sql="select * from files where week=1 and cid='$cid'";
							$result=mysql_query($sql);
							$_SESSION['week']=1;
							while($rows=mysql_fetch_array($result)){
							$title=$rows['title'];
							$video=$rows['video'];
							parse_str( parse_url( $video, PHP_URL_QUERY ), $vid );
							$videoid=$vid['v'];
							echo "<a href='../video.php?videoid=".$videoid."'><li>$title</li></a>";
							}
							?>   
                          </div>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            Week 2
                          </a>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            Week 3
                          </a>
                        </div>
                      </div>
                      <div class="accordion-group">
                        <div class="accordion-heading">
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                            Week 4
                          </a>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>


	<!-- scripts -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>

    <script src="js/theme.js"></script>


</body>


</html>