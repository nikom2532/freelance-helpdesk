<?
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();
$case_ID=$_GET['case_ID'];
$description=$_GET['description'];
$section_id=$_GET['section_id'];
$title=$_GET['title'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

$queryStr = "SELECT * FROM cases WHERE create_date BETWEEN"."'" .$date_from ."'". "AND"."'". $date_to."'" ;

if(!empty($case_ID)){
	 $queryStr .= "AND case_ID= '$case_ID' ";
}
if(!empty($description)){
	 $queryStr .= "AND description LIKE '%$description%'  ";
}
if(!empty($section_id)){
	 $queryStr .= "AND section_id= '$section_id' ";
}
if(!empty($title)){
	 $queryStr .= "AND title LIKE '%$title%' ";
}
//echo $queryStr;

$cmdQuery =  mysql_query($queryStr);
$num_rows = mysql_num_rows($cmdQuery);

$pagelen = 15  ;// ��˹���Ҩ�����ʴ���� record � 1 ˹��

$page = $_GET['page'];
	if(empty($page)){ $page=1; }

$totalpage=ceil($num_rows / $pagelen);
$goto = ($page-1) * $pagelen;

$queryStr .=" ORDER BY case_id DESC  LIMIT $goto , $pagelen"; 
$cmdQuery1 = mysql_query($queryStr);

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/jquery.marquee.css" rel="stylesheet" title="default" media="all" />
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
				alert("��س����͡  \"�ѹ����������\"  ���¤�Ѻ");
				document.search.date_from.focus();
				return false;
}else if (document.search.date_to.value ==""){
				alert("��س����͡  \"�ѹ�������ش\"  ���¤�Ѻ");
				document.search.date_to.focus();
				return false;
				}
}
</script>

</head>
<body>
<form action="search2.php" method="get"  name="search" id="search" onsubmit="return checkFields();">
  <table width="1009" border="0" align="center" cellpadding="0" cellspacing="0"  id="norm-size">
    <tr>
      <td width="1009" height="29"><? include ("menu.php"); ?></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
    </tr>
    <tr>
      <td height="29" align="left"><fieldset style="width:965px"><legend><img src="images/title_search.png" width="150" height="47" /></legend>
      
          <table width="885" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="159" height="33" align="right" class="Gray3">��������ͧ :</td>
              <td width="16" align="right" class="Gray3">&nbsp;</td>
              <td width="198" align="left" class="Gray3"><label for="case_ID"></label>
              <input name="case_ID" type="text" id="case_ID" size="25" /></td>
              <td width="98" align="right" class="Gray3">�������ͧ :</td>
              <td width="18" align="right" class="brown2">&nbsp;</td>
              <td width="171" align="left" class="brown2"><label for="title"></label>
              <input name="title" type="text" id="title" size="25" /></td>
              <td width="33" align="right" class="brown2">&nbsp;</td>
              <td width="192" colspan="2" align="right" class="brown2">&nbsp;</td>
            </tr>

            <tr>
              <td height="39" align="right" class="Gray3">Ἱ� :</td>
              <td align="right">&nbsp;</td>
               <td align="left"><label for="description">
                 <select name="section_id" id="section_id">
                   <option value="" selected="selected">�ô���͡</option>
                   <?
                    $strSQL = "SELECT * FROM  section ORDER BY section_id  ASC ";
$cmdQuery =  mysql_query($strSQL);
                  while($fetchArray=mysql_fetch_array($cmdQuery)){?>
                   <option value="<?=$fetchArray['section_id']?>">
                     <?=$fetchArray['section_detail']?>
                    </option>
                   <? }?>
                 </select>
               </label></td>
              <td align="right" class="Gray3">��������´ :</td>
              <td align="right">&nbsp;</td>
              <td align="left"><input name="description" type="text" id="description" size="25"/></td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" class="Gray3">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="right"><span class="Gray3">��ǧ�ѹ��� :</span></td>
              <td align="right">&nbsp;</td>
              <td align="left"><input name="date_from" type="text" id="date_from" size="25"/></td>
              <td align="center">�֧</td>
              <td colspan="2" align="left"><input name="date_to" type="text" id="date_to" size="25"/></td>
            </tr>
            <tr>
              <td height="46" align="right" class="Gray3">&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left"><label for="section_id"></label></td>
              <td>&nbsp;</td>
              <td align="right">&nbsp;</td>
              <td align="left">
              <input type="submit" name="Search" id="Search" value="����" style="width:100px" />
   </td>
              <td align="right">&nbsp;</td>
              <td colspan="2" align="right">&nbsp;</td>
            </tr>
          </table>
          <p>&nbsp;</p>
      </fieldset></td>
    </tr>
    <tr>
      <td height="29">
			<?
			if($num_rows == '0' || $num_rows==''){
				  echo "<div class='red center'>��辺�����ŷ���ҹ����  !! </div>" ;
			}else{

			?>
  <table width="1009" border="0" align="center" cellpadding="0" cellspacing="0"  class="margin-top">
    <tr>
      <td width="1009" height="29">
   <table width="993" border="0" cellpadding="0" cellspacing="2" >

          <tr>
            <td width="53" height="43" align="center" background="images/bar5_1.png" class="white">�ӴѺ</td>
            <td width="103" background="images/bar5_1.png" class="white"><p align="center" class="white">��������ͧ</p></td>
            <td width="474" align="center" background="images/bar5_1.png" class="white">�������ͧ</td>
       
            <td width="184" align="center" background="images/bar5_1.png" class="white">�ѹ����Դ /  ����</td>
            <td width="122" align="center" background="images/bar5_1.png" class="white">ʶҹ�</td>
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
             
                    <td ><a href="queue_2detail.php?cid=<?=$fetchArray['case_ID']?>" class="blue"><?=$fetchArray['case_ID']?></a></td>
                    <td class="indent"><?=$fetchArray['title']?></td>
       

                    <td style="text-align:center"><?=$fetchArray['create_date']?></td>
					<?
						if($fetchArray['issused'] == 0){
								$status = "Open";
						}else if($fetchArray['issused'] == 1){
								$status = "Working";
						}else if($fetchArray['issused'] == 2){
								$status = "Accept";
						}else{
								$status = "Close";
						}
					
					?>
                    <td style="text-align:center"><?=$status?></td>
          </tr><!-- end row-->
	<? 
		$i++ ;
		} ?>
<!--end while -->
        </table>
	<? }?>
   </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>�շ����� 
        <?=$totalpage?>&nbsp; ˹�� &nbsp;
<? for ($i=1 ; $i<=$totalpage ; $i++){
				if($i == $page){
						echo "|<b><font size=+1 color=#3366FF>$i</font></b>";
				}else{
							echo "|<a href=\"$PHP_SELF?page=$i&case_ID=$case_ID&description=$description&section_id=$section_id&title=$title&date_from=$date_from&date_to=$date_to\">$i</a>";
				}
	}
	?></td>
    </tr>
  </table>
   </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
        
</body>
</html>
