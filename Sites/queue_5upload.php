<?php 
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

ob_start();
$case_ID = $_POST["cid"];
$target = "queue_upload/"; 
$target = $target.basename( $_FILES['uploaded']['name']) ; 
$ok=1; 

$typepath = $_POST['filetype'];

//This is our size condition 
if ($uploaded_size > 350000) 
{ 
	echo "Your file is too large.<br>"; 
	$ok=0; 
} 

//This is our limit file type condition 
if ($uploaded_type =="text/php") 
{ 
	echo "No PHP files<br>"; 
	$ok=0; 
} 

//Here we check that $ok was not set to 0 by an error 
if ($ok==0) 
{ 
	Echo "Sorry your file was not uploaded"; 
} 

//If everything is ok we try to upload it 
else 
{ 
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
	{
		$sql2="
			UPDATE `cases` 
			SET `attachments` = '{$_FILES['uploaded']['name']}' 
			WHERE `case_ID` = '{$case_ID}'
		;";
		if(!mysql_query($sql2)){
			echo "problem to connect DB";
		}
		
		
		chmod($target, 0777);
		// echo "The File: \"". basename( $_FILES['uploaded']['name']). "\" has been uploaded";
		header("location: queue_4formupload.php?cid={$case_ID}"); 
	}
	else{ 
		echo "Sorry, there was a problem uploading your file."; 
	} 
} 
ob_end_flush();
?> 