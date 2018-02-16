
<center><h1><span>Накрутка статистики</span></h1></center>

<center>
<table align="center">

 <?    
 if(isset($_POST['user'])) {
   $user = intval($_POST['user']);
   $vivod = floatval($_POST['vivod']);
   $pay = floatval($_POST['pay']);
   $qiwi = floatval($_POST['qiwi']);
   
   $db->Query("UPDATE db_fake SET user = '$user', vivod = '$vivod', pay = '$pay', qiwi = '$qiwi',online='".$_POST['online']."' WHERE id = 1"); 
   echo 'Настройки сохранены';
 }
 
 
   $db->Query("SELECT * FROM db_fake WHERE id = 1"); 
   $fake = $db->FetchArray();
 ?>

   <form method="post" action="">
  <tr>
     <td>Пользователей добавить</td>
     <td><input type="text" name="user" value="<?=$fake['user']; ?>"></td>
  </tr>   
  
  <tr>
     <td>Выплачено добавить</td>
     <td><input type="text" name="vivod" value="<?=$fake['vivod']; ?>"></td>
  </tr>
  
  <tr>
     <td>Пополнено добавить</td>
     <td><input type="text" name="pay" value="<?=$fake['pay']; ?>"></td>
  </tr>
  
   <tr>
     <td>Изменить QIWI</td>
     <td><input type="text" name="qiwi" value="<?=$fake['qiwi']; ?>"></td>
  </tr>
  
  <tr>
     <td>Онлайн пользователи</td>
     <td><input type="text" name="online" value="<?=$fake['online']; ?>"></td>
  </tr>
  <br>
  <tr>
     <td></td>
    <td><br><input type="submit" value="Сохранить"></td>
  </tr>
    </form>
  
</table>

</center>

<br>
