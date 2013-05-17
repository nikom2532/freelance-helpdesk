<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>:: Select USER ::</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script LANGUAGE="JavaScript">
function fillUserData(create_by,emp_id) {
       	window.opener.document.getElementById('create_by').value = create_by;
		window.opener.document.getElementById('emp_id').value = emp_id;
   		window.close();
}
</script>
</head>
<?
$keyword=$_GET['keyword'];


include "inc/FunctionDB.php";
Conn2DB();

$pagelen = 30  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$page = $_GET['page'];
	if(empty($page)){ $page=1; }


if($keyword==''){
		$strSQL="SELECT * FROM employee WHERE isworking ='T' ORDER BY  emp_id   ";
}else{
		$strSQL="SELECT * FROM employee ";
		$strSQL.="WHERE (emp_id LIKE '%$keyword%') OR (ename LIKE '%$keyword%') ";
		$strSQL.="OR (esurname LIKE '%$keyword%') OR (position LIKE '%$keyword%') ";
		$strSQL.="ORDER BY emp_id   ";
}

$cmdQuery=mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" LIMIT $goto , $pagelen"; 
$cmdQuery1 = mysql_query($strSQL);
 
 if(!$cmdQuery1){
 		echo mysql_error();
 }

?>

<body>

<table width="800" border="0">
  <tr>
    <td height="41" colspan="5" align="center"><table width="406" height="78" border="0" cellspacing="0">
      <tr>
        <td width="14" height="68">&nbsp;</td>
        <td width="369" align="center" valign="middle"><form id="form1" name="form1" method="get" action="selectuser.php">
            <label><span class="Gray3"> คำค้นหา : </span>
            <input type="text" name="keyword" id="keyword" value="<?=$keyword ?>" />
            </label>
            <label>
            <input type="submit" name="button" id="button" value="ค้นหา" />
            </label>
        </form></td>
        <td width="17">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="102" height="41" align="center" background="images/bar5_1.png" class="Gray3">ลำดับ</td>
    <td width="131" align="center" background="images/bar5_1.png" class="Gray3">รหัสพนักงาน</td>
    <td width="216" align="center" background="images/bar5_1.png" class="Gray3">รายชื่อพนักงาน</td>
    <td width="193" align="center" background="images/bar5_1.png" class="Gray3">ตำแหน่ง</td>
    <td width="136" align="center" background="images/bar5_1.png" class="Gray3">ระดับ</td>
  </tr>
  <?
  //$i=1;
  $i=$pagelen*($page-1)+1;
  while($fetchArray=mysql_fetch_array($cmdQuery1)){
  	
		if($bg == "#FFFFFF") {  
						$bg = "#EFEFEF";
				} else {
						$bg = "#FFFFFF";
				}
  ?>
  <tr bgcolor="<? echo $bg ;?>">
    <td align="center"><a href="javascript:fillUserData('<?=$fetchArray['ename']."&nbsp;".$fetchArray['esurname']?>','<?=$fetchArray['emp_id']?>')">
      <?=$i?>
    </a></td>
    <td><?=$fetchArray['emp_id']?></td>
    <td><?=$fetchArray['ename']."&nbsp;".$fetchArray['esurname']?></td>
    <td align="left"><?
/*         $level=Level($fetchArray['level']);
		echo $level; */
		echo $fetchArray['position'];
		?></td>
    <td align="left"><?
		  echo $level=Level($fetchArray['level']);
		?></td>
  </tr>
    <?
  $i++;
  }
  ?>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td colspan="5">
         <?
if($totalpage!=0){		 
	echo "&nbsp;มีทั้งหมด $totalpage หน้า:&nbsp;";
	for ($i=1 ; $i<=$totalpage ; $i++){
				if($i == $page){
				echo "|<b><font size=+1 color=#3366FF>$i</font></b>";
				}else{
				echo "|<a href=$PHP_SELF?page=$i&keyword=$keyword>$i</a>";
				}
	}
}else{
		echo "<div class='red'>ไม่พบข้อมูลที่ท่านค้นหา  !! </div>" ;
}
?>     
    </td>
  </tr>
</table>
</body>
</html>
