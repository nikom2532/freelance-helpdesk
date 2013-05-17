<?
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/vtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<link type="text/css" href="css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
<script type="text/javascript" src="../jquery/vtip.js"></script>
<!--calendar -->
<link rel="stylesheet" href="../css/jquery.ui.all.css">
	<script src="../js/jquery-1.9.1.js"></script>
	<script src="../js/jquery.ui.core.js"></script>
	<script src="../js/jquery.ui.widget.js"></script>
	<script src="../js/jquery.ui.datepicker.js"></script>
   
<!--calendar -->
<title>:: Report ::</title>
<style type="text/css">
<!--
.wrap-link{
	padding-top:10px;
	padding-left:60px;
}
a{
	text-decoration: none;
	color:#666666;
}
a:hover {
		text-decoration: none;
		color:#000;
}
.bull{
	color:#36F;
	float:left;
	padding-right:10px;
	font-size:18px;
	}
-->
</style>
<link href="../css/demos.css" rel="stylesheet" type="text/css" />
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

<body topmargin="0" marginwidth="0" marginheight="0">
<form action="report_detail.php" method="get"  name="search" id="search"  onsubmit="return checkFields();">
<table width="1000" border="0" align="center" cellspacing="0" id="norm-size">
<tr>
      <td width="1009" bgcolor="#FFFFFF"></td>
  </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellspacing="0">
        <tr>
          <td colspan="2" class="green"><? include ('menu_backend.php');?></td>
        </tr>
      
        <tr>
              <td><div class="wrap-link" style="margin-bottom:20px;">ช่วงวันที่ :
            		<input name="date_from" type="text" id="date_from" size="25" autocomplete="off"/> ถึง <input name="date_to" type="text" id="date_to" size="25" autocomplete="off"/>
             </div></td>
          </tr>
            <tr>
              <td><div class="wrap-link" style="margin-bottom:5px;">รายงาน :
             </div></td>
          </tr>
        <tr>
    	<td>
        	<div class="wrap-link"><input type="radio" name="report" value="0" style="margin-left:70px" checked="checked">รายงานจำนวนงานของผู้ซ่อมที่มีการซ่อมมากที่สุด และน้อยที่สุด</div>
        </td>
    </tr>
    <tr>
    	<td>
        	<div class="wrap-link"><input type="radio" name="report" value="1" style="margin-left:70px">รายงานจำนวนงานของผู้แจ้งซ่อม</div>
        </td>
    </tr>
    <tr>
    	<td>
        	<div class="wrap-link"><input type="radio" name="report" value="2" style="margin-left:70px">รายงานประเภทปัญหาที่เกิดขึ้นมากที่สุด และน้อยที่สุด</div>
        </td>
         </tr>
         <tr>
    	<td>
        	<div class="wrap-link" style="margin-top:20px;"><input type="submit" name="Search" id="Search" value="ค้นหา" style="width:100px" /></div>
        </td>
         </tr>
          </table>
          
</form>
</body>
</html>
