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
$com_id=$_POST['id'];
$com_detail=$_POST['com_detail'];
//$wsitem_id=$_POST['wsitem_id'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "UPDATE computer SET com_id='$com_id',com_detail='$com_detail',wsitem_id='$wsitem_id',isused='$isused',";
$strSQL.="update_by='$sess_empid',update_date='$date' ";
$strSQL.="WHERE com_id='$com_id' " ;
$cmdQuery = mysql_query($strSQL);

	if($cmdQuery){
		echo "<script>";
		echo "alert('แก้ไขข้อมูลเรียบร้อยแล้วครับ'); ";
		echo "location.href='com_list.php'; ";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('ไม่สามารถแก้ไขข้อมูลได้ครับ'); ";
		echo "location.href='com_edit.php?id=$com_id'; ";
		echo "</script>";
	}

CloseDB();
?>
</body>
</html>
