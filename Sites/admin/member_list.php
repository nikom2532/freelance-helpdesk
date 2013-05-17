<?
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ

Conn2DB();
$pagelen = 30  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$keyword=$_GET['keyword'];
$page = $_GET['page'];
	if(empty($page)){ $page=1; }


if($keyword!=""){
		$strSQL = "SELECT * FROM employee WHERE emp_id LIKE '%$keyword%' ";
		$strSQL.="OR ename LIKE '%$keyword%' OR esurname LIKE '%$keyword%' OR position LIKE '%$keyword%' ";
		$strSQL.="AND isworking !='X' ";
}else{
		$strSQL = "SELECT * FROM employee WHERE  isworking !='X' ";
}
		$cmdQuery =  mysql_query($strSQL);
		$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY emp_id DESC  LIMIT $goto , $pagelen"; //echo $strSQL;
$cmdQuery1 = mysql_query($strSQL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/vtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jquery/vtip.js"></script>
<title>:: รายการผู้ใช้งานระบบ ::</title>
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
<table width="1000" border="0" align="center" cellspacing="0">
<tr>
      <td width="1009" bgcolor="#FFFFFF"></td>
  </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellspacing="0">
        <tr>
          <td colspan="2"><? include ('menu_backend.php');?></td>
        </tr>
        <tr>
          <td width="767" height="38" align="left"><table width="400" height="31" border="0" cellspacing="0">
            <tr>
              <td width="428" height="31" align="center"><form id="form1" name="form1" method="get" action="member_list.php">
                  <span class="Gray3">คำค้นหา :</span>
                  <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
                  <input type="submit" name="button" id="button" value="search" />
              </form></td>
            </tr>
          </table></td>
          <td width="231" align="left" valign="bottom"><span class="green"><img src="images/add_page.png" width="32" height="32" align="bottom" /> <a href="member_add.php" ><span class="link_none">เพิ่มพนักงาน</span></a></span></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="2" align="center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="49" height="37" align="center" background="images/bar3_1.png" class="white">ลำดับ</td>
              <td width="173" background="images/bar3_1.png" class="white"><p align="center" class="white">ชื่อ - นามสกุล</p></td>
              <td width="75" align="center" background="images/bar3_1.png" class="white">ชื่อผู้ใช้</td>
              <td width="244" align="center" background="images/bar3_1.png" class="white">ตำแหน่ง</td>
              <td width="128" align="center" background="images/bar3_1.png" class="white">ระดับ</td>
              <td width="70" align="center" background="images/bar3_1.png" class="white">สถานะ</td>
              <td width="43" align="center" background="images/bar3_1.png" class="white">แก้ไข</td>
              <td width="47" align="center" background="images/bar3_1.png" class="white">ลบ</td>
              <td width="51" align="center" background="images/bar3_1.png" class="white">Reset</td>
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
              <td align="left"><?=$fetchArray['ename']."&nbsp;&nbsp;&nbsp;".$fetchArray['esurname']?></td>
              <td align="center" bgcolor="<? echo $bg ;?>"><?=$fetchArray['emp_id']?></td>
              <td align="left" ><?=$fetchArray['position']?></td>
              <td align="left"><? 
		$level=Level($fetchArray['level']);
		echo $level;
		?></td>
              <td align="center">
	<?
      if($fetchArray['isworking']==T){
	  			echo "<img src='images/icon_orange.png' border='0' title='ใช้งาน'  class='vtip' />";
	  }else{
	  			echo "<img src='images/icon_gray.png' border='0' title='ไม่ใช้งาน'  class='vtip' />";
	  }
	  ?></td>
              <td align="center"><a href="member_edit.php?id=<?=$fetchArray['emp_id']?>" title="แก้ไข" class="vtip" ><img src="images/tools.png" width="24" height="24" border="0" /></a></td>
              <td align="center" class="link"><a href="member_del.php?id=<?=$fetchArray['emp_id']?>" title="ลบ"  class="vtip" onclick="return confirm('คุณต้องการลบรายการนี้ ใช่หรือไม่ ?')"><img src="images/trash_can.png" width="24" height="24" class="link_none" border="0"  /></a></td>
              <td align="center" class="link"><a href="member_reset.php?id=<?=$fetchArray['emp_id']?>" title="Reset Password" class="vtip" onclick="return confirm('คุณต้องการ Reset Password นี้ ใช่หรือไม่ ?')"><img src="images/icon_cancel.png" width="24" height="24" border="0"  /></a></td>
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
          <td height="48" colspan="2"><label></label></td>
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
