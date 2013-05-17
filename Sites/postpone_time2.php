<?php
//2detail
ob_start();
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

$caseID = $_GET["cid"];
$update_date = $_GET["postPoneDate"];
$time = time();
$datetime = date("Y-m-d H:i:s");
//echo "caseID ".$caseID;
//echo "date ".$update_date;

$sql1="UPDATE cases SET update_date = '$update_date' WHERE case_ID = '$caseID' ";
$result = mysql_query($sql1);
if($result ){
	echo "<script>";
   	echo "alert('เลื่อนการแจ้งเตือนเรียบร้อย'); ";
	echo "location.href='user_main.php'; ";
	echo "</script>";
}else{
	echo "<script>";
   	echo "alert('ไม่สามารถเลื่อนการแจ้งเตือนได้ '); ";
	echo "location.href='user_main.php'; ";
	echo "</script>";
	}
//header("Location: ./user_main.php");
ob_end_flush();
?>