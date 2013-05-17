<?
ob_start();
include "../checksession.php";
include "../inc/FunctionDB.php";
Access($sess_level); // ตรวจสอบสิทธิ์การเข้าหน้าจัดการระบบ
Conn2DB();
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/vtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../jquery/vtip.js"></script>
<title>:: Report ::</title>
<style type="text/css">
<!--
.wrap-content{
	padding-left:60px;
	padding-right:60px;
	padding-bottom:5px;
}
a{
	text-decoration: none;
	color:#09F;
}
a:hover {
		text-decoration: none;
		color:#00F;
}
.bull{
	color:#36F;
	float:left;
	padding-right:10px;
	font-size:18px;
	}
-->
</style></head>

<body topmargin="0" marginwidth="0" marginheight="0">
<?php
require('../fpdf.php');
define('FPDF_FONTPATH','../fonts/');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->AddFont('angsa','','../fonts/angsa.php');
$pdf->SetFont('angsa','',16);
	
 $d = $_GET['report'];
if($d == 0){
	$pdf->Image('../images/logo.png',0,0,210);
	$pdf->Cell(0,20,"",0,1); /// for print in pdf
		  $pdf->Cell(0,10, 'รายงานจำนวนงานของผู้ซ่อมที่มีการซ่อมมากที่สุด และน้อยที่สุด',0,1,"C");
		 $topic = "รายงานจำนวนงานของผู้ซ่อมที่มีการซ่อมมากที่สุด และน้อยที่สุด";
		 $detail1 = "จำนวนงานที่มากที่สุด : " ;
		 $detail2 = "จำนวนงานที่น้อยที่สุด : " ;
		 $pdf->Cell(0,20,'จำนวนงานที่น้อยที่สุด : ',0,1);
		$strSQL_min = "SELECT emp_id, COUNT(*) AS min_val FROM assign WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."' GROUP BY emp_id ORDER BY emp_id DESC LIMIT  1 " ;
		 $arl_prob_min =  mysql_query($strSQL_min);
		 $stuff_min_ar = array();
		while ($row = mysql_fetch_assoc($arl_prob_min)) {
					array_push($stuff_min_ar, $row[0]);
					$strSQL_emp_name_main = "SELECT * FROM employee WHERE emp_id = ".$row['emp_id'];
					$arl_emp_name_min =  mysql_query($strSQL_emp_name_main);
					while ($row2 = mysql_fetch_assoc($arl_emp_name_min)) {
						$emp_name_min = $row2['ename']." ".$row2['esurname'];
					}
					//$detail_min = "พนักงาน : ".$row['emp_id']." ".$emp_name_min."    ,  ทำงาน : ".$row['min_val']." งาน";
					$detail_min = "พนักงาน : ".$emp_name_min."  ,  ทำงาน : ".$row['min_val']." งาน";
					
					$pdf->Cell(0,20,$detail_min,0,1);
		}
		$pdf->Cell(0,20,'จำนวนงานที่มากที่สุด : ',0,1);
		$strSQL_max = "SELECT emp_id, COUNT(*) AS max_val FROM assign  WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."'GROUP BY emp_id ORDER BY emp_id ASC LIMIT  1" ;
		 $arl_prob_max =  mysql_query($strSQL_max);
		 $stuff_max_ar = array();
		while ($row = mysql_fetch_assoc($arl_prob_max)) {
					array_push($stuff_max_ar, $row[0]);
					$strSQL_emp_name_max = "SELECT * FROM employee WHERE emp_id = ".$row['emp_id'];
					$arl_emp_name_max =  mysql_query($strSQL_emp_name_max);
					while ($row1 = mysql_fetch_assoc($arl_emp_name_max)) {
						$emp_name_max = $row1['ename']." ".$row1['esurname'];
					}
					//$detail_max = "พนักงาน : ".$row['emp_id']." ".$emp_name_max."    , ทำงาน : ".$row['max_val']." งาน";
					$detail_max = "พนักงาน : ".$emp_name_max."  , ทำงาน : ".$row['max_val']." งาน";
					
					$pdf->Cell(0,20,$detail_max,0,1);
		}
		$pdf->Output("../repoPDF/report.pdf","F");
}else if($d == 1){
	$pdf->Image('../images/logo.png',0,0,210);
	$pdf->Cell(0,20,"",0,1); /// for print in pdf
	 $topic = "รายงานจำนวนงานของผู้แจ้งซ่อม";
	 $detail1 = "จำนวนงานของผู้แจ้งซ่อม : ";
	 $detail2 = "";
	 
	  // Algo go here
	 $strSQL = "SELECT COUNT(DISTINCT case_ID) AS case_ID FROM cases WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."'" ;
	 $result =  mysql_query($strSQL); 
	 //echo mysql_result($result,0);
	 $arl_prob_order = mysql_result($result,0);;
	/* // Verify it worked
	if (!$result) echo mysql_error();
	$row = mysql_fetch_row($result);
	// Should show you an integer result.
	print_r($row);
	*/
	
	 $pdf->Cell(0,10, 'รายงานจำนวนงานของผู้แจ้งซ่อม',0,1,"C");
	$pdf->Cell(0,20,'จำนวนงานทั้งหมดที่แจ้งซ่อม : '.$arl_prob_order." งาน",0,1);
	$pdf->Output("../repoPDF/report.pdf","F");
}else{
	$pdf->Image('../images/logo.png',0,0,210);
	$pdf->Cell(0,20,"",0,1); /// for print in pdf
	 $pdf->Cell(0,10, 'รายงานประเภทปัญหาที่เกิดขึ้นมากที่สุด และน้อยที่สุด',0,1,"C");
	 $topic = "รายงานประเภทปัญหาที่เกิดขึ้นมากที่สุด และน้อยที่สุด";
	 $detail1 = "ปัญหาที่เกิดขึ้นมากที่สุด : " ;
	 $detail2 = "ปัญหาที่เกิดขึ้นน้อยที่สุด : " ;
	 
	 // Algo go here
	 $strSQL = "SELECT * FROM problemtype";
	 $arl_prob_type =  mysql_query($strSQL);
	 
	 $stack_prob_id = array();
	 $stack_prob_detail = array();
	 /// put data from db to array
	while ($row = mysql_fetch_assoc($arl_prob_type)) {
	   $stack_prob_id = array_merge($stack_prob_id, array_map('trim', explode(",", $row['problemtype_id'])));
	   $stack_prob_detail = array_merge($stack_prob_detail, array_map('trim', explode(",", $row['problemtype_detail'])));
	}
	/*
	 echo "array >> ".var_dump($stack_prob_id); /// all of array
	 echo "[] >> ".$stack_prob_id["104"];
	 echo "<br>";
	 echo "count >> ".count($stack_prob_id); /// count array
	 echo "<br>";
	 */
	 //echo "-----------------------------------------------------------------------------------------------<br>";
	 // Algo go here
	 $pdf->Cell(0,20,'ปัญหาที่เกิดขึ้นน้อยที่สุด',0,1); ///head
	 $strSQL_min = "SELECT problemtype_id, COUNT( * ) AS prob_id_min FROM cases WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."' GROUP BY problemtype_id ORDER BY prob_id_min ASC LIMIT 1 ";
	 $arl_prob_min =  mysql_query($strSQL_min);
	$stuff_min_ar = array();///create array for collect data to print in page
	  while ($row = mysql_fetch_assoc($arl_prob_min)) {
		  		array_push($stuff_min_ar, $row[0]); // keep to array for page
				$strSQL_prob_detail_min = "SELECT * FROM problemtype WHERE problemtype_id = ".$row['problemtype_id'];
				$arl_prob_detail_min =  mysql_query($strSQL_prob_detail_min);
				while ($row1 = mysql_fetch_assoc($arl_prob_detail_min)) {
					$prob_detail_min = $row1['detail'];
				}
				$detail_min ="ปัญหาประเภท : ".$prob_detail_min."  , เกิดขึ้นน้อยที่สุด : ".$row['prob_id_min']." ครั้ง"; // data for pdf
				//$detail_min ="ปัญหาประเภท : ".$row['problemtype_id'].$prob_detail_min."    , เกิดขึ้นน้อยที่สุด : ".$row['prob_id_min']." ครั้ง"; // data for pdf
				$pdf->Cell(0,20,$detail_min,0,1); /// for print in pdf
	}
	 //echo "-----------------------------------------------------------------------------------------------<br>";
	 $pdf->Cell(0,20,'ปัญหาที่เกิดขึ้นมากที่สุด',0,1);
	$strSQL_max = "SELECT problemtype_id, COUNT( * ) AS prob_id_max FROM cases WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."' GROUP BY problemtype_id ORDER BY prob_id_max DESC LIMIT 1";
	
	//$strSQL_max = "SELECT cases.detail AS prob_detail,cases.problemtype_id, COUNT( * ) AS prob_id_max FROM cases INNER JOIN problemtype  ON  cases.problemtype_id = problemtype.problemtype_id  WHERE cases.create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."' GROUP BY cases.problemtype_id ORDER BY cases.prob_id_max DESC LIMIT 1";
	//INNER JOIN problemtype  ON  cases.problemtype_id = problemtype.problemtype_id 
	
	 $arl_prob_max =  mysql_query($strSQL_max);
	 $stuff_max_ar = array();
	while ($row = mysql_fetch_assoc($arl_prob_max)) {
				array_push($stuff_max_ar, $row[0]);
				$strSQL_prob_detail_max = "SELECT * FROM problemtype WHERE problemtype_id = ".$row['problemtype_id'];
				$arl_prob_detail_max =  mysql_query($strSQL_prob_detail_max);
				while ($row2 = mysql_fetch_assoc($arl_prob_detail_max)) {
					$prob_detail_max = $row2['detail'];
				}
				$detail_max = "ปัญหาประเภท : ".$prob_detail_max."  , เกิดขึ้นมากที่สุด : ".$row['prob_id_max']." ครั้ง";
//				$detail_max = "ปัญหาประเภท : ".$row['problemtype_id']."test > ".$prob_detail_max."    , เกิดขึ้นมากที่สุด : ".$row['prob_id_max']." ครั้ง";
				$pdf->Cell(0,20,$detail_max,0,1);
	}
	
	$pdf->Output("../repoPDF/report.pdf","F");
}
?>
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
    	<td>
        <div style="color : #666666; padding-bottom:20px;">
        	<center><?php echo $topic;?></center>
            </div>
        </td>
    </tr>
    <tr>
    	<td>
        	<div class="wrap-content" style="padding-bottom:20px;">
            	<?php 
							/*for($i=0;$i<count($stuff_min_ar);$i++){
								echo $stuff_min_ar[$i]."<br>";
								}
				
                 echo $stuff_max_ar;*/?><br>
            </div>
        </td>
    </tr>
    <tr>
    	<td>
       	   <div class="wrap-content"  style="text-align:center"><a href="../repoPDF/report.pdf">คลิก</a> เพื่อดาวน์โหลด</div>
        </td>
    </tr>
   </table>
</body>
</html>
<? ob_end_flush();?>



