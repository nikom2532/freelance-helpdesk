<? 
include  "../checksession.php"; 
$id=$_GET['id'];

include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();

$id = $_GET['id'];
$strSQL = "SELECT * FROM ws_item WHERE wsitem_id = '$id' ";
$cmdQuery=mysql_query($strSQL);
$fetchArray=mysql_fetch_array($cmdQuery);

//$item_id=$fetchArray['item_id'];
$com_id=$fetchArray['com_id'];
//echo "com_id ".$com_id;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title></title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
if (document.wsitem.wsitem_detail.value == "") {
				alert("กรุณาใส่  'ชื่ออุปกรณ์' ด้วยครับ");
				document.wsitem.wsitem_detail.focus();
				return false;
}else if (document.wsitem.serial.value ==""){
				alert("กรุณาใส่ 'Serial No.' ด้วยครับ");
				document.wsitem.serial.focus();
				return false;     
}else if (document.wsitem.serial.value ==""){
				alert("กรุณาใส่ 'Serial No.' ด้วยครับ");
				document.wsitem.serial.focus();
				return false;     
}else if (document.wsitem.item_id.value ==""){
				alert("กรุณาเลือก 'ประเภทอุปกรณ์' ด้วยครับ");
				document.wsitem.item_id.focus();
				return false;   
}else if (document.wsitem.section.value ==""){
				alert("กรุณาเลือก 'แผนก' ด้วยครับ");
				document.wsitem.section.focus();
				return false;       
}else if (document.wsitem.ws.value ==""){
				alert("กรุณาเลือก 'work station' ด้วยครับ");
				document.wsitem.ws.focus();
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
                    <td width="870" align="center" valign="top"><form action="wsitem_edit2.php" method="post" name="wsitem" id="wsitem">
                        <table width="505" border="0" cellspacing="0">
                          <tr>
                            <td height="34" background="images/bar3_1.png">&nbsp;</td>
                            <td colspan="3" align="left" background="images/bar3_1.png" class="white"><img src="images/tools.png" width="24" height="24" align="absmiddle" /> แก้ไขอุปกรณ์ :</td>
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
                            <td align="left">
							<?=$fetchArray['wsitem_id']?></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ชื่ออุปกรณ์ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="wsitem_detail" id="wsitem_detail" value="<?=$fetchArray['wsitem_detail']?>" />
                             </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ยี่ห้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="brand" type="text" id="brand" value="<?=$fetchArray['brand']?>" />
                              </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รุ่น :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="model" type="text" id="model" value="<?=$fetchArray['model']?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td width="171" align="right" valign="top" class="Gray3">Serial Number (S/N) :</td>
                            <td width="7" class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input type="text" name="serial" id="serial" value="<?=$fetchArray['serial']?>" />
                              </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ชื่อบริษัทที่ซื้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="shop" type="text" id="shop" value="<?=$fetchArray['name']?>" />
                            </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">วันที่ซื้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="shop_date" type="text" id="shop_date" value="<?=$fetchArray['create_date']?>" />
                            </label></td>
                          </tr>
                         <!--  <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ราคาที่ซื้อ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="shop_p" type="text" id="shop_p" value="<?=$fetchArray['shop_p']?>" />
                            </label></td>
                          </tr> -->
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">รหัสทรัพย์สินทางบัญชี :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="acc_id" type="text" id="acc_id" value="<?=$fetchArray['it_asset']?>" />
                            </label></td>
                          </tr>
                          <!-- <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">หมายเหตุ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <input name="comment" type="text" id="comment" value="<?=$fetchArray['comment']?>" />
                            </label></td>
                          </tr> -->
                         <!--  <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">ประเภทอุปกรณ์ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                              <select name="item_id" id="item_id">
                                <?
                                $sql1="SELECT * FROM item WHERE isused !='X' ORDER BY item_id DESC ";
								$query1=mysql_query($sql1);
								while($rs1=mysql_fetch_array($query1)){
								?>
                                <option value="<?=$rs1['item_id']?>" <? if($rs1['item_id']==$item_id){ echo "selected='selected' ";}?>>
                                  <?=$rs1['item_detail']?>
                                  </option>
                                <? }?>
                              </select>
                            </label></td>
                          </tr> -->
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">&nbsp;</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">แผนก :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
                                <span id="sectionDiv">
                                <label for="section"></label>
                                <select name="section" id="section">								
									<option value="1" <? if($fetchArray['section_id']=='1'){ echo "selected='selected' "; } ?>>แผนกโสตทัศนศิลป์</option>
									<option value="2" <? if($fetchArray['section_id']=='2'){ echo "selected='selected' "; } ?>>แผนกคลังสินค้า (STORE)</option>
									<option value="3" <? if($fetchArray['section_id']=='3'){ echo "selected='selected' "; } ?>>แผนกซ่อมบำรุง</option>
									<option value="4" <? if($fetchArray['section_id']=='4'){ echo "selected='selected' "; } ?>>แผนกโภชนาการ</option>
									<option value="5" <? if($fetchArray['section_id']=='5'){ echo "selected='selected' "; } ?>>สารสนเทศ (IT)</option>
									<option value="6" <? if($fetchArray['section_id']=='6'){ echo "selected='selected' "; } ?>>บัญชี</option>
									<option value="7" <? if($fetchArray['section_id']=='7'){ echo "selected='selected' "; } ?>>บุคคล (HR)</option>
									
                                </select>
                                </span>
                                </label></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td align="right" valign="top" class="Gray3">Work station :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left"><label>
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
                                  <option value=<?php echo $row['com_id'] ?> ><?php echo $row['com_id'] ?> </option>
                                  <?} ?>
                                </select>
                                </span>
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
                            <td align="right" valign="top" class="Gray3">สถานะ :</td>
                            <td class="Gray3">&nbsp;</td>
                            <td align="left">
							        <input type="radio" name="isused"  value="T" <? if($fetchArray['isused']=='T'){ echo "checked='checked'";}?>  class="Gray3" checked="checked"/>ใช้งาน <br />
                              <input type="radio" name="isused"  value="F"  <? if($fetchArray['isused']=='X'){ echo "checked='checked'";}?>  class="Gray3"/>
                              ไม่ใช้งาน <br />
                                </td>
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
                                <a href="wsitem_list.php"><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a>
                                <input name="id" type="hidden" value="<?=$fetchArray['wsitem_id']?>" />
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
