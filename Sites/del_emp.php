<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php 
	ob_start();
	include ("checksession.php");
	include ("inc/FunctionDB.php");
	Conn2DB();
	
	$emp_id = $_GET['emp_id'];
	$caseID = $_GET["cid"];
	$ass_id = $_GET["ass_id"];

	$sql3 = "
		DELETE FROM assign_details
		WHERE emp_id = '$emp_id' AND ass_id = '$ass_id'";
	mysql_query($sql3);
	
	/*$sql4 = "
		UPDATE assign_details
		SET del_status = '0'
		WHERE emp_id = '$emp_id' AND ass_id = '$ass_id'";
	mysql_query($sql4);*/
	
	header("Location: queue_2detail.php?cid={$caseID}&ass_id={$ass_id}");
	ob_end_flush();
	
?>
</body>
</html>