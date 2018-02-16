
<center><h1><span>Запрос выплат</span></h1></center>
<?
if (isset($_POST['oid'])) {
$batch = $_POST['batch'];
$old = $_POST['oid'];
$us_id = $_POST['id_user'];
$summa = $_POST['summa'];

$db->Query("UPDATE db_vivod SET status = 1 WHERE id = '$old'");
$db->Query("UPDATE db_stats SET vivod = vivod + '$summa' WHERE id = 1");
echo "<center><font color = 'green'><b>Отправлено! </b></font></center>";
}

if (isset($_POST['idd'])) {
$idd = $_POST['idd'];
$db->Query("UPDATE db_vivod SET status = 3 WHERE id = '$idd'");
echo "<center><font color = 'green'><b>Отказано! </b></font></center>";
}

?>
<div id="res1dfr78"></div>
     <div class="ptable four"> <!--four задает ширину для суммы -->
        <div class="row main">
           <div class="date">Логин</div>
			<div class="tarif">Сумма</div>
            <div class="stat" style="width:200px;">Кошелек</div>
            <div class="nachi">Статус</div>
        </div><div class="row">
<?
$db->Query("SELECT * FROM db_vivod WHERE status = 0");
while($ins = $db->FetchArray() ) {
$id = $ins['id'];
$login = $ins['login'];
$user_id = $ins['user_id'];
$batch = $ins['batch'];
$date = $ins['date'];
$summa = $ins['summa'];

?>

<table align="center" style="margin-top:2px;" cellpadding="5px" cellspacing="5px">
<tr>

<div class="date"><?php echo $login; ?> </div>
<div class="tarif"><?php echo $summa; ?> </div>
<div class="stat" style="width:200px;">

<form action="" method="post" style="margin:0;padding:0">
<input type="hidden" name="oid" value="<?=$id; ?>">
<input type="hidden" name="id_user" value="<?=$user_id; ?>">
<input type="hidden" name="summa" value="<?=$summa; ?>">



<?=$batch; ?>


 </div>
<div class="nachi">


<input type="submit" value="Выплатить">

</div>
</tr>
</form>
</table>

<? } ?>
</div>


