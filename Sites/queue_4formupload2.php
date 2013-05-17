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
	No file attachment
<?php
}
else{
	echo "Download File here: \"<a href=\"./queue_upload/{$row["attachments"]}\" target=\"_blank\">{$row["attachments"]}</a>\" "; 
} 

//if()
?>
