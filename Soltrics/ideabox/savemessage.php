<?php
include("db.php");
$msgcon=$_POST['message'];
mysql_query("INSERT INTO messages (message)
VALUES ('$msgcon')");
header("location: index.php");
?>