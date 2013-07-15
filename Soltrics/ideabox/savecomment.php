<?php
include("db.php");
$mcomment=$_POST['mcomment'];
$mesgid=$_POST['mesgid'];
mysql_query("INSERT INTO comments (comments, msg_id_fk)
VALUES ('$mcomment','$mesgid')");
header("location: index.php");
?>