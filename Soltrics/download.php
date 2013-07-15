<?php
$filename = 'notes.txt';
$somecontent = $_REQUEST["notes"];
!$handle = fopen($filename, 'w+');
fwrite($handle, $somecontent);
fclose($handle);

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Length: ". filesize("$filename").";");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

readfile($filename);

?>