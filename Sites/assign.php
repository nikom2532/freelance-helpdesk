<?
include ("checksession.php");

$case_id = $_GET['cid'];
$ass_id = $_GET["ass_id"];

include ("inc/FunctionDB.php");
Conn2DB();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Assign</title>
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
      <legend><img src="images/title_assign.png" width="150" height="47" /></legend>
      <form id="form1" name="form1" method="post" action="assign_proc.php?ass_id=<?php echo $ass_id;?>">
      <table width="441" border="0" cellspacing="0">
        <tr>
          <td width="133" align="right">Assign to : </td>
          <td width="8"><label></label></td>
          <td width="294">
          	<select name="it_id" id="it_id">
          <?
	          $strSQL="SELECT *,CONCAT(ename,' ',esurname) AS emp_name FROM employee WHERE level !=0 AND emp_id!='$sess_empid' ";
			  $cmdQuery=mysql_query($strSQL);
			  while($fetchArray=mysql_fetch_array($cmdQuery)){
?>
	              <option value="<?=$fetchArray['emp_id']?>">
	              <?=$fetchArray['emp_name']?>
	              </option>
<?
			  }
?>
            </select>
            <label>
              <input type="hidden" name="cid" id="cid" value="<?=$case_id?>" />
              <input type="hidden" name="ass_id" id="ass_id" value="<?=$ass_id?>" />
              <input type="hidden" name="emp_name" id="emp_name" value="<?=$fetchArray[emp_name]?>" />
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
          	<input name="Submit2" type="image" value="Submit" src="images/btn_submit2.png" /><a href="queue_2detail.php?cid=<?php echo $case_id; ?>&ass_id=<?php echo $ass_id; ?>" class="lbAction" rel="deactivate" ><img src="images/btn_cancel2.png" width="82" height="30" border="0" /></a> 
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
