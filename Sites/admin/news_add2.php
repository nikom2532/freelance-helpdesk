<?
include "../checksession.php";

$news_topic=$_POST['news_topic'];
$news_detail=$_POST['news_detail'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');

include "../inc/FunctionDB.php";
Conn2DB();

	$strSQL = "INSERT INTO news(news_id,news_detail,isused,create_by,create_date) ";
	$strSQL.="VALUES ('','$news_detail','$isused','$sess_empid','$date')" ;
	$Result = mysql_query($strSQL);

	if($Result){
		echo "<script>";
	   echo "alert('�ѹ�֡���������º�������Ǥ�� '); ";
		echo "location.href='news_list.php'; ";
		echo "</script>";
	}else{
   		echo "<script>";
		echo "alert('�������ö�ѹ�֡����������'); ";
		echo "location.href='news_add.php'; ";
		echo "</script>";   
	}


?>
