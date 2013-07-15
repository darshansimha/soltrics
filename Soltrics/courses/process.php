<?php

session_start();
/*
if(!isset($_SESSION['email']))
{
	header("Location:index.php");
	}
*/
include('dbconn.php');

$quizname=$_POST['quizname'];
$quizname=str_replace(' ', '_', $quizname);
$query="insert into quiz_detail(qname) values('$quizname')";
mysql_query($query) or die("failed to add quiz details");

$table_name=$quizname;
$q="CREATE TABLE IF NOT EXISTS `q_$table_name` (
  `type` int(11) NOT NULL,
  `question` mediumtext NOT NULL,
  `o1` varchar(255) NOT NULL,
  `o2` varchar(255) NOT NULL,
  `o3` varchar(255) NOT NULL,
  `o4` varchar(255) NOT NULL,
  `ans` varchar(255)
)";

mysql_query($q) or die("failed to create quiz table");

//print_r($_POST);
for($i=1;$i<21;$i++)
{
	if(isset($_POST["questionmul_$i"]))
	{
		//echo"hii0<br/>";
		$a=array();
		$a_0=0;
		$a_1=$_POST["questionmul_$i"];
		$a_2=$_POST["optionmul1_$i"];
		$a_3=$_POST["optionmul2_$i"];
		$a_4=$_POST["optionmul3_$i"];
		$a_5=$_POST["optionmul4_$i"];
		$a_6=$_POST["ansmul_$i"];
		
		//echo "$a_0<br/>$a_1<br/>$a_2<br/>$a_3<br/>$a_4<br/>$a_5<br/>$a_6<br/>";
		
		
		$query="INSERT INTO `q_$table_name`(`type`, `question`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES ('$a_0','$a_1','$a_2','$a_3','$a_4','$a_5','$a_6')";
		mysql_query($query) or die("failed to add multi question details");
	}
}

for($i=1;$i<21;$i++)
{
	if(isset($_POST["questionans_$i"]))
	{
		//echo"hii1<br/>";
		$a=array();
		$a_0=1;
		$a_1=$_POST["questionans_$i"];
		$a_2=$_POST["optionans1_$i"];
		$a_3=$_POST["optionans2_$i"];
		$a_4=$_POST["optionans3_$i"];
		$a_5=$_POST["optionans4_$i"];
		$a_6="";
		if(isset($_POST["checka_$i"]))
		{$a_6.=$_POST["checka_$i"];}
		if(isset($_POST["checkb_$i"]))
		{$a_6.=$_POST["checkb_$i"];}
		if(isset($_POST["checkc_$i"]))
		{$a_6.=$_POST["checkc_$i"];}
		if(isset($_POST["checkd_$i"]))
		{$a_6.=$_POST["checkd_$i"];}
		
		//echo "$a_0<br/>$a_1<br/>$a_2<br/>$a_3<br/>$a_4<br/>$a_5<br/>$a_6<br/>";
		
		$query="INSERT INTO `q_$table_name`(`type`, `question`, `o1`, `o2`, `o3`, `o4`, `ans`) VALUES ('$a_0','$a_1','$a_2','$a_3','$a_4','$a_5','$a_6')";
		mysql_query($query) or die("failed to add multians question details");
	}
}


for($i=1;$i<21;$i++)
{
	if(isset($_POST["questiondis_$i"]))
	{
		//echo"hii2<br/>";
		$a=array();
		$a_0=2;
		$a_1=$_POST["questiondis_$i"];
		
		//echo "$a_0<br/>$a_1";
		
		$query="INSERT INTO `q_$table_name`(`type`, `question`) VALUES ('$a_0','$a_1')";
		mysql_query($query) or die("failed to add dis question details");
	}
}

for($i=1;$i<21;$i++)
{
	if(isset($_POST["questiontrue_$i"]))
	{
		//echo"hii3<br/>";
		$a=array();
		$a_0=3;
		$a_1=$_POST["questiontrue_$i"];
		$a_2=$_POST["anstrue_$i"];
	
		//echo "$a_0<br/>$a_1<br/>$a_2<br/>";
						
		$query="INSERT INTO `q_$table_name`(`type`, `question`, `ans`) VALUES ('$a_0','$a_1','$a_2')";
		mysql_query($query) or die("failed to add true question details");
	}
}

?>
