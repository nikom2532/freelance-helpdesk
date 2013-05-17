<? 
include ("inc/FunctionDB.php");

Conn2DB();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>:: Helpdesk ::</title>

<script language="JavaScript">
function checkFields() {
missinginfo = "";
if (document.login.user_login.value == "") {
				alert("กรุณาใส่ \"Username\" ด้วยค่ะ");
				document.login.user_login.focus();
				return false;
}else if (document.login.pass_login.value ==""){
				alert("กรุณาใส่ \"Password\" ด้วยค่ะ");
				document.login.pass_login.focus();
				return false;
				}
}
</script>
<body class="loginBg">
 <div class="wrapLeft">
   <?php
			  	$strSQL = "SELECT create_date AS cDate, news_title AS title , news_detail AS detail FROM news  	WHERE  isused = 'T' ORDER BY create_date DESC";
				$result = mysql_query($strSQL);
			
				 while($fetchArray=mysql_fetch_array($result)){

				?>	 <div class="head-news"><? echo date('F d, Y h:mA', strtotime($fetchArray['cDate']))?></div>

						<div class="content-news">
										<? echo $fetchArray['detail']; ?>
                           </div>
				
				
					
				
				<? }?>
 
 
 </div>
             
             <div class="wrapRight">
             <ul  id="login-style">
             <form  name="login" method="POST" action="checkmember.php" onSubmit="return checkFields();">

                  <li><span class="Yellow">Username  : </span> <input type="text" name="user_login" id="user_login" style="background-color:#FFFFCC"  ></li>

                  <li>&nbsp;<span class="Yellow">Password  :  </span> <input type="password" name="pass_login" id="pass_login" style="background-color:#FFFFCC" ></li>
                  <li> <input name="Submit" type="image" value="Submit" src="images/login.png" /></li>
                  <li> Ver.1_2012</li>
  
        </form>
        </ul>
        </div>
</body>
</html>
