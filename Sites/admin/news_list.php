<?
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ��Ǩ�ͺ�Է��������˹�ҨѴ����к�
Conn2DB();

$pagelen = 30  ;// ��˹���Ҩ�����ʴ���� record � 1 ˹��

$keyword=$_GET['keyword'];
$page = $_GET['page'];
	if(empty($page)){ $page=1; }

if($keyword!=""){
		$strSQL = "SELECT * FROM news WHERE news_detail LIKE '%$keyword%'  ";
		$strSQL.="AND isused !='X' ";
}else{
		$strSQL = "SELECT * FROM news WHERE isused !='X' ";
}

$cmdQuery =  mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY news_id  LIMIT $goto , $pagelen"; //echo $strSQL;
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
<title>:: ��¡�â��ǻ�С�� ::</title>
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
          <td width="818" height="38" align="left" class="green"><table width="400" border="0" cellspacing="0">
            <tr>
              <td width="418" align="center"><form id="form1" name="form1" method="get" action="news_list.php">
                  <label> <span class="Gray3">�Ӥ��� :</span>
                  <input type="text" name="keyword" id="keyword" value="<?=$keyword?>" />
                  </label>
                  <label>
                  <input type="submit" name="button" id="button" value="search" />
                  </label>
              </form></td>
            </tr>
          </table></td>
          <td width="180" align="left" class="green"><img src="images/add_page.png" width="32" height="32" align="bottom" /> <a href="news_add.php" ><span class="link_none">�������ǻ�С��</span></a></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>

        <tr>
          <td colspan="2"><table width="900" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td width="79" height="39" align="center" background="images/bar3_1.png" class="white">�ӴѺ</td>
              <td align="center" background="images/bar3_1.png" class="white">��������´</td>
              <td width="77" align="center" background="images/bar3_1.png" class="white">ʶҹ�</td>
              <td width="46" align="center" background="images/bar3_1.png" class="white">���</td>
              <td width="52" align="center" background="images/bar3_1.png" class="white">ź</td>
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
              <td align="left"><?  if(strlen($fetchArray['news_detail'])>50) { echo substr_replace($fetchArray['news_detail'],'.....',50); }else{ echo $fetchArray['news_detail']; } ?></td>
              <td align="center">
	<?
      if($fetchArray['isused']==T){
	  		echo "<img src='images/icon_orange.png' border='0' title='��ҹ' class='vtip' />";
	  }else{
	  		echo "<img src='images/icon_gray.png' border='0' title='�����ҹ' class='vtip' />";
	  }
	  
	  ?></td>
              <td align="center"><a href="news_edit.php?id=<?=$fetchArray['news_id']?>" title="���"  class='vtip' ><img src="images/tools.png" width="24" height="24" border="0" /></a></td>
              <td align="center" class="link"><a href="news_del.php?id=<?=$fetchArray['news_id']?>" title="ź"  onclick="return confirm('�س��ͧ���ź��¡�ù�� ��������� ?')"  class='vtip'><img src="images/trash_can.png" width="24" height="24" class="link_none" border="0"  /></a></td>
              </tr>
      <? 
	$i++ ;
	}
	?>            
          </table>     </td>
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
}else{
		echo "<div class='red'>��辺�����ŷ���ҹ����  !! </div>" ;
}
?>           </td>
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
