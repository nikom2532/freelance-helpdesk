<?
include "../checksession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<title>:: index ::</title>
</head>

<body>
<?
$password=$_POST['password'];
$new_password=$_POST['new_password'];
$renew_password=$_POST['renew_password'];
$password=md5($password.'user');


include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT * FROM employee WHERE emp_id='$sess_empid' AND epassword='$password' ";
/* echo $strSQL."<p>";
exit(); */
$Result = mysql_query($strSQL);
$Nums = mysql_num_rows($Result);

if($Nums <= 0){
	echo "<script>";
	echo "alert('�س��͡ ���ʼ�ҹ������١��ͧ��Ѻ !!!'); ";
	echo "location.href='member_editpw.php'; ";
	echo "</script>";
}elseif($new_password<>$renew_password){
	echo "<script>";
	echo "alert('�س��͡���ʼ�ҹ ���ç�ѹ��Ѻ !!!'); ";
	echo "location.href='member_editpw.php'; ";
	echo "</script>";
}else{

	$new_password=md5($new_password.'user');

	$strSQL = "UPDATE employee SET epassword='$new_password' WHERE emp_id='$sess_empid' ";
	$Result = mysql_query($strSQL);

		if($Result){
				echo "<script>";
				echo "alert('�س������ʼ�ҹ ���º��ͺ���Ǥ�Ѻ'); ";
				echo " window.close();";
				echo "</script>";
		}else{
 				echo "<script>";
				echo "alert('�������ö��䢢�������   ��سҡ�Ѻ仵�Ǩ�ͺ�������ա���駤�Ѻ'); ";
				echo "location.href='member_editpw.php'; ";
				echo "</script>"; 
				echo mysql_error();
		}
}
CloseDB();

?>
</body>
</html>