<? 
include  "../checksession.php"; 
$id=$_GET['id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ��Ǩ�ͺ�Է��������˹�ҨѴ����к�
Conn2DB();

$strSQL="SELECT * FROM news WHERE news_id='$id' " ;
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
if (document.news.news_topic.value == "") {
				alert("��س����  \"��Ǣ�͢��ǻ�С��\" ���¤�Ѻ");
				document.news.news_topic.focus();
				return false;
}else if (document.news.news_detail.value ==""){
				alert("��س���� \"��������´\" ���¤�Ѻ");
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
                    <td width="870" align="center" valign="top"><form action="news_edit2.php" method="post" name="news" id="news" onsubmit="return checkFields();">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/tools.png" width="24" height="24" align="absmiddle" />��䢢��ǻ�С�� :</td>
                          </tr>
                          <tr>
                            <td width="24" height="18">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td width="310" align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td width="161" align="right" valign="top" class="Gray3">���� :</td>
                            <td width="2" class="Gray3">&nbsp;</td>
                            <td align="left"><label><span class="blue">
                              <?=$fetchArray['news_id']?>
                            </span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">���ǻ�С��  : </td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <textarea name="news_detail" id="news_detail" cols="45" rows="5"><?=$fetchArray['news_detail']?>
          </textarea>
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ʶҹ� :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="radio" name="isused" id="radio" value="T" <? if($fetchArray['isused']=='T'){ echo "checked='checked'";}?> />
                              <span class="Gray3">��ҹ
                                <input type="radio" name="isused" id="radio2" value="F"  <? if($fetchArray['isused']=='F'){ echo "checked='checked'";}?> />
                                �����ҹ</span></label></td>
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
                            <a href="news_list.php"><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a>
                             <input name="id" type="hidden" value="<?=$fetchArray['news_id']?>" /></td>
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
