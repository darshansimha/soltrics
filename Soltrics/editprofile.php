<?php
session_start();
include('dbconn.php');
error_reporting(0);
if(!empty($_POST['nm'])){
	$nm=$_POST['nm'];
	$email=$_SESSION['email'];
	$college=$_POST['college'];
	$ph=$_POST['ph'];
	$fb="www.facebook.com/".$_POST['fb'];
	$ln="in.linkedin.com/in/".$_POST['ln'];
	$query="update users set name= '$nm', college= '$college', phone= '$ph', fb= '$fb' ,ln= '$ln' where uid= '$uid'";
	mysql_query($query) or die("Could not Update");
	$sql="select * from users where uid='$uid'";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	header("Location:dashboard.php");
	
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Soltrics</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">
	
    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
	
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" /> 

    <!-- this is the main css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
	
    <!-- libraries -->
    <link href="css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet">
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet">
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet">
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet">
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/form-wizard.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/compiled/image-picker.js">

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

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
                <a href="editprofile.php">
                    <i class="icon-signal"></i>
                    <span>Edit Profile</span>
                </a>
            </li>
           

        </ul>
    </div>
	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">

                <div class="row-fluid">
                    <div class="span12">
                        <div id="fuelux-wizard" class="wizard row-fluid">
                            <ul class="wizard-steps">
                                <li data-target="#step1" class="active">
                                    <span class="step"><a href="#step1">1</a></span>
                                    <span class="title">General Info</span>
                                </li>
                                
                                <li data-target="#step3">
                                    <span class="step"><a href="#step3">2</a></span>
                                    <span class="title">Social Info</span>
                                </li>
                                <li data-target="#step4">
                                    <span class="step"><a href="#step4">3</a></span>
                                    <span class="title">Subscriptions</span>
                                </li>
                            </ul>                            
                        </div>
                        <div class="step-content">
                            <div class="step-pane active" id="step1">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                        <form name="f1" method="post" action="registration.php" enctype="multipart/formdata">
                                            <div class="field-box">
                                                <label>Name:</label>
                                                <input class="span8" type="text" name="nm"/>
                                            </div>
                                            
                                            <div class="field-box">
                                                <label>College:</label>
                                                <input class="span8" type="text" name="college"/>
                                                
                                            </div>
                                            <div class="field-box">
                                                <label>Phone no.</label>
                                                <input class="span8" type="text" name="ph"/>
                                            </div>

                                        
                                    </div>
                                </div>
                            </div>
                          
                            <div class="step-pane" id="step3">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                        
                                            <div class="field-box">
                                                <img src="img/no-img-gallery.png">
                                            </div>
                                            <div class="field-box">

                                                <label>Profile Pic:</label>
                                                <input type="file" name="profile" />
                                            </div>
                                            <div class="input-prepend field-box">
                                                <span class="add-on">http://www.facebook.com/</span>
                                                <input class="input-large" type="text" name="fb" />
                                            </div>
                                            <div class="input-prepend field-box">
                                                <span class="add-on">http://in.linkedin.com/in/</span>
                                                <input class="input-large" type="text" name="ln"/>
                                            </div>
                                           
                                    </div>
                                </div>
                            </div>
                            <div class="step-pane" id="step4">
                                <div class="row-fluid form-wrapper payment-info">
                                    <div class="span8">
                                        
                                            <div class="field-box">
                                                <select multiple="multiple" class="image-picker">
                                                  <option value="1">Option 1</option>
                                                  <option value="2">Option 2</option>
                                                  <option value="3">Option 3</option>
                                                  <option value="4">Option 4</option>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-actions">
                            <button type="button" disabled class="btn-glow primary btn-prev"> 
                                <i class="icon-chevron-left"></i> Prev
                            </button>
                            <button type="button" class="btn-glow primary btn-next" data-last="Finish">
                                Next <i class="icon-chevron-right"></i>
                            </button>
                            <input type="submit" class="btn-glow success btn-finish" value="Update Details">
                            </form>
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts for this page -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/fuelux.wizard.js"></script>
    <script src="js/image-picker.js"></script>
    
    <script type="text/javascript">
        $(function () {
            var $wizard = $('#fuelux-wizard'),
                $btnPrev = $('.wizard-actions .btn-prev'),
                $btnNext = $('.wizard-actions .btn-next'),
                $btnFinish = $(".wizard-actions .btn-finish");

            $wizard.wizard().on('finished', function(e) {
                // wizard complete code
            }).on("changed", function(e) {
                var step = $wizard.wizard("selectedItem");
                // reset states
                $btnNext.removeAttr("disabled");
                $btnPrev.removeAttr("disabled");
                $btnNext.show();
                $btnFinish.hide();

                if (step.step === 1) {
                    $btnPrev.attr("disabled", "disabled");
                } else if (step.step === 3) {
                    $btnNext.hide();
                    $btnFinish.show();
                }
            });

            $btnPrev.on('click', function() {
                $wizard.wizard('previous');
            });
            $btnNext.on('click', function() {
                $wizard.wizard('next');
            });
        });
    </script>
</body>

<!-- Mirrored from detail.herokuapp.com/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 18 Jun 2013 17:38:40 GMT -->
</html>