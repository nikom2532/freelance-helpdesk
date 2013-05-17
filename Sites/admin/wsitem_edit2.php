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
$wsitem_id=$_POST['id'];
$wsitem_detail=$_POST['wsitem_detail'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$serial=$_POST['serial'];
$shop=$_POST['shop'];
$shop_date=$_POST['shop_date'];
$it_asset=$_POST['acc_id'];
//$section=$_POST['section'];
$ws=$_POST['ws'];
$isused=$_POST['isused'];
$date=date('Y-m-d H:i:s');
//echo  "wsitem_id".$wsitem_id;
//echo  "wsitem_detail".$wsitem_detail;
//echo "brand".$brand;
//echo "model".$model;
//echo "shop".$shop;
//echo "it_asset".$it_asset;
//echo "ws".$ws;
//echo "date".$date;
//echo "isused".$isused;

include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "UPDATE ws_item SET wsitem_id ='$wsitem_id', wsitem_detail='$wsitem_detail',brand='$brand',model='$model',serial='$serial',";
$strSQL.="it_asset='$it_asset',name = '$shop',";
$strSQL.="com_id = '$ws',isused='$isused',update_by='$sess_empid',update_date='$date' ";
$strSQL.="WHERE wsitem_id='$wsitem_id' " ;
$cmdQuery = mysql_query($strSQL);

	if($cmdQuery){
		echo "<script>";
		echo "alert('แก้ไขข้อมูลเรียบร้อยแล้วครับ'); ";
		echo "location.href='wsitem_list.php'; ";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('ไม่สามารถแก้ไขข้อมูลได้ครับ'); ";
		echo "location.href='wsitem_edit.php?id=$wsitem_id'; ";
		echo "</script>";
	}

CloseDB();
?>
</body>
</html>
