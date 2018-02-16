<center><h1><span>Техническая поддержка</span></h1></center>

<?
if(isset($_GET['id'])) {
$id = intval($_GET['id']);
$db->Query("SELECT * FROM db_sup WHERE id = '$id'");
$q = $db->FetchArray();
if(isset($_POST['otvet'])) {
$uid = intval($_POST['uid']);
$otvet = $db->RealEscape($_POST['otvet']);
$date = time();
if(!empty($otvet)) {
$db->Query("INSERT INTO db_sup_text (id_tik, user_id, login, text, date) VALUES ('$id', '$uid', 'Администрация', '$otvet', '$date')");
echo '<center><font color="green">Ваше сообщение отправлено</font></center>';
Header("Refresh: 1, /admin/sup/id/".$id."");
}else echo '<center><font color="red">Введите текст ответа</font></center>';
}




$db->Query("SELECT * FROM db_sup_text WHERE id_tik = '$id' ORDER BY id DESC");
if($db->NumRows() == 0) {
echo '<center><font color="red">Тикета не существует</font></center>';
}else{

?>





<section class="otzivs">

<?
while($sup = $db->FetchArray()) {
?>
<aside style="float: left;padding: 5px 0 30px;">

	<div class="item">
                <div class="dates">

                <div class="date input"><?=date("d",$sup["date"]); ?>.<?=date("m",$sup["date"]); ?>.<?=date("y",$sup["date"]); ?>&nbsp;<?=date("H:i",$sup["date"]); ?></div>

                <div class="text" style="width: 920px; margin-top:15px;word-wrap: break-word;">

                    <div class="otz_log"><?=$sup['login']; ?></div>

                    <div class="otz_txt"><?=$sup['text']; ?></div>

                </div>

                </div>
    </div> 	
			
</aside> 
<? } ?>

</section>
<center>

<h3>Написать ответ</h3>
<form method="post" action="">
<textarea name="otvet" rows="5" cols="50"></textarea><br>
<input type="hidden" name="uid" value="<?=$q['user_id']; ?>">
<input type="submit" value="Отправить">
</form>
</center>

<?
}

return;
}

?>



<div id="res1dfr78"></div>
     <div class="ptable four"> <!--four задает ширину для суммы -->
        <div class="row main">


			<div class="tarif">ID заявки</div>
            <div class="stat" style="width:200px;">Название</div>
            <div class="nachi">Статус</div>
			<div class="stat" style="width:100px;">Действие</div>
        </div><div class="row">

<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
<?
if(isset($_POST['close'])) {
$close = intval($_POST['close']);
$db->Query("UPDATE db_sup SET status = 1 WHERE id = '$close'");
}
$db->Query("SELECT * FROM db_sup ORDER BY status ASC");
while($sup = $db->FetchArray()) {
if($sup['status'] == 0) {$status = 'Открытый';}elseif($sup['status'] == 1) {$status = 'Закрытый';}
?>


<tr>
<div class="tarif"><?=$sup['id']; ?></div>



<?
if($sup['status'] == 0) {
?>


<div class="stat" style="width:200px;"><a  href="/admin/sup/id/<?=$sup['id'];?>"><font style="font-weight: bold; text-decoration:none;" color="green"><?=$sup['title']; ?></font></a></div>

<? } else { ?>

<div class="stat" style="width:200px;"><a href="/admin/sup/id/<?=$sup['id'];?>"><?=$sup['title']; ?></a></div>

<? } ?>


<div class="nachi"><?=$status; ?></div>
<div class="stat" style="width:100px;">

<?
if($sup['status'] == 0) {
?>
<form method="post" action="">
<input type="hidden" name="close" value="<?=$sup['id']; ?>">
<input type="submit" value="Закрыть тикет">
</form><? } ?></div>
</tr>
<? } ?>
</table>


