<?
include "../checksession.php";

$detail=$_POST['detail'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

	$strSQL = "INSERT INTO problemtype(problemtype_id,detail,isused,create_by,create_date) ";
	$strSQL.="VALUES ('','$detail','$isused','$sess_empid','$date')" ;
	$Result = mysql_query($strSQL);

	if($Result){
		echo "<script>";
	   echo "alert('�ѹ�֡���������º�������Ǥ�� '); ";
		echo "location.href='problemtype_list.php'; ";
		echo "</script>";
	}else{
  		echo "<script>";
		echo "alert('�������ö�ѹ�֡����������'); ";
		echo "location.href='problemtype_add.php'; ";
		echo "</script>";  
		#echo mysql_error();
	}

?>
