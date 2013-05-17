<?
include "../checksession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<title></title>
</head>

<body>
<?
$emp_id=$_POST['id'];
$ename=$_POST['ename'];
$esurname=$_POST['esurname'];
$position=$_POST['position'];
$level=$_POST['level'];
$isworking=$_POST['isworking'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "UPDATE employee SET ename='$ename',esurname='$esurname',position='$position',level='$level',";
$strSQL.= "isworking='$isworking',update_by='$sess_empid',update_date='$date' ";
$strSQL.= "WHERE emp_id='$emp_id' " ;
$cmdQuery = mysql_query($strSQL);

	if($cmdQuery){
		echo "<script>";
		echo "alert('แก้ไขข้อมูลเรียบร้อยแล้วครับ '); ";
		echo "location.href='member_list.php'; ";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('ไม่สามารถแก้ไขข้อมูลได้ครับ'); ";
		echo "location.href='member_edit.php?id=$emp_id'; ";
		echo "</script>";
	}

CloseDB();
?>
</body>
</html>
