<?
ob_start();
function Conn2DB() {
	$ServerName = "localhost";
	$UserName = "buildthe_hDesk";
	$Password = "hDesk";
	$DatabaseName = "buildthe_hDesk";
   
	$conn = mysql_connect($ServerName,$UserName,$Password) or die("�Դ��Ͱҹ����������� !");
   	mysql_select_db($DatabaseName,$conn) or die("<H3>���͡�ҹ������ MySQL ����� !</H3>");
	mysql_query("SET NAMES TIS620");
	#mysql_query("SET NAMES UTF8");
   	}
	
function CloseDB(){
			mysql_close();
} 

function RunID($num){ // Run Number ��������ͧ�ͧ Case
			if($num<=8){
						return $num="0000".($num+1);
			}else if($num>=9 && $num<=98){
						return $num="000".($num+1);
			}else if($num>=99 && $num<=998){
						return $num="00".($num+1);
			}else if($num>=999 && $num<=9998){
						return $num="0".($num+1);
			}else if($num>=9999){
						return $num=($num+1);
			}
}   

function Level($a){
			switch($a){
			case 1:
					return $a="�����ҹ�����";
					break;
			case 2:
					return $a="������";
					break;
			case 3:
					return $a="Administrator";
					break;
			}
}
	 
function Access($level){
		if($level<2){
						$a="<script> alert('�س������Է��������ҹ  Function �����');location.href='../user_main.php';</script>  ";
		return  $a;
		}
}
ob_end_flush();
?>

