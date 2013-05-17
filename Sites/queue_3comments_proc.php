<?php
//2detail
ob_start();
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

$caseID = $_POST["cid"];
//echo "   ";
$ass_id = $_POST["ass_id"];
$comment_detail = $_POST["comment_detail"];
$problemtype_id = $_POST["problemtype_id"];

$time = time();
$datetime = date("Y-m-d H:i:s");

$sql="
	INSERT INTO `comment`
	(`ass_id`, `comment_detail`, `emp_id`, `status` , `create_by`, `create_date`)
	VALUE
	('{$ass_id}', '{$comment_detail}', '{$_SESSION["sess_empid"]}', 1,'{$sess_empid}', '{$datetime}') 
;";
mysql_query($sql);

$sql2="UPDATE cases SET problemtype_id='$problemtype_id' WHERE case_ID='$caseID'";
mysql_query($sql2);

header("Location:./queue_2detail.php?cid={$caseID}&ass_id={$ass_id}");
ob_end_flush();
?>