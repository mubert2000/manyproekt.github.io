<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$logn = $balance['login'];
?>

<center><h1><span>Техническая поддержка</span></h1></center>
<center>
<table align="center">
    <tr>
        <td><a class="input" href="/account/sup"> <font color="#fff">Мои тикеты</font></a></td>
        <td><a class="input" href="/account/sup/new"> <font color="#fff">Создать тикет</font></a></td>
    </tr>
</table>
</center>
<br>

<?
if(isset($_GET['new'])) {
if (isset($_POST['title'])) {
 $title = $db->RealEscape($_POST['title']);
 $text = $db->RealEscape($_POST['text']);
 //'$text = iconv("utf-8", "windows-1251",$text);
 //$title = iconv("utf-8", "windows-1251",$title);
 $date = time();
 if(!empty($title)) {
	if(!empty($text)) {
		$db->Query("INSERT INTO db_sup (user_id, login, title, text, status) VALUES ('$user_id', '$logn', '$title', '$text', '0')");
		$lid = $db->LastInsert();
		$db->Query("INSERT INTO db_sup_text (id_tik, user_id, login, text, date) VALUES ('$lid', '$user_id', '$logn', '$text', '$date')");
		echo '<center><font color="green">Отправлено! Ожидайте ответа!</font></center>';
        exit("<html><head><meta    http-equiv='Refresh' content='2;    URL=/account/sup'></head></html>");
	}else echo '<center><font color="red">Введите текст обращения!</font></center>';
 }else echo '<center><font color="red">Введите тему обращения!</font></center>';

}?>
<center>
<br>
<form method="post" action="">
<table align="center">
<tr>
<td>Тема: </td><td><input type="text" name="title" value=""></td>
</tr>
<tr>

<td>Текст: </td><td><textarea name="text" rows="5" cols="50"></textarea></td>



</tr>

<tr><td colspan="2"> <center><input type="submit" class="input" value="Отправить"></td></tr></center>

</table>

</form></center>

<?

return;

}

?>



<?

if(isset($_GET['id'])) {



$id = intval($_GET['id']);

$db->Query("SELECT * FROM db_sup WHERE id = '$id'");

$q = $db->FetchArray();

if(isset($_POST['otvet'])) {

$otvet = $db->RealEscape($_POST['otvet']);

$date = time();

if(!empty($otvet)) {

$db->Query("INSERT INTO db_sup_text (id_tik, user_id, login, text, date) VALUES ('$id', '$user_id', '$logn', '$otvet', '$date')");

echo '<center><font color="green">Ваше сообщение отправлено</font></center>';

exit("<html><head><meta    http-equiv='Refresh' content='1;    URL=/account/sup/id/".$id."'></head></html>");

}else echo '<center><font color="red">Введите текст ответа</font></center>';

}



$db->Query("SELECT * FROM db_sup_text WHERE id_tik = '$id' AND user_id = '$user_id' ORDER BY id DESC");

if($db->NumRows() == 0) {

echo '<center><font color="red">Тикета не существует</font></center>';

}else{



?>


<section class="otzivs">

<? while($sup = $db->FetchArray()) { ?>

     <aside style="float: left;padding: 5px 0 30px;">

	<div class="item">
                <div class="dates">
                    <div class="date input"><?=date("d",$sup["date"]); ?>.<?=date("m",$sup["date"]); ?>.<?=date("y",$sup["date"]); ?>&nbsp;<?=date("H:i",$sup["date"]); ?></div>
                </div>
                <div class="text" style="width: 920px; margin-top:15px;word-wrap: break-word;">
                    <div class="otz_log"><?=$sup['login']; ?></div>
                    <div class="otz_txt"><?=$sup['text']; ?></div>
                </div>
    </div> 	

</aside> 

<? } ?>
</section>


<?

if($q['status'] == 0) {

?>

<center>

<h3>Написать ответ</h3>

<form method="post" action="">

<textarea name="otvet" rows="5" cols="50"></textarea><br><br>

<input type="submit" value="Отправить" >



</form>

</center>



<?

}

}



return;

}



?>

<div id="res1dfr78"></div>

     <div class="ptable four"> <!--four задает ширину для суммы -->

        <div class="row main">





			<div class="tarif">Id заявки</div>

            <div class="stat" style="width:200px;">Название</div>

            <div class="nachi">Статус</div>

        </div><div class="row">

		





<?

$db->Query("SELECT * FROM db_sup WHERE user_id = '$user_id' ORDER BY status ASC");

while($sup = $db->FetchArray()) {

if($sup['status'] == 0) {$status = 'Открытый';}elseif($sup['status'] == 1) {$status = 'Закрытый';}

?>



<div class="tarif"><?=$sup['id']; ?></div>

<div class="stat" style="width:200px;"><a href="/account/sup/id/<?=$sup['id'];?>"><?=$sup['title']; ?></a></div>

<div class="nachi"><?=$status; ?></div>



<? } ?>

</div>




</div>