<?
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("helpdesk");
$strSQL ="SELECT wsitem_id,wsitem_detail,brand,model,serial,it_asset,com_id,name,isused FROM ws_item A WHERE A.isused = 'T'  ORDER BY A.wsitem_id ";
$objQuery = mysql_query($strSQL);
if($objQuery)
{
	//echo "<script>alert('Save successfully!');</script>";
	echo "<script>window.top.window.showResult('1');</script>";
}
else
{
	//echo "<script>alert('Error! Cannot save data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}
mysql_close($objConnect);
?>