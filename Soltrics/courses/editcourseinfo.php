<?php

session_start();
include('dbconn.php');


if(!empty($_POST['title'])){
    $title=$_POST['title'];
	$category=$_POST['category'];
	$inst=$_POST['inst'];
	$author=$_SESSION['uid'];
	$session=$_POST['session'];
	$work=$_POST['work'];
	$summary=$_POST['summary'];
	$faqs=$_POST['faqs'];
	$video=$_POST['video'];
	$pre=$_POST['pre'];
	$format=$_POST['format'];
	$readings=$_POST['readings'];
	
	if(file_exists($_FILES['syllabus']['name']))
		echo "File Already Exists!!!";
	else
		move_uploaded_file($_FILES['syllabus']['tmp_name'],"uploads/".$_FILES['syllabus']['name']);
	$syllabus="uploads/".$_FILES['syllabus']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
	$image="uploads/".$_FILES['image']['name'];
    
    $query="update course set title='$title',category='$category',inst='$inst',session='$session',work='$work',summary='$summary',faqs='$faqs',video='$video',pre='$pre',format='$format',readings='$readings' where author='$author'";
    
    mysql_query($query) or die(mysql_error());
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
            <li>

                <a href="createcontent.php">
                    <i class="icon-home"></i>
                    <span>Add Content</span>
                </a>
            </li>            
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="#">
                    <i class="icon-signal"></i>
                    <span>Course Info</span>
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

                <div class="row-fluid">
                    <div class="span15">
                        <div id="fuelux-wizard" class="wizard row-fluid">
                            <ul class="wizard-steps">
                                <li data-target="#step1" class="active">
                                    <span class="step"><a href="#step1">1</a></span>
                                    <span class="title">General Info</span>
                                </li>
                                
                                <li data-target="#step3">
                                    <span class="step"><a href="#step3">2</a></span>
                                    <span class="title">Course Content</span>
                                </li>
                                <li data-target="#step4">
                                    <span class="step"><a href="#step4">3</a></span>
                                    <span class="title">Course Plan</span>
                                </li>
                            </ul>                            
                        </div>
                        <div class="step-content">
                            <div class="step-pane active" id="step1">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                        <form name="f1" method="post" action="createcourse.php" enctype="multipart/formdata">
                                            <div class="field-box">
                                                <label>Title:</label>
                                                <input class="span8" type="text" name="title"/>
                                            </div>
                                            <div class="field-box">
                                                <label>Category</label>
                                                <select name="category" style="width:250px;" class="select2 span8">
                                                    <option></option>
                                                    <option>Chemical</option>
													<option>HSS</option>
													<option>Softwares</option>
													<option>CS</option>
													<option>Elec</option>
													<option>Mechanical</option>
													<option>Energy</option>
													<option>Instrumentation</option>
													<option>Management</option>
													<option>Mathematics</option>
													<option>Civil</option>
                                                </select>
                                            </div>
                                            <div class="field-box">
                                                <label>Instructor:</label>
                                                <input class="span7 offset2" type="text" name="inst"/>
                                                
                                            </div>
                                            <div class="field-box">
                                               <label>Course Session</label>
                                                <select name="session" style="width:250px;margin-left:1px;" class="select2 span8" placeholder="Select weeks">
                                                    <option></option>
                                                    <option value="KS">1</option>
                                                    <option value="KY">2</option>
                                                    <option value="LA">3</option>
                                                    <option value="MN">4</option>
                                                    <option value="KS">5</option>
                                                    <option value="KY">6</option>
                                                    <option value="LA">7</option>
                                                    <option value="MN">8</option>
                                                    <option value="LA">9</option>
                                                    <option value="MN">10</option>
                                                </select>
                                            </div>

                                            <div class="field-box">
                                               <label>Workload</label>
                                               <input type="text" name="work" class="span8">
                                            </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="step-pane" id="step3">
                                <div class="row-fluid form-wrapper">
                                    <div class="span8">
                                            <div class="field-box">
                                              <label>Course Summary</label>
                                              <textarea class="span8" rows="4" placeholder="max 500 characters" name="summary" maxlength="500"></textarea>
                                            </div>
                                           
                                            <div class="field-box">
                                                <label>Syllabus</label>
                                                <input type="file" name="syllabus" class="span8" placeholder=".pdf,.doc or .txt">
                                               </div>
                                    
                                            <div class="field-box">
                                                <label>FAQs</label>
                                                <textarea class="span8" rows="4" placeholder="max 500 characters" name="faqs" maxlength="500"></textarea>
                                             </div>

                                             <div class="field-box">
                                                <label>Intro Video</label>
                                                <input type="text" class="span8" name="video" placeholder="Insert youtube url:">
                                            </div>
                                            
                                            <div class="field-box">
                                                <label>Pre-requisites</label>
                                               <textarea id="wysi-i" name="pre" class="span10 wysihtml5" rows="5"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step-pane" id="step4">
                                <div class="row-fluid form-wrapper payment-info">
                                    <div class="span8">
                                            <div class="field-box">
                                               <label>Course Format</label>
                                               <textarea class="span8" rows="4" placeholder="max 500 characters" name="format" maxlength="500"></textarea>
                                            </div>

                                             <div class="field-box">
                                               <label>Recommended Readings</label>
                                               <textarea class="span8" rows="4" placeholder="max 500 characters" name="readings" maxlength="500"></textarea>
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
                            <button type="submit" class="btn-glow success btn-finish">
                                Create Course
                            </button>
                            </form>
                        </div>
                    </div>
                </div>



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


</html>