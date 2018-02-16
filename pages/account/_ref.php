<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$logn = $balance['login'];
?>

<center><h1><span>Вклады</span></h1></center>

<center>


<div class="main_news_title">Ваша реферальная ссылка: <font color="#5CACEE">http://<?php echo $_SERVER['HTTP_HOST']; ?>/?ref=<?php echo $user_id; ?></font></div>





<?php
$db->Query("SELECT * FROM db_users WHERE refer = '$user_id'");
$col = $db->NumRows();
?>


Всего рефералов: <font color="#5CACEE"><?php echo $col; ?></font>
<br>
Получено с рефералов: <font color="#5CACEE"><?php echo $balance['ref_sum']; ?> Pуб</font>




</center>