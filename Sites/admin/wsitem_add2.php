<?
include "../checksession.php";

$wsitem_id=$_POST['wsitem_id'];
$wsitem_detail=$_POST['wsitem_detail'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$serial=$_POST['serial'];
$shop=$_POST['name'];
$acc_id=$_POST['it_asset'];
$comment=$_POST['comment'];
$section_id=$_POST['section'];
#$isused=$_POST['isused'];
$ws_id=$_POST['ws'];
$isused='T';
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT * FROM ws_item WHERE wsitem_id='$wsitem_id' ";
$Result = mysql_query($strSQL);
$Nums = mysql_num_rows($Result); 

		if( $Nums>=1 ){
					echo "<script>";
					echo "alert('Computer ID duplicated'); ";
					echo "location.href='wsitem_list.php'; ";
					echo "</script>";
		}else{

	$strSQL = "INSERT INTO ws_item(wsitem_id,wsitem_detail,brand,model,serial,it_asset,com_id,name,isused,create_by,create_date) ";
	$strSQL.="VALUES ('$wsitem_id','$wsitem_detail','$brand','$model','$serial','$acc_id','$ws_id','$shop','$isused','{$_SESSION["sess_empid"]}','$date')" ;
	$Result1 = mysql_query($strSQL);
/*
	$strSQL2="
					UPDATE `computer`
						SET 
							`wsitem_id` = '{$wsitem_id}'
						WHERE `com_id` = '{$ws_id}'
					;";
	$Result2 = mysql_query($strSQL2);
*/หห
	if($Result1){
		echo "<script>";
	   	echo "alert('บันทึกข้อมูลเรียบร้อยแล้วครับ'); ";
		echo "location.href='wsitem_list.php?'; ";
		echo "</script>";
	}else{
   		echo "<script>";
		echo "alert('ไม่สามารถบันทึกข้อมูลได้'); ";
		echo "location.href='wsitem_list.php'; ";
		echo "</script>";   
		#echo mysql_error();
	}
}

?>
