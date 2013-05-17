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
<link type="text/css" href="jquery-ui-1.8.2.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.2.custom.min.js"></script>
<!-- End of JQuery -->

<script type="text/javascript">
function Start(page){
 OpenWin = this.open(page, "CtrlWindow","toolbar=No,menubar=No,location=No,status=No,");
 }
function Inint_AJAX(){
	try{ return new ActiveXObject( "Msxml2.XMLHTTP" ); }
	catch ( e ){  };
	
	try{ return new ActiveXObject( "Microsoft.XMLHTTP" ); }
	catch ( e ){ };

	try{ return new XMLHttpRequest(); }
	catch ( e ){ };

	alert( "XMLHttpRequest not supported" );
	return null;
};

function dochange( obj ){
	var req = Inint_AJAX();
	var section = document.getElementById( 'section' ).value;

	if ( obj && obj.name == 'section' )
	{
		var ws = "";
	}
	else 
	{
		var ws = document.getElementById( 'ws' ).value;
	};
	var data = "section=" + section + "&ws=" + ws;
	req.onreadystatechange = function()
	{
		if ( req.readyState == 4 )
		{
			if ( req.status == 200 )
			{
				var datas = eval( '(' + req.responseText + ')' ); // JSON
				document.getElementById( 'sectionDiv' ).innerHTML = datas[0].section;
				document.getElementById( 'wsDiv' ).innerHTML = datas[0].ws;
			};
		};
	};
	req.open( "post" , "wsitem_submenu.php" , true ); //สร้าง connection
	req.setRequestHeader( "Content-Type", "application/x-www-form-urlencoded" ); // set Header
	req.send( data ); //ส่งค่า
};
//โหลดครั้งแรก
window.onload = function()
{
	dochange( '' );
};


function checkFields() {
missinginfo = "";
if (document.wsitem.wsitem_id.value == "") {
				alert("กรุณาใส่  'รหัสอุปกรณ์' ด้วยครับ");
				document.wsitem.wsitem_id.focus();
				return false;
}else if (document.wsitem.name.value ==""){
				alert("กรุณาใส่ 'ชื่ออุปกรณ์.' ด้วยครับ");
				document.wsitem.name.focus();
				return false;     
}else if (document.wsitem.wsitem_detail.value ==""){
				alert("กรุณาใส่ 'ชื่ออุปกรณ์' ด้วยครับ");
				document.wsitem.wsitem_detial.focus();
				return false;     
}else if (document.wsitem.brand.value ==""){
				alert("กรุณาใส่ 'ยี่ห้อ' ด้วยครับ");
				document.wsitem.brand.focus();
				return false;     
}else if (document.wsitem.serial.value ==""){
				alert("กรุณาใส่ 'Serial No.' ด้วยครับ");
				document.wsitem.serial.focus();
				return false;     
}else if (document.wsitem.com_id.value ==""){
				alert("กรุณาใส่ 'Work station.' ด้วยครับ");
				document.wsitem.com_id.focus();
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
                    <td width="870" align="center" valign="top"><form action="wsitem_add2.php" method="post" name="wsitem" id="wsitem" onsubmit="return checkFields();">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/add_page.png" width="32" height="32" align="absmiddle" /> เพิ่มอุปกรณ์ :</td>
                          </tr>
                          <tr>
                            <td width="24" height="18">&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td width="295" align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รหัสอุปกรณ์ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><input type="text" name="wsitem_id" id="wsitem_id" />
                                <span class="red">*</span> </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ชื่ออุปกรณ์ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="name" id="name" />
                              <span class="red">*</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ยี่ห้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="brand" id="brand" />
                              <span class="red">*</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รุ่น :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="model" id="model" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">Serial Number (S/N) :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="serial" id="serial" />
                              <span class="red">*</span></label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รหัสทรัพย์สินทางบัญชี :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="it_asset" id="it_asset" />
                              </label></td>
                          </tr>
                         <!-- <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ราคาที่ซื้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="shop_p" id="shop_p" />
                            </label></td>
                          </tr>
                          <tr> -->
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รายละเอียด :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><textarea name="wsitem_detail" id="wsitem_detail" cols="45" rows="5"></textarea></td>
                          </tr>
                         <!-- <tr>
                            <td>&nbsp;</td>
                            <td width="171" align="right" valign="top" class="Gray3">หมายเหตุ :</td>
                            <td width="7" class="Gray3">&nbsp;</td>
                            <td align="left">
                            <label>
                              <input type="text" name="comment" id="comment" />
                            </label></td>
                          </tr> -->
                     <!--      <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ประเภทอุปกรณ์ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="item_id" id="item_id">
                                <option value="">---กรุณาเลือก---</option>
                                <?
                                $sql1="SELECT * FROM item WHERE isused !='X' ORDER BY item_id ";
								$query1=mysql_query($sql1);
								while($rs1=mysql_fetch_array($query1)){
								?>
                                <option value="<?=$rs1['item_id']?>">
                                  <?=$rs1['item_detail']?>
                                  </option>
                                <? }?>
                              </select>
                            </label></td>
                          </tr> -->
                          <!--<tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr> -->
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">Work station :</td><!-- com_id -->
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">
                              <span id="wsDiv">
                                <label for="ws"></label>
                                <?
										$strSQL="
														SELECT `computer`.`com_id`
														FROM `computer`
														;";
										 $result = mysql_query($strSQL);
									?>
                                <select name="ws" id="ws" >
                                  <? while($row = mysql_fetch_array($result)) {?>
                                  <option value=<?php echo $row['com_id'] ?>><?php echo $row['com_id'] ?> </option>
                                  <?} ?>
                                </select>
                                </span>
                              <span class="red"> * </span> </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" class="Gray3">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="left" class="green_light">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">&nbsp;</td>
                            <td align="left" ><input name="Submit" type="image" value="Submit" src="images/btn_submit2.png" />
                              <a href="wsitem_list.php"><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a> </td>
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
