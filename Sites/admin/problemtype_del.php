<?
include "../checksession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title></title>
</head>

<body>
<?
$id = $_GET['id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ��Ǩ�ͺ�Է��������˹�ҨѴ����к�
Conn2DB();

$strSQL = "UPDATE problemtype SET isused='X' WHERE problemtype_id='$id' ";
$Query = mysql_query($strSQL);

		echo "<script>";
		echo "alert('ź�������ѭ�ҹ��  ���º�������Ǥ�Ѻ'); ";
		echo "location.href='problemtype_list.php'; ";
		echo "</script>";	

CloseDB();		
?>
</body>
</html>