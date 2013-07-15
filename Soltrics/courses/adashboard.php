<?php

session_start();
include('dbconn.php');
if(!isset($_SESSION['email']))
	header("Location:../index.php");
$email=$_SESSION['email'];
$sql="select * from users where email='$email'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
$uid=$_SESSION['uid'];

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
                        <li><a href="../editprofile.php">Personal info</a></li>
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
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="#">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
            <li>
                <a href="createcourse.php">
                    <i class="icon-book"></i>
                    <span>Create Course</span>
                </a>
            </li>
            
            <li>
                <a href="editprofile.php">
                    <i class="icon-group"></i>
                    <span>Edit Profile</span>
                    
                </a>
                
            </li>

        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    
     <div class="content">
        <div class="container-fluid">
             <div id="pad-wrapper">
                   <center> 
				   <hr>
                    <h2>My Courses</h2>
<?php
 //error_reporting(0);

$sql="SELECT * FROM course where author='$uid'";
$result=mysql_query($sql) or die("query failed");

echo "<br/><br/><table class='table table-striped'>
<tr>
<th> Courses </th>
<th> Options </th>
</tr>";
while($rows=mysql_fetch_array($result)){

if($row['uid']==$uid)
{
echo "<tr>";
echo "<td>" . $rows['title'] . "</td>";
$title=$rows['title'];
$query="select cid from course where title='$title'";
$res=mysql_query($query);
$rows=mysql_fetch_assoc($res);
$cid=$rows['cid'];
echo "<td>      <div class='btn-group'>
     <a href='viewcourse.php?cid=".$cid."'><button class='btn'>View</button></a>
     <a href='editcourseinfo.php?cid=".$cid."'><button class='btn'>Edit</button></a>
    <a href='submissions.php?cid=".$cid."'><button class='btn'>Submissions</button></a>
	<a href='createcontent.php?cid=".$cid."'><button class='btn'>Course Content</button></a>
    </div></td>";
echo "</tr>";

}

}

echo"</table>";

				
					?>
                  </center>
             </div>
        </div>
		
	<!-- scripts -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/theme.js"></script>


</body>


</html>