<?
include ("checksession.php");
include ("inc/FunctionDB.php");

Conn2DB();
//$strSQL = "SELECT * FROM cases   WHERE  (cases.create_by='$sess_empid' OR assign_detail.emp_id='$sess_empid' ) AND cases.issused = '1' ";
$strSQL="
					SELECT DISTINCT c.case_ID AS case_ID, c.title AS title, c.create_date AS cDate, c.update_date AS uDate , c.issused  AS  status
					FROM cases c
					INNER JOIN assign a ON c.case_ID = a.case_id
					INNER JOIN assign_details d ON a.ass_id = d.ass_id
					WHERE (c.create_by =  '$sess_empid'
					OR d.emp_id =  '$sess_empid')
					AND c.issused =  '1' ";
$cmdQuery =  mysql_query($strSQL);
$num_rows = mysql_num_rows($cmdQuery);
//echo "row=>".$num_rows ;


$pagelen = 15  ;// กำหนดว่าจะให้แสดงกี่ record ใน 1 หน้า

$page = $_GET['page'];
	if(empty($page)){ $page=1; }

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$strSQL .=" ORDER BY case_ID DESC  LIMIT $goto , $pagelen"; 
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

<!-- notification -->
 <link href="css/jquery_notification.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/jquery_v_1.4.js"></script>
<script type="text/javascript" src="js/jquery_notification_v.1.js"></script>

<script type="text/javascript">
		$(document).ready(function(){ 
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
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr>
    <td width="158" rowspan="2" align="left"><img src="images/title_main.png" width="150" height="47" /></td>
    <td width="289" align="left"><span class="blue">
      <?=$sess_ename."&nbsp;&nbsp;".$sess_esurname ;?>
      <a href="javascript:void(0);" onclick="javascript:Start ('admin/member_editpw.php');">
      <input name="Submit" type="submit" class="Gray3" id="button" value="แก้ไขรหัสผ่าน" />
    </a></span></td>
    <td width="557" align="right" class="Gray3">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="557" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><table width="950" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
      <tr>
        <td><table width="948" border="0" cellpadding="0" cellspacing="2" >
          <tr>
            <td width="53" height="43" align="center" background="images/bar5_1.png" class="white">ลำดับ</td>
            <td width="120" background="images/bar5_1.png" class="white"><p align="center" class="white">รหัสเรื่อง</p></td>
            <td width="455" align="center" background="images/bar5_1.png" class="white">หัวเรื่อง</td>
            <td width="183" align="center" background="images/bar5_1.png" class="white">วันที่เปิด /  เวลา</td>
			 <td width="119" align="center" background="images/bar5_1.png" class="white">สถานะ</td>
			 <td width="183" align="center" background="images/bar5_1.png" class="white">แจ้งเตือน</td>
           
          </tr>
            <?
			$i=$pagelen*($page-1)+1;
			while($fetchArray=mysql_fetch_array($cmdQuery1)){
				if($bg == "#FFFFFF") {  
						$bg = "#E7E9EB";
				} else {
						$bg = "#FFFFFF";
				}
			?>
          <tr bgcolor="<? echo $bg ;?>"><!--start  row-->
          			<td style="text-align:center"><?=$i?></td>
                    <td>&nbsp;&nbsp;&nbsp;<a href="queue_2detail.php?cid=<?=$fetchArray['case_ID']?>" class="blue"><?=$fetchArray['case_ID']?></a></td>
                    <td>&nbsp;&nbsp;&nbsp;<?=$fetchArray['title']?></td>
                    <?
                    if($fetchArray['status'] ==  "0"){
						$status = "Open";
					}else if($fetchArray['status'] ==  "1"){
						$status = "Working";
					}else if($fetchArray['status'] ==  "2"){
						$status = "Accept";
					}else{
						$status = "Close";
					}
					//$newDate = date("d-m-Y", strtotime($fetchArray['create_date']));
					?>
					   <td style="text-align:center"><?=$fetchArray['cDate']?></td>
					<td style="text-align:center"><?=$status?></td>
					<?php
						// echo date( "d/m/Y", time());
						// echo strtotime(date( "d/m/Y", time()));
						// echo $a = strtotime(date('Y-m-d H:i:s', time()));
						// echo "<br/>";
						// echo $b = strtotime(date('Y-m-d H:i:s', time()+(3 * 24 * 60 * 60) ));
						// echo "<br/>".($b-$a); //is = 259200
			
						if (isset($_GET["type"])) {
							$message = $_GET["message"];
							$type = $_GET["type"];
							$cid = $_GET["cid"];
						?>
						<script type="text/javascript">
							showNotification({
							message: "<span class=\"red\">Notification :  </span>Case &nbsp;<?php echo $cid; ?> ครบกำหนดระยะเวลาที่แจ้งเตือน  &nbsp;&nbsp; <a href = \"postpone_time.php?cid=<?php echo $cid; ?>\">เลื่อนการแจ้งเตือน</a> ",
							type: "<?php echo $type; ?>",
							//autoClose: true,
							//duration: 5
							});
						</script>
						<?php
							}
						?>					
						<?
						$create_date_value = $fetchArray['uDate'];
						$create_date_value = strtotime($create_date_value);
						// echo $create_date_value."<br/> ";
						$datetime_now = strtotime(date('Y-m-d H:i:s', time()));
						$different_time = $datetime_now - $create_date_value;
						if($different_time > 259200){

						?>
							<td style="text-align:center"><a href="?type=warning&message=1 ข้อความ&cid=<?=$fetchArray['case_ID']?>"><input type="button" class="button small orange" value="1 ข้อความ"/></a></td>

						<?}
						else {?>
								<td style="text-align:center">	ไม่มีการแจ้งเตือน</td>
						<?}
?>
                    </td>
          </tr><!-- end row-->
		<? 
		$i++ ;
		} ?><!--end while -->
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3">
              
	</td>
  </tr>
  <tr>
    <td colspan="3">
	</td>
  </tr>
  <tr>
    <td colspan="3"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
  </tr>
        
</body>
</html>