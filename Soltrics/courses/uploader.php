<?php
session_start();
$cid=49;
$upload	= 'files/'; 

$host="localhost";
$user="root";
$pass="";
$db="soltrics";
$dbcon=mysql_connect($host,$user,$pass) or die(mysql_error());
mysql_select_db($db) or die("Could not select database");

$query="select title from idp where cid='$cid'";
$res=mysql_query($query) or die("Query Failed");
$row=mysql_fetch_assoc($res);
$title=$row['title'];
/* if(!is_dir($title))
mkdir($upload.'/'.$title);
$weeks='1';
if(!is_dir($upload.'/'.$title.'/'.$weeks))
mkdir($upload.'/'.$title.'/'.$weeks); */

$UploadDirectory=$upload;

if (!@file_exists($UploadDirectory)) {
	die("Make sure Upload directory exist!");
}

if($_POST)
{	


	$FileName			= strtolower($_FILES['file']['name']); 
	$ImageExt			= substr($FileName, strrpos($FileName, '.')); 
	$FileType			= $_FILES['file']['type']; 
	$FileSize			= $_FILES['file']["size"];
	$RandNumber   		= rand(0, 9999999999);
	$uploaded_date		= date("Y-m-d H:i:s");
	
	switch(strtolower($FileType))
	{
		case 'application/pdf': 
			break;
		default:
			die('Unsupported File!'); 
	}

  
	
	$NewFileName = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), strtolower($FileTitle));
	$NewFileName = $NewFileName.'_'.$RandNumber.$ImageExt;
   
   if(move_uploaded_file($_FILES['files']["tmp_name"], $UploadDirectory . $NewFileName ))
   {
		$doclink=$UploadDirectory . $NewFileName;
		$video=$_POST['video'];
		
   }else{
   		die('error uploading File!');
   }
}

function upload_errors($err_code) {
	switch ($err_code) { 
        case UPLOAD_ERR_INI_SIZE: 
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini'; 
        case UPLOAD_ERR_FORM_SIZE: 
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'; 
        case UPLOAD_ERR_PARTIAL: 
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE: 
            return 'No file was uploaded'; 
        case UPLOAD_ERR_NO_TMP_DIR: 
            return 'Missing a temporary folder'; 
        case UPLOAD_ERR_CANT_WRITE: 
            return 'Failed to write file to disk'; 
        case UPLOAD_ERR_EXTENSION: 
            return 'File upload stopped by extension'; 
        default: 
            return 'Unknown upload error'; 
    } 
} 

$sql="insert into files values('$cid','$doclink','$video')";
mysql_query($sql) or die(mysql_error());
mysql_close($dbconn);

?>