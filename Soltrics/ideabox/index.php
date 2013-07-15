<?php
session_start();
error_reporting(0);
include('dbconn.php');
$email=$_SESSION['email'];
$sql="select * from users where email='$email'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
echo $row['email'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Discussion</title>
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

<script type="text/javascript">
$(function() 
{
$(".view_comments").click(function() 
{

var ID = $(this).attr("id");

$.ajax({
type: "POST",
url: "viewajax.php",
data: "msg_id="+ ID, 
cache: false,
success: function(html){
$("#view_comments"+ID).prepend(html);
$("#view"+ID).remove();
$("#two_comments"+ID).remove();
}
});

return false;
});
});
</script>

<style>
body{background:#fff;font-family:"lucida grande",tahoma,verdana,arial,sans-serif;font-size:11px;color:#333;margin:0;padding:0;text-align:left;direction:ltr;unicode-bidi:embed}
*
{
margin:0px;
padding:0px;

}
a
{	text-decoration:none; }
	

.egg{min-height:58px;padding-bottom:8px;position:relative}
.egg_Body{border-top:1px solid #eee;color:#808080;padding-top:8px}
.egg_Message{font-size:13px !important;font-weight:normal;overflow:hidden}

h3{font-size:13px;color:#333;margin:0;padding:0}
.comment_ui
{
background-color:#f2f2f2;border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;margin-bottom:2px;padding:6px 4px 3px 6px;width:431px; 
}
.dddd
{
background-color:#f2f2f2;border-bottom:1px solid #e5eaf1;clear:left;float:none;overflow:hidden;margin-bottom:2px;padding:6px 4px 3px 6px;width:431px; 
}
.comment_text{padding:2px 0 4px; color:#333333}
.comment_actual_text{display:inline;padding-left:.4em}

ol { 
	list-style:none;
	margin:0 auto;
	width:500px;
	margin-top: 20px;
}
.clean { display:none}
.editbox
{
overflow: hidden;
height: 61px;
border: solid 1px rgb(111, 219, 255);
min-width: 488px;
max-width: 488px;
font-size: 19px;
font-family: Arial, Helvetica, sans-serif;
padding: 5px;
border-radius: 11px;
}
#but{
background-color: rgb(0, 200, 238);
border: 1px solid rgb(0, 186, 233);
padding: 2px 16px;
font-family: Arial, Helvetica, sans-serif;
color: #FFFFFF;
float: right;
cursor: pointer;
margin-top: 6px;
border-radius: 11px;
font-size: 16px;
font-weight: bold;
}
#buts{
background-color: rgb(0, 200, 238);
border: 1px solid rgb(0, 186, 233);
padding: 2px 16px;
font-family: Arial, Helvetica, sans-serif;
color: #FFFFFF;
float: right;
cursor: pointer;
margin-top: 6px;
border-radius: 11px;
font-size: 16px;
font-weight: bold;
}
.egg_Message img{
float:left;
padding-right: 7px;
}
#sssss{
float:right;
width: 392px;
}
</style>
</head>

<body>
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
                <a class="dropdown-toggle" href="coursecontent.php?cid=<?php echo $cid;?>">
                    <i class="icon-group"></i>
                    <span>Video Lectures</span>
                    <i class="icon-film"></i>
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">
                    <i class="icon-bullseye"></i>
                    <span>Assignments</span>
                    
                </a>
                
            </li>
            <li>
                <a class="dropdown-toggle" href="">
                    <i class="icon-group"></i>
                    <span>Discussions</span>
                    
                </a>
                
            </li>
            
            <li>
                <a class="dropdown-toggle" href="">
                    <i class="icon-question"></i>
                    <span>FAQs</span>
                    
                </a>
                
            </li>
                       
        </ul>
    </div>
	
	<div class="content">



        <div class="container-fluid" style="
    margin-top: 20px;
">
             <div id="pad-wrapper">
                    
                   <div class="span8">
<ol>
<li style="margin-bottom: 50px;">
<form action="savemessage.php" method="post">
<textarea class="editbox" cols="23" rows="3" name="message" data-toggle="tooltip" data-trigger="focus" title="Write your idea or suggestion" data-placement="right" type="text" type="text"  placeholder="What's your Idea..."rows="4"></textarea>


<input id="but" name="" type="submit" value="POST" />
</form>
</li>
<?php
include("db.php");
$msql=mysql_query("select * from messages order by msg_id desc");
while($messagecount=mysql_fetch_array($msql))
{
$id=$messagecount['msg_id'];
$msgcontent=$messagecount['message'];
?>
<li class="egg">

<div class="egg_Body">
<h3 class="egg_Message" >
<img src="img/def.jpg" /><span><?php echo $msgcontent; ?></span>

<div style="margin-top:10px; margin-left: 58px;">
<?php 

$sql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id");
$comment_count=mysql_num_rows($sql);

if($comment_count>2)
{
$second_count=$comment_count-2;
?>
<div class="comment_ui" id="view<?php echo $id; ?>">
<div>
<a href="#" class="view_comments" id="<?php echo $id; ?>">View all <?php echo $comment_count; ?> comments</a>
</div>
</div>
<?php 
} 
else 
{
$second_count=0;
}
?>

<div id="view_comments<?php echo $id; ?>"></div>

<div id="two_comments<?php echo $id; ?>">
<?php
$listsql=mysql_query("select * from comments where msg_id_fk='$id' order by com_id limit $second_count,2 ");
while($rowsmall=mysql_fetch_array($listsql))
{ 
$c_id=$rowsmall['com_id'];
$comment=$rowsmall['comments'];
?>

<div class="comment_ui">

<div class="comment_text">
<div  class="comment_actual_text"><img src="profile.jpg" width="32" height="32" /><div id="sssss"><?php echo $comment; ?></div></div>
</div>

</div>

<?php } ?>
<div class="dddd">
<div>
<img src="profile.jpg" width="32" height="32" />
<form action="savecomment.php" method="post">
<input name="mesgid" type="hidden" value="<?php echo $id ?>" />
<input name="mcomment" type="text" placeholder="Write a comment..." style="height: 24px; border:1px solid #BDC7D8; padding:3px; border-width: 1px 0px 1px 1px; width:302px;" />
<input id="buts" name="" type="submit" value="Reply" />
</form>
</div>
</div>
</div>
</div>
</div>
</li>
<?php
}
?>
</ol>
</div>
</div>
</div></div>
<script src="code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
</body>
</html>
