<?
include "../checksession.php";

$section_detail=$_POST['section_detail'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT * FROM section WHERE section_detail='$section_detail' ";
$Result = mysql_query($strSQL);
$Nums = mysql_num_rows($Result); 

		if( $Nums>=1 ){
					echo "<script>";
					echo "alert('ชื่อแผนกนี้  ถูกใช้งานแล้วค่ะ'); ";
					echo "location.href='section_add.php'; ";
					echo "</script>";
		}else{

	$strSQL = "INSERT INTO section(section_id,section_detail,isused,create_by,create_date) ";
	$strSQL.="VALUES ('','$section_detail','$isused','$sess_empid','$date')" ;
	$Result = mysql_query($strSQL);

	if($Result){
		echo "<script>";
	   echo "alert('บันทึกข้อมูลเรียบร้อยแล้วค่ะ '); ";
		echo "location.href='section_list.php'; ";
		echo "</script>";
	}else{
  		echo "<script>";
		echo "alert('ไม่สามารถบันทึกข้อมูลได้ค่ะ'); ";
		echo "location.href='section_add.php'; ";
		echo "</script>";  
		#echo mysql_error();
	}
}

?>
