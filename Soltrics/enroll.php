<?php
session_start();
$cid=$_GET['cid'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];
$title=$_SESSION['title'];
include('dbconn.php');
$sql="select * from registered where uid='$uid' and cid='$cid'";
$res=mysql_query($sql);
$count=mysql_num_rows($res);
if($count>0){
echo "You are already enrolled in this course";
header('Location:dashboard.php');
}
else{
$query="insert into registered(uid,cid) values('$uid','$cid')";
mysql_query($query) or die('Cannot Enroll');
$message="Welcome to Soltrics.\n
You have registered for".$title;
$from = "admin@colearn.org";
$headers = "From:" . $from;
mail($email,'Course Registration',$message,$headers);
header('Location:courses/viewcourse.php?cid='.$cid);
}
?>