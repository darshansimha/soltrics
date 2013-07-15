<?php
session_start();
include('dbconn.php');
$cid=$_GET['cid'];
$sql="select * from quiz_submissions where cid='$cid'";
$res=mysql_query($sql) or die(mysql_error());
$quizsql="select * from quiz_detail where cid='$cid'";
$qres=mysql_query($quizsql) or die(mysql_error());
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
    <link rel="stylesheet" href="css/compiled/quizpage.css" type="text/css" media="screen" /> 

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
                  <li><a href="#">Create</a></li>
                  <li><a href="#">Dashboard</a></li>
                </ul>
            </li>
           
            </ul>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        Settings
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php">Edit info</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Overview</a></li>

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
                <a href="createcontent.php?cid=<?php echo $cid;?>">
                    <i class="icon-home"></i>
                    <span>Add Content</span>
                </a>
            </li>            
            <li>
                <a href="editcourseinfo.php">
                    <i class="icon-signal"></i>
                    <span>Course Info</span>
                </a>
            </li>
             <li>
                <a href="createquiz.php">
                    <i class="icon-signal"></i>
                    <span>Add Quiz</span>
                </a>
            </li>
           
            <li>
                <a href="../ideabox">
                    <i class="icon-signal"></i>
                    <span>Idea Box</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->
	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
                <div class="quest span8">
				<?php
				while($qrow=mysql_fetch_array($qres)){
					$qname=$qrow['qname'];
					echo "<h3>$qname result student list:</h3>";
					while($row=mysql_fetch_array($res)){
					$uid=$row['uid'];
					$score=$row['score'];
					$query="select * from users where uid='$uid'";
					$result=mysql_query($query);
					$urow=mysql_fetch_assoc($result);
					$name=$urow['name'];
					echo "<table class='table table-hover  span8' style='text-align:center;margin-top:30px;'>
					  <thead>
						<tr>
						  <th>Name</th>
						  <th>Marks</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>$name</td>
						  <td>$score</td>
						</tr>
					  </tbody>
					</table>";
					}
				}	
				?>
					<div class='btn-group span3 offset5'>
					  <a href="adashboard.php"><button class='btn btn-primary'><i class='icon-arrow-left icon-white'></i> Back to Dashboard</button></a>
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