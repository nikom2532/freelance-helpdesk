<?
include  "../checksession.php"; 
include "../inc/FunctionDB.php";
Conn2DB();

$strSQL = "SELECT *,CONCAT(ename,' ',esurname) AS user_fullname FROM employee WHERE emp_id='$sess_empid' " ;
$Result = mysql_query($strSQL);
$record = mysql_fetch_array($Result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>:: แก้ไขข้อมูล ผู้ใช้งานระบบ ::</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function checkFields() {
missinginfo = "";
if (document.edit.password.value == "") {
				alert("กรุณาใส่  Password เดิม ด้วยครับ");
				document.edit.password.focus();
				return false;
}else if (document.edit.new_password.value ==""){
				alert("กรุณาใส่ Password ใหม่ ด้วยครับ");
				document.edit.new_password.focus();
				return false;
}else if (document.edit.renew_password.value ==""){
				alert("กรุณาใส่ Password ใหม่อีกครั้ง เพื่อยืนยันด้วยครับ");
				document.edit.renew_password.focus();
				return false;
				}
}
</script>
</head>

<body topmargin="0" marginwidth="0" marginheight="0">
<table width="400" border="0" cellspacing="0" bordercolor="#820082">
  <tr>
    <td>
    <form id="edit" name="edit" method="post" action="member_editpw2.php" onSubmit="return checkFields();">
    <table width="400" border="0" cellspacing="0">
      <tr>
        <td height="36" background="images/bar3_1.png">&nbsp;</td>
        <td colspan="3" background="images/bar3_1.png" class="Gray3"><strong class="Gray3"> <img src="images/tools.png" width="24" height="24" align="absmiddle" /></strong> <span class="white">แก้ไขรหัสผ่าน :</span></td>
        </tr>
      <tr>
        <td width="28">&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td width="214">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="145" align="right" class="Gray3">ชื่อ - นามสกุล :</td>
        <td width="5" class="Gray3">&nbsp;</td>
        <td><?=$record['user_fullname'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right" class="Gray3">ชื่อผู้ใช้ :</td>
        <td class="Gray3">&nbsp;</td>
        <td><?=$record['emp_id'];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right" class="Gray3">รหัสผ่านเดิม :</td>
        <td class="Gray3">&nbsp;</td>
        <td><input type="password" name="password" id="password" />
          <span class="red">*</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right" class="Gray3">รหัสผ่านใหม่ :</td>
        <td class="Gray3">&nbsp;</td>
        <td><input type="password" name="new_password" id="new_password" />
          <span class="red">          * </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right" class="Gray3">ยืนยันรหัสผ่านใหม่ :</td>
        <td class="Gray3">&nbsp;</td>
        <td><input type="password" name="renew_password" id="renew_password" />
          <span class="red">*</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td><label></label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td><label>
        <input name="Submit" type="submit" class="Gray3" id="button" style="width:80px" value="บันทึก" />
        </label></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
