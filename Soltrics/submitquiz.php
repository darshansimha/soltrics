<?php
	session_start();
	//$uid=$_SESSION['uid'];
	include('dbconn.php');
	$score=0;
	$sql="select * from quiz_detail";
	$res=mysql_query($sql);
	$row=mysql_fetch_assoc($res);
	$qid=$row['qid'];
	$qname=$_SESSION['table'];
	$query="select * from $qname";
	$res=mysql_query($query) or die(mysql_error());
	
	
	while($rows=mysql_fetch_assoc($res)){
	$ans=$rows['ans'];
	$id=$rows['ques_id'];
	$type=$rows['type'];
	if($type==0)
	$q="ansmul$id";
	else if($type==1)
	$q="ansans$id";
	else if($type==2)
	$q="ansdis$id";
	else($type==3)
	$q="anstrue$id";
	
	if($ans==$_POST[$q]){
	$score++;
	$feedback="Excellent";
	}
	else
	$feedback="Please refer Week 1 materials";
	}
	$sql="insert into quiz_submissions(uid,qname,score) values('1','$qname','$score')";
	mysql_query($sql) or die(mysql_error());
	
?>

<!DOCTYPE html>
<html>


<head>
	<title>Author Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	footer{
				background:#222;
				height:73px;
				margin-bottom:-42px;
				text-decoration:none;
			}
			#foot{
				float:left;
				margin-left:50px;
				text-align:center;
				padding:10px;
				text-decoration:none;
			}
			#profiles{
				float:right;
				margin-right:50px;
				padding-right:10px;
				text-decoration:none;
			}
        </style>
    
    
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

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
    margin-top: 19px;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        
                    </a>
                    
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#" style="
    background: #222222;
    font-weight: bold;

">About Us </a></li>
                            
                            <li class="active"><a href="#" style="
    background: #222222;
    font-weight: bold;
"
">Courses </a></li>
                          <!--<li class="active"><a href="#"></a></li>-->


                        </ul>
                        
						<a href="signup.php"><button class="btn pull-right" style="
    margin-left: 4px;
">Sign Up</button></a>
						    
                           </form>
                            <form class="navbar-form pull-right offset4" method="post" action="index.php">
                            <input class="span2" type="text" placeholder="Email" name="uname" id="uname" onblur="return validEmail()" autofocus="true"><span id="uerror" style="color:red;margin-top:100px;"></span>
                            <input class="span2" type="password" placeholder="Password" id="pw" name="pw" onblur="return validPassword()"><span id="pwerror" style="color:red;"></span>
                           <input type="submit" class="btn" value="Sign In">
						   
							
                       
                    </div>
                </div>
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
                    <i class="icon-book"></i>
                    <span>Course Syllabus</span>
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="create-idp.php">
                    <i class="icon-time"></i>
                    <span>Course Schedule</span>
                    
                </a>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Video Lectures</span>
                    <i class="icon-film"></i>
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-paper-clip"></i>
                    <span>Documents</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-bullseye"></i>
                    <span>Assignments</span>
                    
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-group"></i>
                    <span>Discussions</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">+
                    <i class="icon-question"></i>
                    <span>FAQs</span>
                    
                </a>
                
            </li>
           
        </ul>
    </div>
	
	
	<div class="content">
        <div class="container-fluid" style="margin-top: 20px;">
             <div id="pad-wrapper">
			 
				<h4><?php echo "Quiz Submitted Successfully!!!";
				echo "Your Score: $score \n"; ?></h4>
				
			 
			 
			  
			 </div>
		</div>
		
	</div>