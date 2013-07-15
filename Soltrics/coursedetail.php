<?php
session_start();
$cid=$_GET['cid'];
include('dbconn.php');
$email=$_SESSION['email'];
$query="select uid from users where email='$email'";

?>

<!DOCTYPE html>
<html>


<head>
	<title>Dashboard Overview</title>
    <meta http-equiv="Content-Type" content="text/html; charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet">

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/layout.css">
    <link rel="stylesheet" type="text/css" href="css/elements.css">
    <link rel="stylesheet" type="text/css" href="css/icons.css">
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/user-profile.css" type="text/css" media="screen" />

 

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
   <style type="text/css">
.registerbutton {
	-moz-box-shadow:inset 0px 1px 0px 0px #fceaca;
	-webkit-box-shadow:inset 0px 1px 0px 0px #fceaca;
	box-shadow:inset 0px 1px 0px 0px #fceaca;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffc400), color-stop(1, #ffa200) );
	background:-moz-linear-gradient( center top, #ffc400 5%, #ffa200 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc400', endColorstr='#ffa200');
	background-color:#ffc400;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ffae00;
	display:inline-block;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 30px;
	text-decoration:none;
	text-shadow:1px 1px 0px #ce8e28;
}.registerbutton:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffa200), color-stop(1, #ffc400) );
	background:-moz-linear-gradient( center top, #ffa200 5%, #ffc400 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffa200', endColorstr='#ffc400');
	background-color:#ffa200;
    text-decoration:none;
    color:white;
}.registerbutton:active {
	position:relative;
	top:1px;
}

</style>
    
</head>
<body>

    <!-- navbar -->
     <div class="navbar navbar-inverse navbar-fixed-top" style="
    margin-top: -14px;
">
            <div class="navbar-inner" style="
    background: #222222;
">
                <div class="container" style="
    margin-top: 18px;
">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        
                    </a>
                    
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#" style="
    background: #222222;
    font-weight: bold;
"
">About Us </a></li>
                            
                            <li class="active"><a href="#" style="
    background: #222222;
    font-weight: bold;
"
">Courses </a></li>
                          


                        </ul>
                        
						<a href="signup.php"><button class="btn pull-right" style="
    margin-left: 4px;
">Sign Up</button></a>
						    
                           </form>
                            <form class="navbar-form pull-right offset4" method="post" action="index.php">
                            <input class="span2" type="text" placeholder="Email" name="uname" id="uname" onblur="return validEmail()" autofocus="true"><span id="uerror" style="color:red;margin-top:100px;"></span>
                            <input class="span2" type="password" placeholder="Password" id="pw" name="pw" onblur="return validPassword()"><span id="pwerror" style="color:red;"></span>
                           <input type="submit" class="btn" value="Sign In">
						   
							<!--<a href="signup.php"><button class="btn pull-right">Sign Up</button></a>-->
                       
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <!-- end navbar -->


	<!-- main container -->
    <div class="content wide-content">
        
        <div class="container-fluid" style="
    margin-left: 150px;
    margin-right: 160px;
">
            <div id="pad-wrapper">
               
                <!-- header -->
                <div class="row-fluid" style="
    margin-right: 160px;
">
                    <div class="span7">
                    	<div class="span12">
                        <h1> <?php
							$cid=$_GET['cid'];
							$sql="SELECT * FROM course WHERE cid='$cid' ";
							$result=mysql_query($sql) or die("query error");
							$row=mysql_fetch_assoc($result) or die("array error");
							$title=$row['title'];
              $_SESSION['title']=$title;
							echo ucfirst($row['title']);
							
							?>
							</h1>
                        
                        <p>
						<?php
							$inst=$row['inst'];
							$query="select * from users where email='$inst'";
							$res=mysql_query($query);
							$rows=mysql_fetch_assoc($res);
							echo ucfirst($rows['name']);
							
							?>
						</p>
                        
						
                        
                        <div class="span5" style="padding-top: 25px; margin-left:632px; margin-bottom: -227px;margin-top: -115px;">
                       <iframe height="200" width="320" src="<?php echo $row['video'];?>" frameborder="0" allowfullscreen></iframe></div>
                    </div>

                </div>
                
                <div class="row-fluid" style="padding-top:25px;">
                <div class="span7">
                <h3>Course Summary</h3><hr>

                <p>
				<?php
				echo ucfirst($row['summary']);
							?>
							</p>
                            
                             <?php echo "<a href='enroll.php?cid=".$cid."' class='registerbutton' style=''
    margin-left: 238px;
'>Register Here</a>";?>
                            <a href="#" 
  onclick="
    window.open(
      'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
      'facebook-share-dialog', 
      'width=626,height=436'); 
    return false;" style="
    background: #3B5998;
    padding: 10px;
    background-color: #3B5998;
    color: white;
    text-decoration: none;
    font-weight: bold;
    margin-left: 8px;
    border-radius: 7px;
">
  Share on Facebook
</a> 
                </div>
                </div>
                
                	<div class="row-fluid" style="padding-top:25px;">
                
                  <div class="span7 ">
                   <ul class="nav nav-tabs ">
                     <li><a href="#home" data-toggle="tab">Course Syllabus</a></li>
                      <li><a href="#profile" data-toggle="tab">Course Format</a></li>
                      <li><a href="#messages" data-toggle="tab">Pre-Requisites</a></li>
                      <li><a href="#settings" data-toggle="tab">Suggested Readings</a></li>
                      <li><a href="#readings" data-toggle="tab">FAQ</a></li>
                    </ul> 
                   <div class="tab-content">
                      <div class="tab-pane active" id="home">
                      <p>
					  <?php
					  $syllabus=$row['syllabus'];
					  echo "<a href=$syllabus>$title</a>";
					  ?>
					  </p> </div>
                      <div class="tab-pane" id="profile"><p>  <?php
					  echo ucfirst($row['format']);
					  ?>
					  </p>
					  </div>
					  <div class="tab-pane" id="messages">
					  <p>
					   <?php
					  echo ucfirst($row['pre']);
					  ?>
					  </p>
					  </div>
					  <div class="tab-pane" id="settings">
					  <p>
					   <?php
					  echo ucfirst($row['readings']);
					  ?>
					  </p>
					  </div>
					  <div class="tab-pane" id="settings">
					  <p>
					   <?php
					  echo ucfirst($row['faqs']);
					  ?>
					  </p>
					  </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script>
  $(function () {
    $('#myTab a:last').tab('show');
  })
</script>
</body>


</html>