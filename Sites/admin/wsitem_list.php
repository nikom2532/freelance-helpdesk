<?
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();

$pagelen = 40  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$keyword=$_GET['keyword'];
$isused=$_GET['isused'];
$page = $_GET['page'];
	if(empty($page)){ $page=1; }

if($keyword!=""){
		$strSQL = "SELECT * FROM ws_item WHERE wsitem_id LIKE '%$keyword%' ";
		$strSQL.="OR wsitem_detail LIKE '%$keyword%' OR brand LIKE '%$keyword%' OR model LIKE '%$keyword%' OR serial LIKE '%$keyword%' OR name LIKE '%$keyword%' OR it_asset LIKE '%$keyword%' OR com_id LIKE '%$keyword%'  ";
		$strSQL.="AND isused !='X' ";
}else{
		$strSQL = "SELECT * FROM ws_item WHERE  isused !='X' ";
}
#echo $strSQL."<p />";

$cmdQuery =  mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY wsitem_id  LIMIT $goto , $pagelen"; 
$cmdQuery1 = mysql_query($strSQL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/vtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jquery/vtip.js"></script>
<title>:: รายการอุปกรณ์ ::</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body topmargin="0" marginwidth="0" marginheight="0">
<table width="1122" border="0" align="center" cellspacing="0">
<tr>
      <td width="1120" bgcolor="#FFFFFF"></td>
  </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellspacing="0">
        <tr>
          <td colspan="2" class="green"><? include ('menu_backend.php');?></td>
        </tr>
        <tr>
          <td width="818" align="left" class="green"><table width="751" border="0" cellspacing="0">
            <tr>
              <td width="546" align="center"><form id="form1" name="form1" method="get" action="wsitem_list.php">
                  <label> <span class="Gray3">คำค้นหา :</span>
                  <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
                  </label>
                  <label class="Gray3">สถานะ </label>
                  <label for="isused"></label>
                  <select name="isused" id="isused">
                    <option value="" <? if($isused==''){ echo "selected='selected' ";}?>>ทั้งหมด</option>
                    <option value="T"  <? if($isused=='T'){ echo "selected='selected' ";}?>>ใช้งาน</option>
                    <option value="F" <? if($isused=='F'){ echo "selected='selected' ";}?>>ไม่ใช้งาน</option>
                  </select>
                  <label>
                     <input type="submit" name="button" id="button" value="search" />
                  </label>
              </form></td>
              <td width="201" align="center">&nbsp;</td>
            </tr>
          </table></td>
          <td width="180" align="left" class="green"><img src="images/add_page.png" width="32" height="32" align="bottom" /> <a href="wsitem_add.php" ><span class="link_none">เพิ่มอุปกรณ์</span></a></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="2"><table width="996" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="54" height="39" align="center" background="images/bar3_1.png" class="white">ลำดับ</td>
              <td width="107" align="center" background="images/bar3_1.png" class="white">รหัสอุปกรณ์</td>
              <td width="107" align="center" background="images/bar3_1.png" class="white">รหัสคอมพิวเตอร์</td>
              <td width="116" align="center" background="images/bar3_1.png" class="white">ชื่ออุปกรณ์</td>
              <td width="116" align="center" background="images/bar3_1.png" class="white">ยี่ห้อ</td>
              <td width="123" align="center" background="images/bar3_1.png" class="white">รุ่น</td>
              <td width="171" align="center" background="images/bar3_1.png" class="white">Serial No.</td>
              <td width="68" align="center" background="images/bar3_1.png" class="white">สถานะ</td>
              <td width="47" align="center" background="images/bar3_1.png" class="white">View</td>
              <td width="65" align="center" background="images/bar3_1.png" class="white">ลบ</td>
              </tr>
                    <?
	//$i=1;
	$i=$pagelen*($page-1)+1;
    while($fetchArray=mysql_fetch_array($cmdQuery1)){
		if($bg == "#FFFFFF") {  
						$bg = "#DDECFE";
				} else {
						$bg = "#FFFFFF";
				}
    ?>
            <tr bgcolor="<? echo $bg ;?>">
              <td align="center"><?=$i?></td>
              <td align="left"><?=$fetchArray['wsitem_id']?></td>
              <td align="left"><?=$fetchArray['com_id']?></td>
              <td align="left"><?=$fetchArray['name']?></td>
              <td align="left"><?=$fetchArray['brand']?></td>
              <td align="left"><?=$fetchArray['model']?></td>
              <td align="left"><?=$fetchArray['serial']?></td>
              <td align="center"><?
      if($fetchArray['isused']==T){
	  		echo "<img src='images/icon_orange.png' border='0' title='ใช้งาน' class='vtip' />";
	  }else{
	  		echo "<img src='images/icon_gray.png' border='0' title='ไม่ใช้งาน' class='vtip' />";
	  }
	  
	  ?></td>
              <td align="center"><a href="wsitem_edit.php?id=<?=$fetchArray['wsitem_id']?>" title="แก้ไข" class="vtip" ><img src="../images/search_24.png" width="24" height="24" border="0" longdesc="../images/search_24.png" /></a></td>
              <td align="center" class="link"><a href="wsitem_del.php?id=<?=$fetchArray['wsitem_id']?>" title="ลบ"  onclick="return confirm('คุณต้องการลบรายการนี้ ใช่หรือไม่ ?')" class="vtip"><img src="images/trash_can.png" width="24" height="24" class="link_none" border="0"  /></a></td>
              </tr>
      <? 
	$i++ ;
	}
	?>            
          </table>     </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left">
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
?>          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><label></label></td>
        </tr>
      </table></td>
  </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  </table>
</body>
</html>
