<?
include ("checksession.php");

$cid = $_GET['cid'];
include ("inc/FunctionDB.php");
Conn2DB();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>เลื่อนการแจ้งเตือน</title>
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
  $(function() {
    $( "#postPoneDate" ).datepicker({
			dateFormat:"yy-mm-dd"
		});
  });
  </script>
</head>

<body>
  <table width="423" border="0" align="center" cellspacing="0">
    <tr>
      <td width="417"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"></td>
    </tr>
    <tr>
      <td><fieldset>
      <legend style="font-size:14px">เลื่อนการแจ้งเตือน</legend>
      <form id="form1" name="form1" method="GET" action="postpone_time2.php?cid=<?php echo $cid;?>">
      <table width="441" border="0" cellspacing="0">
        <tr>
          <td width="133" align="right"  style="font-size:14px">ระบุเวลา : </td>
          <td width="8"><label></label></td>
          <td width="294">
        <input type="text" id="postPoneDate" size="20"  name="postPoneDate"/></p>
            <label>
              <input type="hidden" name="cid" id="cid" value="<?=$cid?>" />
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>
          	<input name="Submit2" type="image" value="Submit" src="images/btn_submit2.png" /><a href="user_main.php" class="lbAction" rel="deactivate" ><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a> 
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
      </fieldset>      </td>
    </tr>
    <tr>
      <td align="left"></td>
    </tr>
  </table>
</body>
</html>
