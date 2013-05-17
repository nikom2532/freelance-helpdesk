<? 
include  "../checksession.php"; 
$id=$_GET['id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();

$strSQL="SELECT * FROM employee WHERE emp_id='$id' " ;
$cmdQuery=mysql_query($strSQL);
$fetchArray=mysql_fetch_array($cmdQuery);

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
if (document.member.ename.value ==""){
				alert("กรุณาใส่ 'ชื่อ' ด้วยครับ");
				document.member.ename.focus();
				return false;
}else if (document.member.esurname.value ==""){
				alert("กรุณาใส่ 'นามสกุล' ด้วยครับ");
				document.member.esurname.focus();
				return false; 
}else if (document.member.position.value ==""){
				alert("กรุณาใส่ 'ตำแหน่ง'' ด้วยครับ");
				document.member.position.focus();
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
                    <td width="870" align="center" valign="top"><form action="member_edit2.php" method="post" name="member" id="member" onsubmit="return checkFields();">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/tools.png" width="24" height="24" align="absmiddle" />แก้ไขผู้ใช้งานระบบ :</td>
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
                            <td align="left"><label><span class="blue">
                              <?=$fetchArray['emp_id']?>
                            </span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td width="161" align="right" valign="top" class="Gray3">ชื่อ :</td>
                            <td width="2" class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="ename" id="ename" value="<?=$fetchArray['ename']?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">นามสกุล :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="text" name="esurname" id="esurname" value="<?=$fetchArray['esurname']?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ตำแหน่ง/แผนก :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="text" name="position" id="position" value="<?=$fetchArray['position']?>" /></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ระดับ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="level" id="level">
                                <option value="1" <? if($fetchArray['level']=='1'){ echo "selected='selected' "; } ?>>ผู้ใช้งานทั่วไป</option>
                                <option value="2" <? if($fetchArray['level']=='2'){ echo "selected='selected' "; } ?>>ผู้ซ่อม</option>
                                <option value="3" <? if($fetchArray['level']=='3'){ echo "selected='selected' "; } ?>>Administrator</option>
                                
                                </select>
                              </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">สถานะการใช้งาน :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="isworking" id="isworking">
                                <option value="T" <? if($fetchArray['isworking']=='T'){ echo "selected='selected' ";}?> >ใช้งาน</option>
                                <option value="F" <? if($fetchArray['isworking']=='F'){ echo "selected='selected' ";}?>  >ไม่ใช้งาน</option>
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
                              <input name="id" type="hidden" value="<?=$fetchArray['emp_id']?>" /></td>
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
