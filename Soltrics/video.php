<?php
	session_start();
    $videoid=$_GET['videoid'];
	$week=$_SESSION['week'];
	$cid=$_SESSION['cid'];
	include('dbconn.php');
	if(!isset($_SESSION['uid']))
	header('Location:index.php');
	$uid=$_SESSION['uid'];
	$query="select * from users where uid='$uid'";
	$result=mysql_query($query);
	$urow=mysql_fetch_assoc($result);
	$name=$urow['name'];
	$sql="select * from files where week='$week' and cid='$cid'";
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
                       <?php echo $name; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.php">Edit info</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="logout.php">Logout</a></li>

                    </ul>
                </li>

               
            </ul>            
        </div>
    </div>
    <!-- end navbar -->




	<!-- main container -->
    <div class="content wide-content">



        <div class="container-fluid">
            <div id="pad-wrapper">

                <a href="coursecontent.php?cid=<?php echo $cid; ?>"<button class="btn btn-primary">Back to Course</button></a>
                <div class="row-fluid videopage">
                    <div class="span8 videopane">
					<ul id="container">
                      <?php echo "<li> <iframe src='http://www.youtube.com/embed/$videoid' rel=0 frameborder='0'  allowfullscreen></iframe> </li>"; ?>
					</ul>
                    </div>

                    <div class="span4 notepane">
                        <ul class="nav nav-tabs" id="myTab">
                          <li class="active"><a href="#Notes" data-toggle="tab">Notes</a></li>
                          <li><a href="#Files" data-toggle="tab">Files</a></li>

                        </ul>
                         
                        <div class="tab-content">
                          <div class="tab-pane active" id="Notes">
                            <div class="field-box">
                                
                                <div class="wysi-column">
                                    <form action="download.php" method="post"><textarea id="notes" name="notes" class="wysihtml5 span12" rows="20"></textarea>
                                    <input type="submit" class="btn btn-primary" value="Save">
									</form>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="Files">
						  <?php
						  while($row=mysql_fetch_array($res)){
						  $doc=$row['doc'];
							echo "<li><a href='$doc'>File 1</a></li>";
						  }
						  ?>
                        </div>
                         

                        </div>
                    </div>
                </div>
                <div id="slidenav" class="btn-group" style="margin-top:20px;">
                  <a href="javascript:return false;"<button class="btn btn-primary">Previous</button></a>
                  <a href="javascript:return false;"<button class="btn btn-primary">Next</button></a>
                </div>
            </div>
        </div>
    </div>


	<!-- scripts -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/theme.js"></script>
	
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
            $('.datepicker').datepicker().on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });

            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.js"></script>
	
</body>


</html>