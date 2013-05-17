<?
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();
$strSQL = "SELECT A.* FROM cases A WHERE  (A.emp_id='$sess_empid' OR A.it_id='$sess_empid' OR A.create_by='$sess_empid') AND (A.status!='6')  ";
$cmdQuery =  mysql_query($strSQL);
//$num_rows = mysql_num_rows($cmdQuery);

$pagelen = 15  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$page = $_GET['page'];
	if(empty($page)){ $page=1; }

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY case_id DESC  LIMIT $goto , $pagelen"; 
$cmdQuery1 = mysql_query($strSQL);
//$Nums=mysql_num_rows($cmdQuery1)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
<link href="css/vtip.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery/vtip1.js"></script>
<script type="text/javascript" src="jquery/jquery.marquee.js"></script>
<script type="text/javascript" src="jquery/jquery.marquee.min.js"></script>

<script type="text/javascript">
// Function Massage Broadcast
$(document).ready(function (){
  $("#marquee3").marquee({yScroll: "bottom"});
});
</script>

<SCRIPT LANGUAGE="JavaScript">
// Function Popup
function Start(page)
 {
 OpenWin = this.open(page, "CtrlWindow","toolbar=No,menubar=No,location=No,scrollbars=No,resizable=Yes,status=No,width=400,height=280,top=150,");
 }
</SCRIPT>

</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><? include ("menu.php");?></td>
  </tr>

  <tr>
    <td colspan="3" align="">

	    <fieldset style="width:950px">
			<legend><img src="images/title_queue.png" width="150" height="47"></legend>
	    	
	    		    	
		    <table width="950" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
		      <tr>
		        <td><table width="948" border="0" cellpadding="0" cellspacing="2" >
		          <tr>
		            <td width="53" height="23" align="center" background="images/bar5_1.png" class="white">ลำดับ</td>
		            <td width="120" background="images/bar5_1.png" class="white"><p align="center" class="white">รหัสเรื่อง</p></td>
		            <td width="465" align="center" background="images/bar5_1.png" class="white">หัวเรื่อง</td>
		<!--             <td width="30" align="center" background="images/bar5_1.png" class="white">ระดับเรื่อง</td> -->
		            <td width="183" align="center" background="images/bar5_1.png" class="white">วันที่เปิด</td>
		            <td width="109" align="center" background="images/bar5_1.png" class="white">สถานะ</td>
		          </tr>
		<?php
					$i=$pagelen*($page-1)+1;
		
					$sql="
						SELECT * 
						FROM  `cases` 
						WHERE `issused` = '0'
					;";
					$result = mysql_query($sql);
					// var_dump($result);
					$_SESSION["i"]=1;
					while ($row = mysql_fetch_array( $result )) {
						// echo $row["case_ID"];
						if($bg == "#FFFFFF") {
							$bg = "#DDECFE";
						} else {
								$bg = "#FFFFFF";
						}
		?>
					  <tr bgcolor="<? echo $bg ;?>">
			            <td width="53" height="23" align="center" class="red "><?php echo $_SESSION["i"]; ?>.</td>
			            <td width="120"  class=""><p align="center" class="blue"><a href="queue_2detail.php?cid=<?=$row['case_ID']?>" class="blue"><?php echo $row["case_ID"]; ?></a></p></td>
			            <td width="465" align="center"  class="red"><?php echo $row["title"]; ?></td>
		<!-- 	            <td width="30" align="center" class="">ด่วน</td> -->
			            <td width="183" align="center"  class="red"><?php echo $row["create_date"]; ?></td>
			            <td width="109" align="center"  class=""><?php
			            	if($row["issused"]==0 && $sess_level>1){?><a href="queue_proc.php?cid=<?php echo $row["case_ID"]; ?>"><img src="images/btn_work.png" /></a><?php }
							/*
							elseif($row["issused"]==1){?><img src="images/btn_work.png" /><?php }
							elseif($row["issused"]==2){?><img src="images/btn_accept.png" /><?php }
							elseif($row["issused"]==3){?><img src="images/btn_close.png" /><?php }
							*/
						else{
							echo "Working";
						}
						?>
						</td>
			          </tr>
		<?php
					  $_SESSION["i"]++;
					}
		?>
		        </table></td>
		      </tr>
		    </table>
	    
	    </fieldset>
    
    </td>
  </tr>

  
</table>
</body>
</html>
