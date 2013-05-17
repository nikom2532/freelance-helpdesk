<?
include ("checksession.php");
$id=$_GET['id'];
$case_id=$_GET['case_id'];
$date=date('Y-m-d H:i:s');

include ("inc/FunctionDB.php");
Conn2DB();

switch($id){
		case 1 :
				//     รับค่ามาจากหน้า 	Queue.php
				// 		Working : Update on Case
				$strSQL="UPDATE assign SET isused='1',emp_id='$sess_empid',create_by='$sess_empid',create_date='$date' WHERE case_id=$case_id ";
				$cmdQuery=mysql_query($strSQL);
				
				// Upadate Activity
				$strSQL2="INSERT INTO assign(ass_id,accepted,emp_id,case_id,create_by,create_date) ";
				$strSQL2.="VALUES('','$case_id','','Working on Case','$sess_empid','$date')";
				$cmdQuery2=mysql_query($strSQL2);
				
				if($cmdQuery){
						echo "<script>";
						echo "location.href='queue.php'; ";
						echo "</script>";
				}
				break;
		case 2 :
				//     รับค่ามาจากหน้า 	Cases_edit.php
				// 		Working : Update on Case
				$strSQL="UPDATE cases SET isused='1',it_id='$sess_empid',work_by='$sess_empid',work_date='$date' WHERE case_id=$case_id ";
				$cmdQuery=mysql_query($strSQL);
				
				// Upadate Activity
				$strSQL2="INSERT INTO assign(ass_id,accepted,emp_id,case_id,create_by,create_date) ";
				$strSQL2.="VALUES('','$case_id','1','Working on Case','$sess_empid','$date')";
				$cmdQuery2=mysql_query($strSQL2);
				
				if($cmdQuery){
						echo "<script>";
						echo "location.href='cases_edit.php?id=$case_id'; ";
						echo "</script>";
				}
				break;
		case 5 :
				// 		Accept : Update on Case
				$strSQL="UPDATE cases SET status='$id',accept_date='$date',update_by='$sess_empid',update_date='$date' WHERE case_id=$case_id ";
				$cmdQuery=mysql_query($strSQL);
				// Upadate Activity
				$strSQL2="INSERT INTO assign(ass_id,accepted,emp_id,case_id,create_by,create_date) ";
				$strSQL2.="VALUES('','$case_id','5','User Accept','$sess_empid','$date')";
				$cmdQuery2=mysql_query($strSQL2);
				
				if($cmdQuery){
						echo "<script>";
						echo "location.href='cases_edit.php?id=$case_id'; ";
						echo "</script>";
				}
				break;
		case 6 :
				// 		Close : Update on Case
				$strSQL="UPDATE cases SET isused='$id',close_by='$sess_empid',close_date='$date' WHERE case_id=$case_id ";
				$cmdQuery=mysql_query($strSQL);
				// Upadate Activity
				$strSQL2="INSERT INTO assign(ass_id,accepted,emp_id,case_id,create_by,create_date) ";
				$strSQL2.="VALUES('','$case_id','6','Close','$sess_empid','$date')";
				$cmdQuery2=mysql_query($strSQL2);
				
				if($cmdQuery){
						echo "<script>";
						echo "location.href='cases_edit.php?id=$case_id'; ";
						echo "</script>";
				}
				break;
		case 7 :
				//     รับค่ามาจากหน้า 	Cases_edit.php
				// 	 Reject : Update on Case
				$strSQL="UPDATE cases SET isused='1',update_by='$sess_empid',update_date='$date' WHERE case_id=$case_id ";
				$cmdQuery=mysql_query($strSQL);
				
				// Upadate Activity
				$strSQL2="INSERT INTO assign(ass_id,accepted,emp_id,case_id,create_by,create_date) ";
				$strSQL2.="VALUES('','$case_id','1','Reject from User','$sess_empid','$date')";
				$cmdQuery2=mysql_query($strSQL2);
				
				if($cmdQuery){
						echo "<script>";
						echo "location.href='cases_edit.php?id=$case_id'; ";
						echo "</script>";
				}
				break;
}
?>