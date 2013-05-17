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
$emp_id=$_POST['emp_id'];
$ename=$_POST['ename'];
$esurname=$_POST['esurname'];
$epassword=$_POST['epassword'];
$re_epassword=$_POST['re_epassword'];
$position=$_POST['position'];
$level=$_POST['level'];
$isworking=$_POST['isworking'];
$date=date('Y-m-d H:i:s');

$error=0;

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT * FROM employee WHERE emp_id='$emp_id' ";
$Result = mysql_query($strSQL);
$Nums = mysql_num_rows($Result); 

		if( $Nums>=1 ){
					echo "<script>";
					echo "alert('รหัสพนักงานนี้  ถูกใช้งานแล้วค่ะ'); ";
					echo "location.href='member_add.php'; ";
					echo "</script>";
		}elseif( $epassword<>$re_epassword ){
					echo "<script>";
					echo "alert('คุณกรอกรหัสผ่าน ไม่ถูกต้องค่ะ'); ";
					echo "location.href='member_add.php'; ";
					echo "</script>";
		}else{

	$epassword = md5($epassword.'user'); // แปลงรหัสเป็น md5()

	$strSQL = "INSERT INTO employee(emp_id,epassword,ename,esurname,position,level,isworking,create_by,create_date) ";
	$strSQL.= "VALUES ('$emp_id','$epassword','$ename','$esurname','$position','$level','$isworking','$sess_empid','$date')";
	$Result = mysql_query($strSQL);

	if($Result){
		echo "<script>";
	   echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ '); ";
		echo "location.href='member_list.php'; ";
		echo "</script>";
	}else{
  		echo "<script>";
		echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะ'); ";
		echo "location.href='member_add.php'; ";
		echo "</script>";  
		#echo mysql_error();
	}
}

?>
</body>
</html>
