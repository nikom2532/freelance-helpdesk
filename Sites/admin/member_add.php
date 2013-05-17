<? 
include  "../checksession.php"; 
include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
function checkFields() {
missinginfo = "";
if (document.member.emp_id.value == "") {
				alert("กรุณาใส่  'รหัสพนักงาน' ด้วยครับ");
				document.member.emp_id.focus();
				return false;
}else if (document.member.ename.value ==""){
				alert("กรุณาใส่ 'ชื่อ' ด้วยครับ");
				document.member.ename.focus();
				return false;
}else if (document.member.esurname.value ==""){
				alert("กรุณาใส่ 'นามสกุล' ด้วยครับ");
				document.member.esurname.focus();
				return false;
}else if (document.member.epassword.value ==""){
				alert("กรุณาใส่ 'รหัสผ่าน' ด้วยครับ");
				document.member.epassword.focus();
				return false;
}else if (document.member.re_epassword.value ==""){
				alert("กรุณา 'ยืนยันรหัสผ่าน' ด้วยครับ");
				document.member.re_epassword.focus();
				return false;  
}else if (document.member.position.value ==""){
				alert("กรุณาใส่ 'ตำแหน่ง' ด้วยครับ");
				document.member.position.focus();
				return false;
}else if (document.member.level.value ==""){
				alert("กรุณาเลือก 'ระดับ' ด้วยครับ");
				document.member.level.focus();
				return false;          
				}
}
</script>
</head>

<body topmargin="0" marginwidth="0" marginheight="0">
<!------------------------------------------------------------------------------------------------------------------------------------------->
<table width="1000" border="0" align="center" cellspacing="0">
<tr>
      <td width="1009" bgcolor="#FFFFFF"></td>
  </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellspacing="0">
        <tr>
          <td width="998" class="green"><? include ('menu_backend.php');?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><table width="501" border="1" cellspacing="0" bordercolor="#DDECFE">
            <tr>
              <td width="499"><table width="400" border="0" cellspacing="0">
                  <tr>
                    <td width="870" align="center" valign="top"><form action="member_add2.php" method="post" name="member" id="member" onsubmit="return checkFields();">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/add_page.png" width="32" height="32" align="absmiddle" /> เพิ่มผู้ใช้งานระบบ :</td>
                          </tr>
                          <tr>
                            <td width="24" height="18">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td width="310" align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รหัสพนักงาน :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="emp_id" id="emp_id" />
                              <span class="red">*</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td width="161" align="right" valign="top" class="Gray3">ชื่อ :</td>
                            <td width="2" class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="ename" id="ename" />
                              <span class="red">*</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">นามสกุล :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="text" name="esurname" id="esurname" />
                                <span class="red">*</span></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รหัสผ่าน :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="password" name="epassword" id="epassword" />
                                <span class="red">*</span></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ยืนยันรหัสผ่าน :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="password" name="re_epassword" id="re_epassword" />
                                <span class="red"> *</span></td>
                          </tr>

                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ตำแหน่ง/แผนก :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="text" name="position" id="position" />
                              <span class="red">*</span></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ระดับ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="level" id="level">
                                <option value="">--- กรุณาเลือกตำแหน่ง ---</option>
                                <option value="1">ผู้ใช้งานทั่วไป</option>
                                <option value="2">ผู้ซ่อม</option>
                                <option value="3">Administrator</option>
                               
                                </select>
                              <span class="red"> * </span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">สถานะการใช้งาน :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="isworking" id="isworking">
                                <option value="T" selected="selected">ใช้งาน</option>
                                <option value="F" >ไม่ใช้งาน</option>
                              </select>
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td align="left" >
                            <input name="Submit" type="image" value="Submit" src="images/btn_submit2.png" />
                            <a href="member_list.php"><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a>
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                    </form></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label></label></td>
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
<!------------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>
