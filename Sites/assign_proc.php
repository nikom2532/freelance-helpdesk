<?php
//2detail
ob_start();
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

$caseID = $_POST["cid"];
$ass_id = $_GET["ass_id"];
$emp_id = $_POST["it_id"];

$time = time();
$datetime = date("Y-m-d H:i:s");

$sql2="
	INSERT INTO `assign_details`
	(`ass_id`, `emp_id`, `status`, `del_status` )
	VALUE
	('{$ass_id}', '{$emp_id}', '1','1') 
;";
mysql_query($sql2);

$sql3 = "
	UPDATE cases
	SET work_by = '$emp_id' WHERE case_ID = '$caseID'";
mysql_query($sql3);

header("Location: ./queue_2detail.php?cid={$caseID}&ass_id={$ass_id}");
ob_end_flush();
?>