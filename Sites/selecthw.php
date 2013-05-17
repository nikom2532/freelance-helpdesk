<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>:: Select Hardware ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script LANGUAGE="JavaScript">
function FillHWData(name,wsitem_id,model,serial,com_id) {

		window.opener.document.getElementById('name').value = name;
		window.opener.document.getElementById('ws_item').value = wsitem_id;
       	window.opener.document.getElementById('model').value = model;	
		window.opener.document.getElementById('serial').value = serial;
		window.opener.document.getElementById('com_id').value = com_id;
   		window.close();
		
}
</script>
</head>
<?
$keyword=$_GET['keyword'];

include "inc/FunctionDB.php";
Conn2DB();

$pagelen = 30  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$page = $_GET['page'];
	if(empty($page)){ $page=1; }

 if($keyword==''){
		$strSQL="SELECT wsitem_id,wsitem_detail,brand,model,serial,it_asset,com_id,name,isused FROM ws_item A WHERE A.isused = 'T'  ORDER BY com_id ";

}else{
		$strSQL="SELECT * FROM ws_item A , computer B ";
		$strSQL.="WHERE (A.wsitem_id LIKE '%$keyword%' OR A.brand LIKE '%$keyword%' OR A.model LIKE '%$keyword%' OR A.serial LIKE '%$keyword%' ORDER BY B.com_id";
} 

//echo $strSQL."<p>";
$cmdQuery=mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" LIMIT $goto , $pagelen"; 
$cmdQuery1 = mysql_query($strSQL);

?>

<body>
<table width="800" border="0">
  <tr>
    <td height="41" colspan="7" align="center"><table width="406" height="78" border="0" cellspacing="0">
      <tr>
        <td width="14" height="68" background="images/b_Left.png">&nbsp;</td>
        <td width="369" align="center" valign="middle"><form id="form1" name="form1" method="get" action="selecthw.php">
            <label><span class="Gray3"> คำค้นหา : </span>
            <input type="text" name="keyword" id="keyword" value="<?=$keyword ?>"/>
            </label>
            <label>
            <input type="submit" name="button" id="button" value="ค้นหา" />
            </label>
        </form></td>
        <td width="17">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="36" height="41" align="center" background="images/bar5_1.png" class="Gray3">ลำดับ</td>
    <td width="178" align="center" background="images/bar5_1.png" class="Gray3">รหัสคอมพิวเตอร์</td>
    <td width="158" align="center" background="images/bar5_1.png" class="Gray3">WS_ITEM</td>
    <td width="92" align="center" background="images/bar5_1.png" class="Gray3">ชื่ออุปกรณ์</td>
    <td width="124" align="center" background="images/bar5_1.png" class="Gray3">รุ่น</td>
    <td width="186" align="center" background="images/bar5_1.png" class="Gray3">S/N</td>
  </tr>
  <?
  //$i=1;
  $i=$pagelen*($page-1)+1;
  while($fetchArray=mysql_fetch_array($cmdQuery1)){
  	
		if($bg == "#FFFFFF") {  
						$bg = "#EFEFEF";
				} else {
						$bg = "#FFFFFF";
				}
  ?>
  <tr bgcolor="<? echo $bg ;?>">
    <td align="center"><a href="javascript:FillHWData('<?=$fetchArray['name']?>','<?=$fetchArray['wsitem_id']?>','<?=$fetchArray['model']?>','<?=$fetchArray['serial']?>','<?=$fetchArray['com_id']?>')">
      <?=$i?>
    </a></td>
    <td><?=$fetchArray['com_id']?></td>
   
    <td><?=$fetchArray['wsitem_id']?></td>
    <td><?=$fetchArray['name']?></td>
    <td align="left"><?=$fetchArray['model']?></td>
    <td align="left"><?=$fetchArray['serial']?></td>
		<!-- hidden field -->
		<input type="hidden" name="com_id" id="com_id" value="<?=$fetchArray['com_id']?>"  />
		<input type="hidden" name="name" id="name" value="<?=$fetchArray['name']?>"  />
		<input type="hidden" name="model" id="model" value="<?=$fetchArray['model']?>"  />
		<input type="hidden" name="serial" id="serial" value="<?=$fetchArray['serial']?>"  />
  </tr>
    <?
  $i++;
  }
  ?>
  <tr>
    <td colspan="7">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"></td>
  </tr>
  <tr>
    <td colspan="7">
     <?
if($totalpage!=0){		 
	echo "&nbsp;มีทั้งหมด $totalpage หน้า:&nbsp;";
	for ($i=1 ; $i<=$totalpage ; $i++){
				if($i == $page){
				echo "|<b><font size=+1 color=#3366FF>$i</font></b>";
				}else{
				echo "|<a href=$PHP_SELF?page=$i&keyword=$keyword>$i</a>";
				}
	}
}else{
		echo "<div class='red'>ไม่พบข้อมูลที่ท่านค้นหา  !! </div>" ;
}
?>       
    </td>
  </tr>
</table>
</body>
</html>