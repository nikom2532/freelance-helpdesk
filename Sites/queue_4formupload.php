<?php 
include ("checksession.php");
include ("inc/FunctionDB.php");
Conn2DB();

$case_ID = $_GET["cid"];
$sql="
	SELECT `attachments`
	FROM  `cases`
	WHERE `case_ID` = '{$case_ID}'
;";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row["attachments"] == "" || $row["attachments"] == NULL ){
?>
	<form enctype="multipart/form-data" action="queue_5upload.php" method="POST">
		Please choose a file: <input name="uploaded" type="file" /><br />
		<input type="hidden" name="cid" value="<?php echo $case_ID; ?>" />
		<input type="submit" value="Upload" />
	</form>
<?php
}
else{
	echo "The File: \"<a href=\"./queue_upload/{$row["attachments"]}\" target=\"_blank\">{$row["attachments"]}</a>\" has been uploaded"; 
} 

//if()
?>
