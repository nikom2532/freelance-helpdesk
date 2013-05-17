<?
ini_set("output_buffering","1");
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title></title>
</head>
<body>
	
<?php
	$case_ID = $_GET["cid"];
	///echo "case id >".$case_ID."   ";
	// $responsibilityIT = 
	
	if($ass_id == "" || $ass_id == null){
		$strSQL = "SELECT ass_id FROM assign WHERE case_id = ".$case_ID ;
					$arl_ass_id =  mysql_query($strSQL);
					while ($row1 = mysql_fetch_array($arl_ass_id)) {
						$ass_id = $row1['ass_id'];
					}
	}else{
		$ass_id = $_GET["ass_id"];	
	}
	///echo "ass_id >>".$ass_id;
?>
	
<form action="cases2.php" method="post" enctype="multipart/form-data" name="service" id="service" onsubmit="return checkFields();">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="1000" height="29"><? include ("menu.php"); ?></td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
    </tr>
    <tr>
      <td height="100%" align="left">
      	<!--insite 1 body-->
      	<fieldset style="width:950px">
      	<legend><img src="images/title_detail.png" width="150" height="47" /></legend>
			<table width="950">
				<tr>
<?php
					$sql="
						SELECT * 
						FROM  `cases` 
						WHERE `case_ID` = '{$case_ID}'
					;";
					$result = mysql_query($sql);
					if($row = mysql_fetch_array($result)) {
?>
						<td width="50%" valign="top">
							<table width="100%">
								<tr>
									<td width="25%" style="text-align: right;">
										รหัสเรื่อง: 
									</td>
									<td width="5%"></td>
									<td width="70%">
										<?php echo $row["case_ID"]; ?>
									</td>
								</tr>
								<tr>
									<td width="25%" style="text-align: right;">
										หัวเรื่อง: 
									</td>
									<td width="5%"></td>
									<td width="70%">
										<?php echo $row["title"]; ?> 
									</td>
								</tr>
								<tr>
									<td width="25%" style="text-align: right;" valign="top">
										รายละเอียด: 
									</td>
									<td width="5%"></td>
									<td width="70%">
										<textarea style="margin: 2px; height: 163px; width: 308px; resize: none;" disabled><?php echo $row["description"]; ?></textarea>
									</td>
								</tr>
								<tr>
									<td height="25%" align="right" valign="top" class="Gray3">
										เอกสารแนบ :
									</td>
									<td width="5%"></td>
									<td width="70%" align="left">
										<!--<img src="images/plus-icon.png" width="16" height="16" onclick="JavaScript:fncCreateElement();" title="เพิ่มเอกสารแนบ" />-->
										<iframe src="queue_4formupload2.php?cid=<?php echo $case_ID; ?>" style="border:0;"></iframe>
										<br>
										<span id="mySpan"></span> 
									</td>
								</tr>
							</table>
						</td>
<?php
					}
?>
</form>
					<td width="50%" valign="top">
						<table width="100%">
							<tr>
								<td width="25%" style="text-align: right;">
									เจ้าของเรื่อง: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									// query employee
									$strSQL = "SELECT e.ename AS name, e.esurname AS surname 		FROM  cases c INNER JOIN employee  e ON c.admin_id  = e.emp_id  WHERE c.case_ID = '$case_ID' "; 
									$resultQuery = mysql_query($strSQL);
									if($fetchRow = mysql_fetch_array($resultQuery)) {
									echo $fetchRow["name"]." ".$fetchRow["surname"];
									}
?>
								</td>
							</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									แผนก: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql3="
										SELECT * 
										FROM  `section` 
										WHERE `section_id` = '{$row["section_id"]}'
									;";
									$result3 = mysql_query($sql3);
									if($row3 = mysql_fetch_array($result3)) {
										echo $row3["section_detail"]; 
									}
?> 
								</td>
							</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									แจ้งเรื่องโดย: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									//query Employee
								 $strSQL = "SELECT e.ename AS name, e.esurname AS surname 		FROM  cases c INNER JOIN employee  e ON c.create_by  = e.emp_id  WHERE c.case_ID = '$case_ID' "; 
									$resultQuery = mysql_query($strSQL);
									if($fetchRow = mysql_fetch_array($resultQuery)) {
									echo $fetchRow["name"]." ".$fetchRow["surname"];
									}
?>
								</td>
							</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									วันที่แจ้ง: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT *
										FROM  `cases`
										WHERE `cases`.`case_ID` = '{$case_ID}'
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["create_date"]; ;
									}
?>
								</td>
							</tr>

								<tr>
									<td width="25%" style="text-align: right;">
										รับเรื่องโดย: 
									</td>
									<td width="5%"></td>
									<td width="70%">
<?php
									//query Assign
									$sql2="
										SELECT `employee`.`ename`, `employee`.`esurname`
										FROM  `assign`, `employee` 
										WHERE `assign`.`case_ID` = '{$case_ID}'
										AND `assign`.`emp_id` = `employee`.`emp_id`
									;";
									$result2 = mysql_query($sql2);
									while($row2 = mysql_fetch_array($result2)) {
										echo $row2["ename"]." ".$row2["esurname"]."<br/>";
									}
?>
									</td>
								</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									วันที่รับเรื่อง: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT *
										FROM  `cases`
										WHERE `cases`.`case_ID` = '{$case_ID}'
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["work_date"]; ;
									}
?>
								</td>
							</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									IT ที่รับผิดชอบ: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									//query Assign
									$sqlit="SELECT DISTINCT assign_details.del_status AS del,assign_details.emp_id AS emp_id,employee.ename AS ename,employee.esurname AS surname FROM assign_details INNER JOIN employee ON  assign_details.emp_id = employee.emp_id WHERE assign_details.ass_id='$ass_id' "; 
									$resultit = mysql_query($sqlit);
									while($rowit = mysql_fetch_array($resultit)) {
										if($rowit["del"]=="1"){
											echo $rowit["ename"]."  ".$rowit["surname"];?><a href="del_emp.php?emp_id=<?= $rowit['emp_id']?>&cid=<?php echo $case_ID; ?>&ass_id=<?php echo $ass_id; ?>"><div class="link_red" style="float:right;">DELETE</div></a>
											<? echo "<br>";
											}
									}
?>
								</td>
							</tr>

							<tr>
								<td width="25%" style="text-align: right;">
									 
								</td>
								<td width="5%"></td>
								<td width="70%">
								<!-- button  -->
										<? 
										 if($sess_level>1){										
												$strSql2 = "SELECT cases.work_by FROM cases  WHERE cases.case_ID ='$case_ID' AND cases.work_by IS NULL  ";
												$result2 = mysql_query($strSql2);	
												$row2 = mysql_fetch_array($result2);
												//echo "row=> ".$row;
													if($row2 == "") {?>
													<a href="assign.php?cid=<?php echo $case_ID; ?>&ass_id=<?php echo $ass_id; ?>"><img src="images/btn_assign.png" /></a>				
												<?}else{?>
													<a href="queue_proc.php?cid=<?=$case_ID; ?>"><img src="images/btn_work.png" /></a>
												<?}?>
										<?}?>
								<!-- button -->
								</td>
							</tr>
							<tr>
								<td width="25%" style="text-align: right;">
									อุปกรณ์: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT `ws_item`.`name`
										FROM `cases` , `ws_item` , `computer`
										WHERE `cases`.`case_ID` = '{$case_ID}'
										AND `cases`.`wsitem_id` = `ws_item`.`wsitem_id`
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["name"];
									}
?>
								</td>
							</tr>
							<tr>
								<td width="25%" style="text-align: right;">
									Brand: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT `ws_item`.`brand`
										FROM `cases` , `ws_item` , `computer`
										WHERE `cases`.`case_ID` = '{$case_ID}'
										AND `cases`.`wsitem_id` = `ws_item`.`wsitem_id`
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["brand"];
									}
?>
								</td>
							</tr>
							<tr>
								<td width="25%" style="text-align: right;">
									รุ่น: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT `ws_item`.`model`
										FROM `cases` , `ws_item` , `computer`
										WHERE `cases`.`case_ID` = '{$case_ID}'
										AND `cases`.`wsitem_id` = `ws_item`.`wsitem_id`
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["model"];
									}
?>
								</td>
							</tr>
							<tr>
								<td width="25%" style="text-align: right;">
									Serial No.: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT `ws_item`.`serial`
										FROM `cases` , `ws_item` , `computer`
										WHERE `cases`.`case_ID` = '{$case_ID}'
										AND `cases`.`wsitem_id` = `ws_item`.`wsitem_id`
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["serial"];
									}
?>
								</td>
							</tr>
								<!-- add com -->
							<tr>
								<td width="30%" style="text-align: right;">
									รหัสคอมพิวเตอร์: 
								</td>
								<td width="5%"></td>
								<td width="70%">
<?php
									$sql2="
										SELECT `cases`.`com_id`
										FROM `cases` , `ws_item` , `computer`
										WHERE `cases`.`case_ID` = '{$case_ID}'
										AND `cases`.`wsitem_id` = `ws_item`.`wsitem_id`
									;";
									$result2 = mysql_query($sql2);
									if($row2 = mysql_fetch_array($result2)) {
										echo $row2["com_id"];
									}
?>
								</td>
							</tr>

						</table>

					</td>
				</tr>
			</table>
		</fieldset>
	    <!-- insite 1 body end -->
		<!-- start show another two part -->
      		<? 
					$strSql = "SELECT cases.work_by FROM cases WHERE cases.case_ID ='$case_ID' AND cases.work_by IS NULL  ";
					//$strSQL = "SELECT * FROM cases s INNER JOIN assign a ON s.case_ID = a.case_ID INNER JOIN comment c ON c.ass_id = a.ass_id WHERE a.case_ID = '$case_ID'";
					$result = mysql_query($strSql);	
					$row = mysql_fetch_array($result);
						if($row == "") {
				
			?>
      	
      	
      	
		<!--insite 1 body-->
		<fieldset style="width:950px">
			<legend><img src="images/title_step1.png" width="152" height="44" /></legend>
			<table width="950">
<?php
				/*$sql="
					SELECT * 
					FROM  `comment` ,  `assign` 
					WHERE  `assign`.`case_id` =  '{$case_ID}'
					group by `assign`.`ass_id`
				;";*/
			$sql="
					SELECT a.status AS status,c.comment_detail AS comment,c.create_date AS create_date,e.ename AS name,e.esurname AS surname
					FROM cases s
					INNER JOIN assign a ON s.case_ID = a.case_ID
					INNER JOIN comment c ON c.ass_id = a.ass_id
					INNER JOIN employee e ON e.emp_id = c.emp_id
					WHERE s.case_ID =  '{$case_ID}' ORDER BY c.create_date  ASC
				";
				
			//echo $sql;
				$result = mysql_query($sql);
				$_SESSION["i"]=1;
				while ($row = mysql_fetch_array($result)) {
					if($bg == "#FFFFFF") {
						$bg = "#DDECFE";
					} else {
						$bg = "#FFFFFF";
					}
		
?>
	
					<tr background="<?php echo $bg; ?>">
						<td width="5%" valign="top">
							<?=$_SESSION["i"]?>
						</td>
                           <?
                    if($row['status'] ==  "0"){
						$status = "Open";
					}else if($row['status'] ==  "1"){
						$status = "Working";
					}else if($row['status'] ==  "2"){
						$status = "Accept";
					}else{
						$status = "Close";
					}
					//$newDate = date("d-m-Y", strtotime($fetchArray['create_date']));
					?>
						<td width="10%" valign="top">
                        	
							<?=$status; ?>
						</td>
						<td width="45%" valign="top">
							<?php echo $row["comment"]; ?>
						</td>
						<td width="20%" valign="top">
								<?php echo $row["name"]."   ".$row["surname"];?>
						</td>
						<td width="20%" valign="top">
								<?php echo $row["create_date"];?>
						</td>
					</tr>
<?php
					$_SESSION["i"]++;
				}
?>
			</table>
		</fieldset>
		<!-- insite 1 body end -->
		
		<!-- user level is not allow to see this part-->
		<? 
			 if($sess_level !=0){	 ?>
		
      	<!--insite 1 body-->
		<fieldset style="width:950px">
			<legend><img src="images/title_step2.png" width="154" height="43" /></legend>
			<table width="950">
			<!--button  -->
			<? 
					//$strSql = "SELECT cases.work_by FROM cases WHERE cases.case_ID ='$case_ID' AND cases.work_by IS NULL  ";
					$strSQL = "SELECT * FROM cases s INNER JOIN assign a ON s.case_ID = a.case_ID INNER JOIN comment c ON c.ass_id = a.ass_id WHERE a.case_ID = '$case_ID'";
					$result = mysql_query($strSql);	
					$row = mysql_fetch_array($result);
						if($row == "") {
				
			?>
            <!--buton accept and reject -->
            <? 	$strSql2 = "SELECT COUNT(*)  as row
									FROM cases s
									INNER JOIN assign a ON s.case_ID = a.case_ID
									INNER JOIN comment c ON c.ass_id = a.ass_id
									INNER JOIN employee e ON e.emp_id = c.emp_id
									WHERE s.case_ID =  '{$case_ID}'   ";
					$result = mysql_query($strSql2);	
					$row = mysql_fetch_array($result);
				    //echo  "result=>". $row['row'];
				
													if($row["row"]  != 0) {?>
                                                    
				<tr align="center">
					<td width="25%"></td>
					<td width="25%">
						<a href="close_project.php?id=<?=$case_ID?>&ass_id=<?=$ass_id?>" title="ปิดงาน"  onclick="return confirm('คุณต้องการปิดรายการนี้ ใช่หรือไม่ ?')" class="vtip"><img src="images/btn_accept.png" /></a>
					</td>
					<td width="25%">
						<a href="deny_project.php?id=<?=$case_ID?>&ass_id=<?=$ass_id?>" title="แก้ไขงานไม่สำเร็จ"onclick="return confirm('ยกเลิกการแก้ไข?')" class="vtip"><img src="images/btn_reject.png" /></a>
					</td>
					<td width="25%"></td>
				</tr>
                <?}?>
<!--buton accept and reject -->
				<? } ?>
			<!-- button -->
				<tr><td colspan="4" height="30"></td></tr>
				<tr>
					<td colspan="4" align="center">
						<form action="queue_3comments_proc.php" method="POST">
							<table width="90%">
								<tr>
									<td align="right" width="40%">
										ประเภทปัญหาที่พบ: 
									</td>
									<td width="60%">
										<select name="problemtype_id" id="problemtype_id"><?php
											$sql="
												SELECT `problemtype_id`,`detail`
												FROM `problemtype` 
											";
											$result = mysql_query($sql);
											while($row = mysql_fetch_array($result)) {
?>
												<option name="problemtype_id" value="<?php echo $row['problemtype_id'] ?>"
	<?php
													$sql2="
														SELECT `problemtype`.`problemtype_id`
														FROM `cases`, `problemtype`
														WHERE `problemtype`.`problemtype_id` = `cases`.`problemtype_id`
														AND `cases`.`case_ID` = '{$case_ID}'
													;";
													$result2 = mysql_query($sql2);
													if($row2 = mysql_fetch_array($result2)) {
														if( $row["problemtype_id"]==$row2["problemtype_id"] ){
															echo "selected=\"selected\"";
														}
													}
	?>
												>
														<?php echo $row["detail"];?>
												</option>
	<?php
											}
	?>
										</select>
									</td>
								</tr>
								<tr>
									<td align="right">
										รายละเอียด:
									</td>
									<td>
										<textarea name="comment_detail" style="margin: 2px; width: 325px; height: 98px; resize: none;"></textarea>
										<input type="hidden" name="cid" value="<?php echo $case_ID; ?>" />
										<input type="hidden" name="ass_id" value="<?php echo $ass_id; ?>" />
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" value="บันทึก"  />
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</fieldset>
		<!-- insite 1 body end -->
	<? }?><!-- user level is not allow to see this part -->
      
	  <? } ?><!-- end show another two part -->
      </td>
    </tr>
  </table>

</body>
</html>
