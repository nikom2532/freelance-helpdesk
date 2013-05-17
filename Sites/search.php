<?
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
<link href="css/vtip.css" rel="stylesheet" type="text/css" />
<!--calendar -->
<link rel="stylesheet" href="css/jquery.ui.all.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="css/demos.css">
<!--calendar -->


<script type="text/javascript">
<!--calendar -->
	$(function() {
		$( "#date_from" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#date_to" ).datepicker( "option", "minDate", selectedDate );
				
			}
		});
		$( "#date_to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			dateFormat:"yy-mm-dd",
			onClose: function( selectedDate ) {
				$( "#date_from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		 
	});

<!--calendar -->
</script>

<script type="text/javascript">
function checkFields() {
missinginfo = "";
if (document.search.date_from.value == "" ) {
				alert("กรุณาเลือก  \"วันที่เริ่มต้น\"  ด้วยครับ");
				document.search.date_from.focus();
				return false;
}else if (document.search.date_to.value ==""){
				alert("กรุณาเลือก  \"วันที่สิ้นสุด\"  ด้วยครับ");
				document.search.date_to.focus();
				return false;
	}
}
</script>

</head>
<body>
<form action="search2.php" method="get"  name="search" id="search"  onsubmit="return checkFields();">
  <table width="1009" border="0" align="center" cellpadding="0" cellspacing="0" id="norm-size">
    <tr>
      <td width="1009" height="29"><? include ("menu.php"); ?></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
    </tr>
    <tr>
      <td height="29" align="left"><fieldset style="width:965px"><legend><img src="images/title_search.png" width="150" height="47" /></legend>
          <table width="885" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="159" height="33" align="right" class="Gray3">รหัสเรื่อง :</td>
              <td width="16" align="right" class="Gray3">&nbsp;</td>
              <td width="198" align="left" class="Gray3"><label for="case_ID"></label>
              <input name="case_ID" type="text" id="case_ID" size="26" /></td>
              <td width="98" align="right" class="Gray3">หัวเรื่อง :</td>
              <td width="18" align="right" class="brown2">&nbsp;</td>
              <td width="166" align="left" class="brown2"><label for="title"></label>
              <input name="title" type="text" id="title" size="25" /></td>
              <td width="32" align="right" class="brown2">&nbsp;</td>
              <td width="198" colspan="2" align="right" class="brown2">&nbsp;</td>
            </tr>

            <tr>
              <td height="39" align="right" class="Gray3">แผนก :</td>
              <td align="right">&nbsp;</td>
              <td align="left"><label for="description">
                <select name="section_id" id="section_id">
                  <option value="" selected="selected">โปรดเลือก</option>
                  <?
                    $strSQL = "SELECT * FROM  section ORDER BY section_id  ASC ";
$cmdQuery =  mysql_query($strSQL);
                  while($fetchArray=mysql_fetch_array($cmdQuery)){?>
                  <option value="<?=$fetchArray['section_id']?>">
                    <?=$fetchArray['section_detail']?>
                    </option>
                  <? }?>
                </select>
              </label></td>
              <td align="right" class="Gray3">รายละเอียด:</td>
              <td align="right">&nbsp;</td>
              <td align="left"><input name="description" type="text" id="description" size="25"/></td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="right"><span class="Gray3">ช่วงวันที่ :</span></td>
              <td align="right">&nbsp;</td>
              <td align="left"><input name="date_from" type="text" id="date_from" size="25"/></td>
              <td align="center">ถึง</td>
              <td colspan="2" align="left"><input name="date_to" type="text" id="date_to" size="25"/></td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left"><label for="section_id"></label></td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">
               <input type="submit" name="Search" id="Search" value="ค้นหา" style="width:120px" />
         
   </td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
      </fieldset></td>
    </tr>
    <tr>
      <td height="29">
  <table width="1009" border="0" align="center" cellpadding="0" cellspacing="0"  class="margin-top">
    <tr>
      <td width="1009" height="29">
   <table width="993" border="0" cellpadding="0" cellspacing="2" >
            <?

				if($bg == "#FFFFFF") {  
						$bg = "#E7E9EB";
				} else {
						$bg = "#FFFFFF";
				}
			?>
          <tr bgcolor="<? echo $bg ;?>"><!--start  row-->
          			<td width="53" style="text-align:center"></td>
                    <td width="103">&nbsp;&nbsp;&nbsp;</td>
                    <td width="474">&nbsp;&nbsp;&nbsp;</td>
                    <td width="184" style="text-align:center">&nbsp;</td>

                    <td width="184" style="text-align:center"></td>
                    <td width="122" style="text-align:center"></td>
          </tr><!-- end row-->

<!--end while -->
        </table>
   </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
   </td>
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
