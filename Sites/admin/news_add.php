<? 
include  "../checksession.php"; 

include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();
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
if (document.news.news_topic.value == "") {
				alert("กรุณาใส่  \"หัวข้อข่าวประกาศ\" ด้วยครับ");
				document.news.news_topic.focus();
				return false;
}else if (document.news.news_detail.value ==""){
				alert("กรุณาใส่ \"รายละเอียด\" ด้วยครับ");
				document.news.news_detail.focus();
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
                    <td width="870" align="center" valign="top"><form action="news_add2.php" method="post" name="news" id="news" onsubmit="return checkFields();">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td width="24" height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/add_page.png" width="32" height="32" align="absmiddle" /> เพิ่มข่าวประกาศ :</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td width="148" align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td width="7" class="Gray3">&nbsp;</td>
                            <td width="318" align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ข่าวประกาศ : </td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <textarea name="news_detail" id="news_detail" cols="45" rows="5"></textarea>
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left" class="Orange">* ไม่เกิน 100 Character</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">สถานะ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="radio" name="isused" id="radio" value="T" checked="checked" />
                              <span class="Gray3">ใช้งาน
                                <input type="radio" name="isused" id="radio2" value="F" />
                                ไม่ใช้งาน</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td align="left" ><input name="Submit" type="image" value="Submit" src="images/btn_submit2.png" />
                              <a href="news_list.php"><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a> </td>
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
