<?
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ��Ǩ�ͺ�Է��������˹�ҨѴ����к�
Conn2DB();

$pagelen = 30  ;// ��˹���Ҩ�����ʴ���� record � 1 ˹��

$keyword=$_GET['keyword'];
$page = $_GET['page'];
	if(empty($page)){ $page=1; }


		$strSQL = "SELECT * FROM cases   WHERE  issused = '2' ";

$cmdQuery =  mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY create_date  DESC LIMIT $goto , $pagelen"; //echo $strSQL;
$cmdQuery1 = mysql_query($strSQL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/vtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jquery/vtip.js"></script>
<title>:: ��¡��Ἱ� ::</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body topmargin="0" marginwidth="0" marginheight="0">
<table width="1000" border="0" align="center" cellspacing="0">
<tr>
      <td width="1009" bgcolor="#FFFFFF"></td>
  </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><table width="1000" border="0" align="center" cellspacing="0">
        <tr>
          <td colspan="2" class="green"><? include ('menu_backend.php');?></td>
        </tr>
        <tr>
          <td width="819" align="left" class="green"><table width="400" border="0" cellspacing="0">
            <tr>
              <td width="351" align="center"><form id="form1" name="form1" method="get" action="section_list.php">
              </form></td>
            </tr>
          </table></td>
          <td width="179" align="left" class="green">&nbsp;</td>
        </tr>
        <tr  class="center">
          <td colspan="2">
          	<?
			if($num_rows == '0' || $num_rows==''){
				  echo "<div class='red center'>������ʷ���ͧ�Դ  !! </div>" ;
			}else{

			?>
          
          </td>
        </tr>

        <tr>
          <td colspan="2"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="102" height="39" align="center" background="images/bar3_1.png" class="white">�ӴѺ</td>
              <td width="209" align="center" background="images/bar3_1.png" class="white">��������ͧ</td>
              <td width="230" align="center" background="images/bar3_1.png" class="white">�������ͧ</td>
              <td width="170" align="center" background="images/bar3_1.png" class="white">�ѹ����Դ</td>
              <td width="156" align="center" background="images/bar3_1.png" class="white">ź</td>
            </tr>
            <?
	//$i=1;
	$i=$pagelen*($page-1)+1;
    while($fetchArray=mysql_fetch_array($cmdQuery1)){
		if($bg == "#FFFFFF") {  
						$bg = "#DDECFE";
				} else {
						$bg = "#FFFFFF";
				}
    ?>
            <tr bgcolor="<? echo $bg ;?>">
              <td align="center"><?=$i?></td>
              <td align="left"><?=$fetchArray['case_ID']?></td>
              <td align="left"><?=$fetchArray['title']?></td>
              <td align="left"><?=$fetchArray['create_date']?></td>
              <td align="center" class="link"><a href="close_cases.php?id=<?=$fetchArray['case_ID']?>" title="�Դ�ҹ"  onclick="return confirm('�س��ͧ��ûԴ��¡�ù�� ��������� ?')" class="vtip"><img src="images/btn_close.png" alt="" border="0" class="link_none"  /></a></td>
            </tr>
            <? 
	$i++ ;
	}
	?>
          </table></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="left">
          		 <?
if($totalpage!=0){		 
	echo "&nbsp;�շ����� $totalpage ˹��:&nbsp;";
	for ($i=1 ; $i<=$totalpage ; $i++){
				if($i == $page){
				echo "|<b><font size=+1 color=#3366FF>$i</font></b>";
				}else{
				echo "|<a href=$PHP_SELF?page=$i&keyword=$keyword>$i</a>";
				}
	}
}

	} // end if  no. case to close
?>     
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><label></label></td>
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
</body>
</html>
