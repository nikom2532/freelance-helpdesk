<?
ob_start();
include "checksession.php";
$cid=$_GET['cid'];
echo "cid".$cid;


include "inc/FunctionDB.php";
Conn2DB();

$sql="SELECT ws.wsitem_id AS item_id, ws.name AS name , ws.model AS model, ws.brand AS brand , ws.serial AS serial FROM ws_item ws INNER JOIN computer c ON ws.com_id =  c.com_id WHERE c.com_id = '$cid' ";
$result=mysql_query($sql);
?>
<select name="ws_item">
 <option>------------------กรุณาเลือก--------------------</option>
  <? while($row=mysql_fetch_array($result)) { ?>
    <option value=<?=$row['item_id']?>><?=$row['name']?> - <?=$row['model']?> - <?=$row['brand']?> - <?=$row['serial']?></option>
  <? } ?>
</select>