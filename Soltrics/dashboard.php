<?php
session_start();
include('dbconn.php');
if(!isset($_SESSION['email'])){
header('Location:index.php');
}
else{
$email=$_SESSION['email'];
$sql="select * from users where email='$email'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$uid=$row['uid'];
$query="select * from registered where uid='$uid'";
$res=mysql_query($query);
}
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
    <link rel="stylesheet" href="css/compiled/user-profile.css" type="text/css" media="screen" />

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
                <a href="#">
                    Courses
                    <b class="caret"></b>
                  </a>
                
            </li>
            
            </ul>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                         <?php echo $row['name'];  ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                       <?php echo "<li><a href='editprofile.php'>Edit info</a></li>
                        <li><a href='dashboard.php'>Dashboard</a></li>
                        <li><a href='logout.php'>Logout</a></li>";?>

                    </ul>
                </li>

                
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="dashboard.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
            <li>
                <a href="editcourseinfo.php">
                    <i class="icon-signal"></i>
                    <span>Completed Courses</span>
                </a>
            </li>
             <li>
                <a href="createquiz.html">
                    <i class="icon-signal"></i>
                    <span>Profile</span>
                </a>
            </li>
           

        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper" class="user-profile">
                 <div class="row-fluid header">
                    <div class="span8">
                        <?php 
						$image=$row['image'];
						echo "<img src=$image class='avatar img-circle'>";?>
                        <h3 class="name">Hello <?php echo $row['name']; ?></h3>
                        <span class="area">Here you can see your enrolled courses. Click on any course to learn more about it</span>
                    </div>
                </div>
            
            <div class="row-fluid profile">
                    <!-- bio, new note & orders column -->
                <div class="bio">
                            <!-- recent orders table -->
                
                <h6>Current IDPs </h6>
                          
                            <!-- recent orders table -->
                    <?php
                    while($rows=mysql_fetch_array($res)){
                        $cid=$rows['cid'];
                        $query2="select * from courses where cid='$cid' and completed=0";
                        $res2=mysql_query($query2);
                        $crow=mysql_fetch_assoc($res2);
                        $title=$crow['title'];
                    echo "<div class='row-fluid' >
                        <div class='span4 card'>
                            <a href='idp/viewcourse.php?cid=".$cid."'>
                                <img src='img/course.jpg' class='img-polaroid'>

                                <h5 style='line-height:2px;'>$title<br></h5>
                            <p>Schlumberger, Germany</p>
                            </a>
                        </div>
                    </div>";
                    }
                    ?>
                <h6>Suggested IDPs</h6>
                         
                <!-- recent orders table -->
                    <div class="row-fluid" >

                        <div class="span4 card">
                            <a href="#">
                                <img src="img/course.jpg" class="img-polaroid">

                                <h5 style="line-height:2px">Chemical Engineering<br></h5>
                            <p>Schlumberger, Germany</p>
                            </a>
                        </div>

                        <div class="span4 card">
                            <a href="#">
                                <img src="img/course.jpg" class="img-polaroid">
                                <h5 style="line-height:2px">Petroleum Sciences</h5>
                                <p>Indian Oils Ltd.</p>
                            </a>
                        </div>

                        <div class="span4 card">
                            <a href="#">
                            <img src="img/course.jpg" class="img-polaroid">
                            <h5 style="line-height:2px">Electronics & Communication</h5>
                            <p>Samsung Electronics</p></a>
                        </div>

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