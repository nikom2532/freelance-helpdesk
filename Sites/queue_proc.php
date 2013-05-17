<?php
//2detail
ob_start();
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

$caseID = $_GET["cid"];
$time = time();
$datetime = date("Y-m-d H:i:s");

$sql="
	SELECT `create_by`
	FROM  `cases`
	WHERE `case_ID` = '{$caseID}'
;";
$result = mysql_query($sql);
if($row = mysql_fetch_array( $result )){
	$sql2="
		INSERT INTO `assign`
		(`ass_id`, `accepted`, `emp_id`, `case_id`, `status`, `create_by`, `create_date`, `update_by`, `update_date`)
		VALUE
		('{$time}', '', '{$_SESSION["sess_empid"]}', '{$caseID}', 1, '{$row["create_by"]}', '{$datetime}','{$row["create_by"]}', '{$datetime}') 
	;";
	mysql_query($sql2);
	
	$sql3="
		INSERT INTO `assign_details`
		(`ass_id`,`emp_id`, `status`)
		VALUE
		('{$time}', '{$_SESSION["sess_empid"]}', 1) 
	;";
	mysql_query($sql3);
	
	$sql4="
	UPDATE `cases`
		SET 
			`issused` = '1',
			`work_by` = '{$_SESSION["sess_empid"]}',
			`work_date` = '{$datetime}',
			`update_by` = '{$_SESSION["sess_empid"]}',
			`update_date` = '{$datetime}'
		WHERE `case_ID` = '{$caseID}'
	;";
	mysql_query($sql4);
	
	header("Location: ./queue_2detail.php?cid={$caseID}&ass_id={$time}");
	ob_end_flush();
}
?>