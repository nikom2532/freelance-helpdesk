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
$section_id=$_POST['id'];
$section_detail=$_POST['section_detail'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "UPDATE section SET section_detail='$section_detail',isused='$isused',";
$strSQL.="update_by='$sess_empid',update_date='$date' ";
$strSQL.="WHERE section_id='$section_id' " ;
$cmdQuery = mysql_query($strSQL);

	if($cmdQuery){
		echo "<script>";
		echo "alert('แก้ไขข้อมูลเรียบร้อยแล้วครับ '); ";
		echo "location.href='section_list.php'; ";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('ไม่สามารถแก้ไขข้อมูลได้ครับ'); ";
		echo "location.href='section_edit.php?id=$section_id'; ";
		echo "</script>";
	}

CloseDB();
?>
</body>
</html>
