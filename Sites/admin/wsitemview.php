<? 
include  "../checksession.php"; 
$id=$_GET['id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();

$strSQL = "SELECT A.*,B.item_id,C.ws_id,D.section_id,D.section_detail,B.item_detail FROM ws_item A LEFT JOIN item B ON(A.item_id=B.item_id) ";
$strSQL.="LEFT JOIN ws C ON(A.ws_id=C.ws_id) ";
$strSQL.="LEFT JOIN section D ON(C.section_id=D.section_id) ";
$strSQL.="WHERE  A.wsitem_id ='$id' ";
$cmdQuery=mysql_query($strSQL);
$fetchArray=mysql_fetch_array($cmdQuery);

$item_id=$fetchArray['item_id'];
$section=$fetchArray['section_id'];
$ws=$fetchArray['ws_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title>View Detail</title>
</head>

<body topmargin="0" marginheight="0">
  <table width="900" border="1" bordercolor="#5E96E9" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="999"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20" height="45" align="center" background="images/bar_2.jpg">&nbsp;</td>
          <td colspan="6" background="images/bar_2.jpg" class="white"><img src="images/tools.png" width="24" height="24" border="0" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">wsitem_id :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['wsitem_id']?></td>
          <td align="right" class="blue">รหัสทรัพย์สิน :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['it_Asset']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">รหัสคอมพิวเตอร์ :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['com_id']?></td>
          <td align="right" class="blue">Serial No :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['serial']?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">ชื่ออุปกรณ :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['item_detail']?></td>
          <td align="right" class="blue">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">ยี่ห้อ :</td>
          <td>&nbsp;</td>
          <td><?=$fetchArray['brand']?></td>
          <td align="right" class="blue">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="205" align="right" class="blue">รุ่น :</td>
          <td width="14">&nbsp;</td>
          <td width="204"><?=$fetchArray['model']?></td>
          <td align="right" class="blue">&nbsp;</td>
          <td width="13">&nbsp;</td>
          <td width="287">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" valign="top" class="blue">รายละเอียด :</td>
          <td>&nbsp;</td>
          <td colspan="4" valign="top"><label for="emp_remark"></label>
          <textarea name="comment" id="comment" cols="35" rows="5"><?=$fetchArray['comment'] ?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right" class="blue">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td colspan="4" align="left"><img src="images/btn_back.png" alt="" width="105" height="40" border="0" onclick="history.back();" /><a href="wsitem_edit.php?id=<?=$fetchArray['wsitem_id']?>"><img src="images/btn_back1.png" alt="" width="105" height="40" border="0" /></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="6">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</body>
</html>
