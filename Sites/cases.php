<?
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title></title>
<script language="JavaScript">
function checkFields() {
missinginfo = "";
if (document.service.title.value == "") {
				alert("��س����  '�������ͧ' ���¤��");
				document.service.title.focus();
				return false;
}else if (document.service.description.value ==""){
				alert("��س���� '��������´' ���¤��");
				document.service.description.focus();
				return false;
}else if (document.service.name.value ==""){
				alert("��س���� '�����ػ�ó�' ���¤��");
				document.service.name.focus();
				return false;
}else if (document.service.department_id.value ==""){
				alert("��س����͡ 'Ἱ������' ���¤��");
				document.service.department_id.focus();
				return false;
}
}
</script>
</head>

<body>
<form action="cases2.php" method="post" enctype="multipart/form-data" name="service" id="service" onsubmit="return checkFields();">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1000" height="29"><? include ("menu.php"); ?></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
    </tr>
    <tr>
      <td height="29" align="left"><fieldset style="width:700px"><legend><img src="images/title_case.png" width="150" height="47" /></legend>
          <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="204" align="right" class="Gray3">&nbsp;</td>
              <td width="6">&nbsp;</td>
              <td colspan="2" align="right" class="brown2">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="29" align="right" class="Gray3">�������ͧ :</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left"><label>
                <input name="title" type="text" id="title" size="35" maxlength="100" />
				<span class="red">*</span>
              </label></td>
            </tr>
            <tr>
              <td height="83" align="right" valign="top" class="Gray3">��������´ :</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left"><label>
                <textarea name="description" id="description" cols="35" rows="5"></textarea>
				<span class="red">*</span>
              </label></td>
            </tr>
            <tr>
              <td height="29" align="right" class="Gray3">�ػ�ó� :</td>
              <td>&nbsp;</td>
              <td align="right" class="Gray3">&nbsp;</td>
              <td align="left" class="Gray3">&nbsp;</td>
            </tr>
            <tr>
              <td height="29" align="right" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="98" align="right"><label class="Gray3">�����ػ�ó� :</label></td>
              <td width="392"  align="left">
				  <input type="text" name="name" id="name" value="" readonly="readonly" style="background-color:#CCCCCC" /><!-- 1 -->
                  <input type="hidden" name="ws_item" id="ws_item" value=""  /><!-- 2 -->
                <a href="selecthw.php" target="_blank"><img src="images/add.gif" width="24" height="24" border="0" title="�����ػ�ó�" /></a><span class="red">*</span></td>
            </tr>
            <tr>
              <td height="30" align="right" valign="top" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" class="Gray3">��� : </td>
              <td align="left">
			  <input name="model" type="text" id="model" style="background-color:#CCCCCC" value="" size="30" readonly="readonly" /><!-- 3 -->
			  <span class="red">*</span>
			  </td>
            </tr>
            <tr>
              <td height="30" align="right" valign="top" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" class="Gray3">S/N : </td>
              <td align="left">
			  <input name="serial" type="text" id="serial" style="background-color:#CCCCCC" value="" size="30" readonly="readonly" /><!-- 4 -->
			  <span class="red">*</span>
			  </td>
            </tr>
            <tr>
              <td height="30" align="right" valign="top" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right" class="Gray3">���ʤ��������� :</td>
              <td align="left">
			  <input type="text" name="com_id" id="com_id" value="" readonly="readonly" style="background-color:#CCCCCC" /><!-- 5 -->
			  <span class="red">*</span>
			  </td>
            </tr>
            <tr>
              <td height="30" align="right" valign="top" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="29" align="right" valign="top" class="Gray3">�͡���Ṻ :</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left">
              	<?php /* ?>
              	<input type="file" name="file_1" id="my_file_element" />
                  <!--<img src="images/plus-icon.png" width="16" height="16" onclick="JavaScript:fncCreateElement();" title="�����͡���Ṻ" />-->
                  <br />
                Files:
                <div id="files_list"></div>
                <script>
	<!-- Create an instance of the multiSelector class, pass it the output target and the max number of files -->
	var multi_selector = new MultiSelector( document.getElementById( 'files_list' ), 5 );
	<!-- Pass in the file element -->
	multi_selector.addElement( document.getElementById( 'my_file_element' ) );
            </script>
                  <span id="mySpan"></span> 
                <?php */ ?>
                <!--iframe src="queue_4formupload.php?cid=<?php echo $case_ID; ?>" style="border:0;"></iframe-->
                 Please choose a file: <input name="uploaded" type="file" />
              </td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td class="brown2">&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="32" align="right" class="Gray3">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Gray3">����� :</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left"><label>
                <input type="text" name="create_by" id="create_by" readonly="readonly"  value="<?=$sess_ename."&nbsp;".$sess_esurname ?>" style="background-color:#CCCCCC"  />
                <input type="hidden"  name="emp_id" id="emp_id" value="<?=$sess_empid?>" />
              <a href="selectuser.php" target="_blank"><img src="images/add.gif" alt="" width="24" height="24" border="0" title="������ª���" /></a></label></td>
            </tr>
            <tr>
              <td align="right" class="Gray3">Ἱ������ :</td>
              <td class="brown2">&nbsp;</td>
              <td colspan="2" align="left"><label>
                <select name="department_id" id="department_id">
                 <option value="" selected="selected">--- ��س����͡ ---</option>
              <?
              $sql="SELECT section_id,section_detail FROM section WHERE isused='T' ORDER BY section_detail  ";
			  $query=mysql_query($sql);
			  while($rs=mysql_fetch_array($query)){
			  ?>
                  <option value="<?=$rs['section_id'] ?>"><?=$rs['section_detail']?></option>
                 <? } ?>
                </select>
				  <span class="red">*</span>
              </label></td>
            </tr>
            <tr>
              <td align="right" class="brown2">&nbsp;</td>
              <td class="brown2">&nbsp;</td>
              <td colspan="2" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="left">&nbsp;
               <input name="Submit" type="image" value="Submit" src="images/btn_submit2.png" />
                  <label><a href="user_main.php" onclick="return confirm('�س��ͧ���¡��ԡ ��������� ?')" ><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a></label>
                 </td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
      </fieldset></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
