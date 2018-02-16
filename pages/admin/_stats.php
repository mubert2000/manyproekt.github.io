
<center><h1><span>Статистика</span></h1></center>


<?php
$db->Query("SELECT * FROM db_users");
$us = $db->NumRows();
?>

<table width="450" border="0" align="center">
  <tr class="htt">
    <td><b>Зарегистрировано пользователей:</b></td>
	<td width="100" align="center"><?=$us; ?> чел.</td>
  </tr>
  

  
</table>


