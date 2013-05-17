<?php
 ob_start();
$user_login=$_POST['user_login']; 
$pass_login=$_POST['pass_login'];

$pass_login=md5($pass_login.'user');

include "inc/FunctionDB.php";
Conn2DB();

	//Check ค่าจากการ Login
	$strSQL="SELECT * FROM employee WHERE emp_id='$user_login' AND epassword='$pass_login' AND isworking='T' ";
	$result=mysql_query($strSQL);
	$num=mysql_num_rows($result);

		if($num<=0) {
				echo "<script>";
				echo "alert('คุณใส่ Username และ Password ไม่ถูกต้องค่ะ ');";
				echo "location.href='index.php';";
				echo "</script>";				
		}else{
				$fetchArray=mysql_fetch_array($result);
	 			$emp_id=$fetchArray['emp_id'];
				$ename=$fetchArray['ename'];
	 			$esurname=$fetchArray['esurname'];
	 			$level=$fetchArray['level']; 
			
				session_start();
				$_SESSION[sess_id]=session_id();
				$_SESSION[sess_empid]=$emp_id;
				$_SESSION[sess_ename]=$ename;
				$_SESSION[sess_esurname]=$esurname;
				$_SESSION[sess_level]=$level;
				header("Location: user_main.php");
		}
?>
