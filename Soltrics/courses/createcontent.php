<?php
session_start();
include('dbconn.php');
$cid=$_GET['cid'];
$_SESSION['cid']=$cid;
$sql="select * from course where cid='$cid'";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);
$weeks=$row['session'];
if(!empty($_POST['title'])){
$title=$_POST['title'];
$week=$_POST['week'];
$video=$_POST['video'];
move_uploaded_file($_FILES["files"]["tmp_name"],"uploads/" . $_FILES["files"]["name"]);
move_uploaded_file($_FILES["assignments"]["tmp_name"],"uploads/".$_FILES["assignments"]["name"]);
$doc="uploads/".$_FILES['files']['name'];
$assignment="uploads/".$_FILES["assignments"]["name"];
$query="insert into files(cid,title,week,doc,video,assignment) values('$cid','$title','$week','$doc','$video','$assignment')";
mysql_query($query) or die('query failed');
		
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
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
	<style>
		#video,#doc,#assignment{
			visibility:hidden;
		}
	</style>



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
                <a href="createquiz.html">
                    <i class="icon-signal"></i>
                    <span>Add Quiz</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-signal"></i>
                    <span>Settings</span>
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
                <div class="accordion" id="accordion2">
                      <?php
					 for($i=1;$i<=4;$i++){?>
                     <div class='accordion-group'>
                        <div class='accordion-heading'>
                          <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion1' href='#collapseTwo'>
                            Week <?php echo $i; ?>
                          </a>
                        </div>
                        <div id='collapseTwo' class='accordion-body collapse in'>
                          <div class='accordion-inner'>
                          <form action='createcontent.php?cid=<?php echo $cid;?>' class='form-horizontal' method='post' enctype='multipart/form-data'>
							 <div class='control-group'>
								<label class='control-label'>Week</label>
								<div class='controls'>
								  <input type='text' name='week' value="<?php echo $i;?>" readonly>
								</div>
							 </div>
							 
							 <div class='control-group'>
								<label class='control-label'>Title</label>
								<div class='controls'>
								  <input type='text' name='title' placeholder='Title'>
								</div>
							 </div>
						  <div class='control-group'>
						  <label class='control-label'>Add Resource</label><div class='controls'><input type='file' name='files'></div></div>
						  <div class='control-group'><label class='control-label'>Add Video</label><div class='controls'><input type='text' name='video' placeholder='Insert Youtube Url'></div></div>
						  <div class='control-group'><label class='control-label'>Add Assignment</label><div class='controls'><input type='file' name='assignments'></div></div>
						  <div class='control-group'>
							<div class='controls'><input type='submit' class='btn btn-primary'>
							</div>
						  </div>
						  </form>
                        </div>
                      </div>
					  </div>
                      <?php } ?>
                </div>
            </div>
        </div>
    </div>


	<!-- scripts -->
<script src="code.jquery.com/jquery-latest.js"></script>
<script src="code.jquery.com/jquery-1.9.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script>
    // When the server is ready...
    $(function () {
        'use strict';
        
        // Define the url to send the image data to
        var url = 'files.php';
        
        // Call the fileupload widget and set some parameters
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                // Add each uploaded file name to the #files list
                $.each(data.result.files, function (index, file) {
                    $('<li/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                // Update the progress bar while files are being uploaded
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    });
    
  </script>
  <script src="js/theme.js"></script>
	<script type="text/javascript">
		function show(){
			document.getElementById("video").style.visibility="visible";
		}
		function showfield1(){
			document.getElementById("doc").style.visibility="visible";
		}
		function showfield2(){
			document.getElementById("assignment").style.visibility="visible";
		}
	</script>

  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="js/jquery.form2.js"></script> 
        <script type="text/javascript">
            $('document').ready(function(){
              $('#videourl').ajaxForm( {
              target: '#preview', 
              success: function() { 
              $('#video').slideUp('fast'); 
              $('#preview').html("Video Submitted");
              } 
          }); 
            
            });
        </script> 

</body>


</html>