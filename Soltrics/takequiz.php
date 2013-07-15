<?php
session_start();
include('dbconn.php');
$cid=$_SESSION['cid'];
$sql="select * from quiz_detail where cid='$cid'";
$res=mysql_query($sql);

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
                <a href="dashboard.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
             <li>
             <a href="course/syllabus.php">
                    <i class="icon-book"></i>
                    <span>Course Syllabus</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="course/schedule.php">
                    <i class="icon-time"></i>
                    <span>Course Schedule</span>
                    
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="course/coursecontent.php?cid=<?php echo $cid;?>">
                    <i class="icon-group"></i>
                    <span>Video Lectures</span>
                    <i class="icon-film"></i>
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="course/assignments.php">
                    <i class="icon-bullseye"></i>
                    <span>Assignments</span>
                    
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="ideabox">
                    <i class="icon-group"></i>
                    <span>Discussions</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="course/faqs.php">
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

                <h3>List of quizzes</h3>
                

                <table class=" table table-hover  span8 " style="text-align:center;margin-top:30px;">
                  <!-- <caption>Find all the quizzes here</caption> -->
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Attempt</th>

                    </tr>
                  </thead>
                  <tbody>
					<?php
					while($row=mysql_fetch_array($res)){
					$qname=$row['qname'];
					$date=$row['date'];
					$qid=$row['qid'];
                      echo "<tr><td>$qname</td>
                      <td>$date</td>
                      <td><a href='attemptquiz.php?qid=$qid'<button class='btn btn-primary'>Attempt</button></a></td>
                    </tr>";
					}
                    ?>
                  </tbody>
                </table>


            
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