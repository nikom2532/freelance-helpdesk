<?
include "checksession.php";
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

include "inc/FunctionDB.php";

Conn2DB();
$date=date('Y-m-d H:i:s');

$strSQL2 = "UPDATE assign SET accepted ='0'  WHERE case_id='$case_id' AND ass_id= '$ass_id'  ";
$Query2 = mysql_query($strSQL2);

		echo "<script>";
		echo "alert('ดำเนินรายการเรียบร้อยครับ'); ";
		echo "location.href='user_main.php'; ";
		echo "</script>";	

CloseDB();		
?>
</body>
</html>