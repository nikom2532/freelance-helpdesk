<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="129" align="right" valign="bottom" background="images/headder.png"><table width="550" height="66" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="162" height="49" align="center" class="link_yellow"><a href="user_main.php" onmouseover="pic4.src='images/menu_index3.png'"  onmouseout="pic4.src='images/menu_index1.png'" ><img src="images/menu_index1.png" name="pic4" border=0></a></td>
        <td width="190" align="center" class="link_yellow"><a href="cases.php" onmouseover="pic3.src='images/menu_case3.png'"  onmouseout="pic3.src='images/menu_case1.png'" ><img src="images/menu_case1.png" name="pic3" border=0></a></td>
        <td width="165" align="center" class="link_yellow"><a href="search.php" onmouseover="pic2.src='images/menu_search3.png'"  onmouseout="pic2.src='images/menu_search1.png'" ><img src="images/menu_search1.png" name="pic2" border=0></a></td>
        <td width="158" align="center" class="link_yellow"><a href="queue.php"  onmouseover="pic1.src='images/menu_queue3.png'"  onmouseout="pic1.src='images/menu_queue1.png'" ><img src="images/menu_queue1.png" name="pic1" border=0></a></td>
        <?  if($sess_level==3){
			 echo "<td width='173' align='center' class='link_none'><a href='admin/member_list.php'  onmouseover='pic0.src=\"images/menu_manage3.png\"'  onmouseout='pic0.src=\"images/menu_manage1.png\"' ><img src='images/menu_manage1.png' name='pic0' border=0></a></td>";
			}
			?>
        <td width="152" align="center" class="link_yellow"><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบ ใช่หรือไม่ ?')"  onmouseover="pic.src='images/menu_logout3.png'"  onmouseout="pic.src='images/menu_logout1.png'" ><img src="images/menu_logout1.png" name="pic" border=0></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
