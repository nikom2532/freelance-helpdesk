<?
ob_start();
include "../checksession.php";
include "../inc/FunctionDB.php";
echo Access($sess_level); // ��Ǩ�ͺ�Է��������˹�ҨѴ����к�
Conn2DB();
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
	
 $d = $_GET['d'];
 
if($d == 1){
		 $topic = "��§ҹ�ӹǹ�ҹ�ͧ����������ա�ë����ҡ����ش ��й��·���ش";
		 $detail1 = "�ӹǹ�ҹ����ҡ����ش : " ;
		 $detail2 = "�ӹǹ�ҹ�����·���ش : " ;
		 
		 // Algo go here

		$pdf->Cell(0,10, '��§ҹ�ӹǹ�ҹ�ͧ����������ա�ë����ҡ����ش ��й��·���ش',0,1);
		$pdf->Cell(0,20,'�ӹǹ�ҹ����ҡ����ش : ',0,1,"C");
		$pdf->Cell(0,20,'�ӹǹ�ҹ�����·���ش : ',0,1,"C");
		$pdf->Output("../repoPDF/report.pdf","F");
}else if($d == 2){
	 $topic = "��§ҹ�ӹǹ�ҹ�ͧ����駫���";
	 $detail1 = "�ӹǹ�ҹ�ͧ����駫��� : ";
	 $detail2 = "";
	 
	  // Algo go here
	 $strSQL = "SELECT COUNT (case_ID)  AS  caseCount FROM cases";
	 $arl_prob_order =  mysql_query($strSQL); /// {a,b,c,...}
	 
	 $pdf->Cell(0,10, '��§ҹ�ӹǹ�ҹ�ͧ����駫���',0,1);
	$pdf->Cell(0,20,'�ӹǹ�ҹ�ͧ����駫��� : '.$arl_prob_order,0,1,"C");
	$pdf->Output("../repoPDF/report.pdf","F");
}else{
	 $topic = "��§ҹ�������ѭ�ҷ���Դ����ҡ����ش ��й��·���ش";
	 $detail1 = "�ѭ�ҷ���Դ����ҡ����ش : " ;
	 $detail2 = "�ѭ�ҷ���Դ��鹹��·���ش : " ;
	 
	 // Algo go here
	 $strSQL = "SELECT * FROM problemtype_id ";
	 $arl_prob_type =  mysql_query($strSQL); /// {a,b,c,...}
	 
	 for($i=0 ; $i<=count($arl_prob_type) ; $i++){
		 $strSQL2 = "SELECT COUNT (problemtype_id)  AS  a FROM cases WHERE problemtype_id =".$arl_prob_type[i];
		 $arl_prob_type2 =  mysql_query($strSQL2); /// {a,b,c,...}
	  }
	 /// find max and min of $arl_prob_type2
	 $max_prob = max($arl_prob_type2);
	 $min_prob = min($arl_prob_type2);
	 
	$pdf->Cell(0,10, '��§ҹ�������ѭ�ҷ���Դ����ҡ����ش ��й��·���ش',0,1);
	$pdf->Cell(0,20,'�ѭ�ҷ���Դ����ҡ����ش : '.$max_prob,0,1,"C");
	$pdf->Cell(0,20,'�ѭ�ҷ���Դ��鹹��·���ش : '.$min_prob,0,1,"C");
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
            	<?php echo $detail1;?><br>
                 <?php echo $detail2;?><br>
            </div>
        </td>
    </tr>
    <tr>
    	<td>
       	   <div class="wrap-content" style="text-align:right"><a href="../repoPDF/report.pdf">��ԡ</a> ���ʹ�ǹ���Ŵ</div>
        </td>
    </tr>
    <tr>
    	<td>
        test :>>>	<?php echo $arl_prob_type;?>
        </td>
    </tr>
   </table>
</body>
</html>
<?ob_end_flush();?>
