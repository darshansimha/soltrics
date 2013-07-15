<?php
//$qid=$_GET['qid'];
include('dbconn.php');
$sql="select * from quiz_detail";
$res=mysql_query($sql);
$row=mysql_fetch_assoc($res);
$qid=$row['qid'];
$name=$row['qname'];
$qname='q_'.$row['qname'];
echo $qname;
$query="select * from $qname";
$qres=mysql_query($query) or die("failed");
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
            <li class="dropdown">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    IDPs
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
                        <li><a href="personal-info.html">Personal info</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Overview</a></li>

                    </ul>
                </li>

                <li class="settings hidden-phone">
                    <a href="signin.html" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
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
                <a href="#">
                    <i class="icon-signal"></i>
                    <span>Menu1</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Menu2</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#">submenu</a></li>
                    <li><a href="#">submenu</a></li>
                    <li><a href="#">submenu</a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Menu3</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#">submenu</a></li>
                    <li><a href="#">submenu</a></li>
                    <li><a href="#">submenu</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">

                <div class="span8 quest">

                <form action="submitquiz.php" method="post">
				<?php
				while($qrow=mysql_fetch_array($qres)){
					$ques=$qrow['question'];
					$o1=$qrow['o1'];
					$o2=$qrow['o2'];
					$o3=$qrow['o3'];
					$o4=$qrow['o4'];
					$ans=$qrow['ans'];
					echo "<h2>$name</h2>
					<ul>
						<h3>$ques</h3>
						<li><label class='radio'>
							<input type='radio' name='optionsRadios' id='optionsRadios1' value=$o1 checked>$o1</label>
						</li>
						<li><label class='radio'>
							<input type='radio' name='optionsRadios' id='optionsRadios1' value=$o2 checked> $o2 </label>
						</li>                    
						<li><label class='radio'>
							<input type='radio' name='optionsRadios' id='optionsRadios1' value=$o3 checked> $o3 </label>
						</li>                    
						<li><label class='radio'>
							<input type='radio' name='optionsRadios' id='optionsRadios1' value=$o4 checked> $o4 </label>
						</li>
					</ul>
					

					<input type='submit' class='btn btn-primary span2' style='margin-top:20px;' value='Submit Quiz'>";
				}
				?>
                </form>

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