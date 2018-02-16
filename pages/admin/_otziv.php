<?PHP
######################################

$_OPTIMIZATION["title"] = "Отзывы";
$_OPTIMIZATION["description"] = "Отзывы проекта";
$_OPTIMIZATION["keywords"] = "Отзывы нашего проекта";
?>

<center><h1><span>Отзывы</span></h1></center>


<section class="otzivs">
<?PHP

if(isset($_POST['add'])) {
$add = intval($_POST['add']);
$db->Query("UPDATE db_otziv SET status = 1 WHERE id = '$add'");

}

if(isset($_POST['dell'])) {
$dell = intval($_POST['dell']);
$db->Query("DELETE FROM db_otziv WHERE id = '$dell'");

}

$db->Query("SELECT * FROM db_otziv WHERE status = 0 ORDER BY id DESC");

if($db->NumRows() > 0){
	while($otziv = $db->FetchArray()){
?>
<aside style="padding: 5px 0 30px;">
    <div class="item">
        <div class="dates">
            <div class="date input"><?=date("d",$otziv["date"]); ?>.<?=date("m",$otziv["date"]); ?>.<?=date("y",$otziv["date"]); ?>&nbsp;<?=date("H:i",$otziv["date"]); ?></div>
        </div>
        <div class="text" style="width: 920px; margin-top:15px;word-wrap: break-word;">
            <?if($otziv['img'] != '') {?>
            <a href="/img_download/otziv/<?=$otziv['img']; ?>" target="_blank"><img src="/img_download/otziv/<?=$otziv['img']; ?>" width="400"></a>
            <? } ?>
            <h3><?=$otziv['name']; ?></h3>
            <div><strong><?=$otziv['text']; ?></strong></div>
            <table>
				<tr>
					<form method="post" action="">
						<td>
							<input type="hidden" name="add" value="<?=$otziv['id']; ?>">
							<input type="submit" value="Одобрить">
						</td>
					</form>
					<form method="post" action="">
						<td>
							<input type="hidden" name="dell" value="<?=$otziv['id']; ?>">
							<input type="submit" value="Удалить">
						</td>
					</form>
				</tr>
			</table>
        </div>
    </div>
</aside>
<?PHP
}
}else echo "<center>Отзывов нет :(</center>";
?>
</section>