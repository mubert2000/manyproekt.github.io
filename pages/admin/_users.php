<center><h1><span>Список пользователей проекта</span></h1></center>
<?


if (isset($_POST['dell'])) {
$idd = intval($_POST['dell']);
$db->Query("DELETE FROM db_users WHERE id = '$idd'");
echo "<center><font color = 'green'><b>Пользователь удален! </b></font></center>";
}

if(isset($_POST['ref_perc'])) {
$sum_p = intval($_POST['sum']);
$id = intval($_POST['ref_perc']);

$db->Query("UPDATE db_users SET ref_perc = '$sum_p' WHERE id = '$id'");
echo '<center><font color = "green"><b>Реф процент установлен успешно!! </b></font></center>';
}

?>
<center>
<h3>Поиск пользователя по логину</h3>
<form method="post" action="">
<input type="text" name="ser"><br>
<input type="submit" value="Найти">
</form>
</center><br>
<div id="res1dfr78"></div>
     <div class="ptable four"> <!--four задает ширину для суммы -->
        <div class="row main">
           <div class="date">Логин</div>
			<div class="tarif">Дата регистрации</div>
            <div class="stat">Баланс</div>
            
            <div class="nachi">Удалить</div>
        </div><div class="row">

<?
$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 10;
if(isset($_POST['ser'])) {
$login = $db->RealEscape($_POST['ser']);
$db->Query("SELECT * FROM db_users WHERE login = '$login' LIMIT {$lim}, 10");
}else{
$db->Query("SELECT * FROM db_users ORDER BY id DESC LIMIT {$lim}, 10");
}
while($ins = $db->FetchArray() ) {


?>


<tr>

<div class="date"><?php echo $ins['login']; ?></div>
<div class="tarif"><?php echo date("d.m.Y", $ins['date_reg']); ?></div>
<div class="stat"><?php echo $ins['money_out']; ?></div>

<div class="nachi">
<form method="post" action="">
<input type="hidden" name="dell" value="<?=$ins['id']; ?>">
<input type="submit" value="Удалить">
</form>
<br>
<form method="post" action="">
<input type="hidden" name="ref_perc" value="<?=$ins['id']; ?>">
<input type="text" name="sum" value="">
<input type="submit" value="Установить реф.проц">
</form>
<br><hr><br>
</div>


</tr>




<? } ?>
</table>
</div>
<?
if(!isset($_POST['ser'])) {
$db->Query("SELECT COUNT(*) FROM db_users");
$all_pages = $db->FetchRow();

	if($all_pages > 10){
	
	$sort_b = (isset($_GET["sort"])) ? intval($_GET["sort"]) : 0;
	
	$nav = new navigator;
	$page = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"])) : 1;
	
	echo "<BR /><center>".$nav->Navigation(10, $page, ceil($all_pages / 10), "/index.php?menu=admin&sel=users&page="), "</center>";
	
	}
}
?>

<br>