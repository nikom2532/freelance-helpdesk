<?
include "../checksession.php";

//$ws_id=$_POST['ws_id'];
//$ws_detail=$_POST['ws_detail'];
//$section_id=$_POST['section_id'];
//$note=$_POST['note'];
//$holder=$_POST['holder'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');
$com_id=$_POST['com_id'];
$com_detail=$_POST['com_detail'];

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT * FROM computer WHERE com_id='$com_id' ";
$Result = mysql_query($strSQL);
$Nums = mysql_num_rows($Result); 

		if( $Nums>=1 ){
					echo "<script>";
					echo "alert('���ʹ��  �١��ҹ���Ǥ��'); ";
					echo "location.href='com_add.php'; ";
					echo "</script>";
		}else{

	$strSQL = "INSERT INTO computer(com_id,com_detail,isused,create_by,create_date) ";
	$strSQL.="VALUES ('$com_id','$com_detail','$isused','$sess_empid','$date')" ;
	$Result = mysql_query($strSQL);

	if($Result){
		echo "<script>";
	   echo "alert('�ѹ�֡���������º�������Ǥ�� '); ";
		echo "location.href='com_list.php'; ";
		echo "</script>";
	}else{
  		echo "<script>";
		echo "alert('�������ö�ѹ�֡����������'); ";
		echo "location.href='com_add.php'; ";
		echo "</script>";  
		#echo mysql_error();
	}
}

?>
