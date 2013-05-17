<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
	<form action="MySQLSave.php" name="frmMain" method="post" target="iframe_target">
	<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
	<script language="JavaScript">
		function showResult(result)
		{
			if(result==1)
			{
				document.getElementById("divResult").innerHTML = "<font color=green> Save successfully! </font>  <br>";
			}
			else
			{
				document.getElementById("divResult").innerHTML = "<font color=red> Error!! Cannot save data </font> <br>";
			}
		}
	</script>
	<div id="divResult"></div>
	<table width="320" border="1">
		<th>CustomerID </th>
		<td><input type="text" name="txtCustomerID" size="5"></td>
		</tr>
	  <tr>
	  <tr>
		<th>Name </th>
		<td><input type="text" name="txtName" size="20"></td>
		</tr>
	  <tr>
		<th>Email </th>
		<td><input type="text" name="txtEmail" size="20"></td>
		</tr>
	  <tr>
		<th>CountryCode </th>
		<td><input type="text" name="txtCountryCode" size="2"></td>
		</tr>
	  <tr>
		<th>Budget </th>
		<td><input type="text" name="txtBudget" size="5"></td>
		</tr>
	  <tr>
		<th>Used </th>
		<td><input type="text" name="txtUsed" size="5"></td>
		</tr>
	  </table>
	  <input type="submit" name="submit" value="submit">
	  </form>
</body>
</html>
