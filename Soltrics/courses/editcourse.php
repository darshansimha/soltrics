<?php
	//session_start();
	$host="localhost";
	$user="root";
	$pass="";
	$db="soltrics";
	$dbcon=mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($db) or die("Could not select database");
	$cid=$_GET['cid'];
	$query="select title from idp where cid=$cid";
	$res=mysql_query($query) or die("Could not get title");
	$row=mysql_fetch_assoc($res);
	$title=$row['title'];
	if(isset($_POST['weeks'])){
		$weeks=$_POST['weeks'];
		if(!is_dir($title)){
			mkdir($title,777);
		}
		if(!is_dir($title.'/'.$weeks)){
			mkdir($title.'/'.$weeks,777);
		}
		
	$allowedExts = array("pdf", "doc", "docx");
	$tmp = explode(".", $_FILES["file"]["name"]);
	$extension=end($tmp);
	if (($_FILES["file"]["type"] == "application/pdf")
	&& ($_FILES["file"]["size"] < 2000000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
		{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
	  else
		{
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["file"]["tmp_name"];
		
		if (file_exists($title.'/'.$weeks . $_FILES["file"]["name"]))
		  {
		  echo $_FILES["file"]["name"] . " already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  $title.'/'.$weeks . $_FILES["file"]["name"]);
		  $doc=$title.'/'.$weeks.$_FILES["file"]["name"];
		  echo "Stored in: " . $title.'/'.$weeks . $_FILES["file"]["name"];
		  }
		
		}
	 }
	else
	  {
	  echo "Invalid file";
	  }	
		
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Manage IDP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <link href="css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet">
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet">
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet">
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet">
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/datepicker.css" type="text/css" rel="stylesheet" />
    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />    
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/compiled/form-wizard.css" type="text/css" media="screen" />
   
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
    	#doc,#video,#quiz{
			visibility:hidden;
		}
    </style>
    
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.html">Soltrics</a>

            <ul class="nav pull-right">                
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">8</span>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>You have 6 new notifications</h3>

                                <a href="#" class="item">
                                    <i class="icon-signin"></i> Submission for an IDP
                                    <span class="time"><i class="icon-time"></i> 18 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-envelope-alt"></i> Mail from the IDP author
                                    <span class="time"><i class="icon-time"></i> 28 min.</span>
                                </a>

                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> Download the IDP files
                                    <span class="time"><i class="icon-time"></i> 1 day.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        Your account
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="personal-info.html">Personal info</a></li>
                        <li><a href="#">Account settings</a></li>
                        <li><a href="#">Logout</a></li>

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
            
            <li >
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="adashboard.html">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
             <li>
             <a href="createcourse.html">
                    <i class="icon-home"></i>
                    <span>Create Course</span>
                </a>
            </li>
            <li>
                <a href="createidp.php">
                    <i class="icon-group"></i>
                    <span>Create IDP</span>
                    <i class="icon-chevron-down"></i>
                </a>
               
            </li>
           
            <li>
                <a class="dropdown-toggle" href="idpsettings.html">
                    <i class="icon-group"></i>
                    <span>IDP Settings</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#">Manage IDP'S & Courses</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
             <div id="pad-wrapper">
             	<center><div class="span8">
                <form method="post" enctype="multipart/formdata" action="editidp.php?cid=<?php echo $cid?>">
				<div id="field-box">
                <label><h3>Select Week</h3></label><br>
				 <select name="weeks" style="width:250px;margin-left:1px;" class="select2" placeholder="Select weeks">
					<option></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
				</div>
                <hr>
                
                <div id="field-box" style="padding-top:10px;">
               	 <input type="button" class="span2 btn btn-primary" value="Add Document" onClick="show1()"><span class="span8" style="color:red">(PDF,doc,docx)</span><br>
                 <div id="doc" class="span8"><input type="file"  name="file"></div>
                </div><br><hr>
                <div id="field-box">
               	 <input type="button" class="span2 btn btn-primary" value="Add Video" onClick="show2()"><br>
                 <div id="video" class="span8"><input type="text" name="video" placeholder="Insert youtube url"></div>
                </div>  <br><hr>
                <div id="field-box">
               	 <input type="button" class="span2 btn btn-primary" value="Add Quiz" onClick="show3()"><br>
                 <div id="quiz" class="span8"><input type="text" name="quiz" placeholder="Enter Quiz name"></div><br><hr>
                </div>  
                <input type="submit" class="btn-glow success btn-finish" value="Upload">  
               </form> 
               </div> 
                </center>           
             </div>
        </div>
    </div>


	<!-- scripts -->
    <script src="js/wysihtml5-0.3.0.js"></script>
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-wysihtml5-0.0.2.js"></script>
    <script src="js/bootstrap.datepicker.js"></script>
    <script src="js/jquery.uniform.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/fuelux.wizard.js"></script>
    <script src="js/image-picker.js"></script>
    <script type="text/javascript">
        $(function () {

            // add uniform plugin styles to html elements
            $("input:checkbox, input:radio").uniform();

            // select2 plugin for select elements
            $(".select2").select2({
                placeholder: "Select a State"
            });

            // datepicker plugin
           
            // wysihtml5 plugin on textarea
            $(".wysihtml5").wysihtml5({
                "font-styles": false
            });
        });
    </script>
   
    
     
    <script type="text/javascript">
		function show1(){
			document.getElementById("doc").style.visibility="visible";
		}
		function show2(){
			document.getElementById("video").style.visibility="visible";
		}
		function show3(){
			document.getElementById("quiz").style.visibility="visible";
		}
	</script>

</body>


</html>