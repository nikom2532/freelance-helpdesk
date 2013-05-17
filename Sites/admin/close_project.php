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
$case_ID = $_GET['id'];
$ass_id = $_GET['ass_id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();
$date=date('Y-m-d H:i:s');
$strSQL1 = "UPDATE cases SET issused='3', close_by='$sess_empid' , close_date = '$date'  WHERE case_ID='$case_ID' ";
echo $strSQL1;


$Query1 = mysql_query($strSQL1);

$strSQL2 = "UPDATE assign SET status='3'  WHERE case_id='$case_id' ";
$Query2 = mysql_query($strSQL2);
echo $strSQL2;

$strSQL3 = "UPDATE assign_details SET status='3'  WHERE ass_id='$ass_id' ";
$Query3 = mysql_query($strSQL3);
echo $strSQL3;
		echo "<script>";
		echo "alert('แจ้งปิดโปรเจคเรียบร้อยครับ'); ";
		echo "location.href='close.php'; ";
		echo "</script>";	

CloseDB();		
?>
</body>
</html>