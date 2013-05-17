<?
@session_start();

$sess_id=$_SESSION[sess_id];
$sess_empid=$_SESSION[sess_empid]; 
$sess_ename=$_SESSION[sess_ename];
$sess_esurname=$_SESSION[sess_esurname];
$sess_level=$_SESSION[sess_level];

if ($sess_id<>session_id() or $sess_ename=="") {
	header( "Location: index.php"); 	
	exit();
} 


?>