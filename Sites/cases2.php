<?
ob_start();
include "checksession.php";

$title=$_POST['title'];
$description=$_POST['description'];
$wsitem_id=$_POST['ws_item'];
$model=$_POST['model'];
$create_by=$_POST['create_by'];
$emp_id=$_POST['emp_id'];
$department_id=$_POST['department_id'];
$com_id=$_POST['com_id'];
$date=date('Y-m-d H:i:s'); 

//echo "com_id".$com_id;
//echo "wsitem_id".$wsitem_id;

include "inc/FunctionDB.php";
Conn2DB();

$sql="SELECT * FROM cases ";
$query=mysql_query($sql);
$num=mysql_num_rows($query);

$case_id=date('Y').RunID($num); //insert id from Function RunID


$file=$_FILES;
foreach($file as $key => $value)
{
	$path="upload/".$case_id.$_FILES[$key]['name'];
	if(!empty($_FILES[$key]['name']))
	{
		$att .= $case_id.$_FILES[$key]['name'].',';
	}
	// copy($_FILES[$key]['tmp_name'], $path);
}


$target = "queue_upload/"; 
$target = $target.basename( $_FILES['uploaded']['name']) ; 
$ok=1; 

$typepath = $_POST['filetype'];

//This is our size condition 
if ($uploaded_size > 350000) 
{ 
	echo "Your file is too large.<br>"; 
	$ok=0; 
} 

//This is our limit file type condition 
if ($uploaded_type =="text/php") 
{ 
	echo "No PHP files<br>"; 
	$ok=0; 
} 

//Here we check that $ok was not set to 0 by an error 
if ($ok==0) 
{ 
	Echo "Sorry your file was not uploaded"; 
} 

//If everything is ok we try to upload it 
else 
{ 
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
      {
		$att = basename( $_FILES['uploaded']['name']);
		chmod($target, 0777);
		// echo "The File: \"". basename( $_FILES['uploaded']['name']). "\" has been uploaded";
		//header("location: queue_4formupload.php?cid={$case_ID}"); 
	}
	else{ 
		//echo "Sorry, there was a problem uploading your file."; 
	} 
} 



$att = basename( $_FILES['uploaded']['name']);



$strSQL="INSERT INTO cases(case_id,create_by,section_id,admin_id,com_id,wsitem_id,title,description,attachments,issused,create_date,update_date) ";
$strSQL.="VALUES('$case_id','$sess_empid','$department_id','$emp_id','$com_id','$wsitem_id','$title','$description','$att','0','$date','$date')";
$cmdQuery=mysql_query($strSQL);

	if($cmdQuery){
		echo "<script>";
		echo "alert('แจ้งเหตุขัดข้องเรียบร้อยครับ รหัสของคุณคือ : ".$case_id." '); ";
		echo "location.href='cases.php'; ";
		echo "</script>";
	}else{
		echo "<script>";
		echo "alert('ไม่สามารถแจ้งเหตุขัดข้องได้!'); ";
		echo "location.href='cases.php'; ";
		echo "</script>"; 
		#echo "???????๖????????????";	
		#echo "<P>".mysql_error();
	}
ob_end_flush();
?>