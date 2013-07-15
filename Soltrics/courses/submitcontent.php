<?php
session_start();
$cid=$_SESSION['cid'];
$title=$_POST['title'];
$week=$_POST['week'];
$video=$_POST['video'];
include('dbconn.php');

    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
		 if(is_dir("uploads/".$file_name)==false){
                move_uploaded_file($file_tmp,"uploads/".$file_name);
				$doc="uploads/".$file_name;
            }
		else{									// rename the file if another one exist
               $new_dir="uploads/".$file_name.time();
               rename($file_tmp,$new_dir);
			}
		$query="insert into files(cid,title,week,doc,video) values('$cid','$title','$week','$doc','$video')";
		mysql_query($query) or die('query failed');
		
	}

/*
if(isset($_FILES['assignments'])){
    $errors= array();
	foreach($_FILES['assignments']['tmp_name'] as $key => $tmp_name ){
		$a_name = $key.$_FILES['assignments']['name'][$key];
		$file_size =$_FILES['assignments']['size'][$key];
		$file_tmp =$_FILES['assignments']['tmp_name'][$key];
		$file_type=$_FILES['assignments']['type'][$key];	
		 if(is_dir("$desired_dir/".$a_name)==false){
                move_uploaded_file($a_tmp,"uploads/".$a_name);
				$assignment="uploads/".$a_name;
            }
		else{									// rename the file if another one exist
               $new_dir="uploads/".$file_name.time();
               rename($file_tmp,$new_dir);
			}
		$sql="insert into files(cid,title,week,assignment) values('$cid','$title','$week','$assignment')";
		mysql_query($sql);
		
	}
}
*/
?>