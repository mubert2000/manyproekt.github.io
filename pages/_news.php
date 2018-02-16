<?PHP
######################################

$_OPTIMIZATION["title"] = "Новости";
$_OPTIMIZATION["description"] = "Новости проекта";
$_OPTIMIZATION["keywords"] = "Новости нашего проекта";
?>

<h1 class="otz" style="text-align:center;"><span class="poloska">Новости</span></h1>



<section class="otzivs scontent">
<?PHP

$db->Query("SELECT * FROM db_news ORDER BY id DESC");

if($db->NumRows() > 0){

	while($news = $db->FetchArray()){
	
	?>

<aside style="padding: 5px 0 30px;">
    <div class="item">
        <div class="dates">
            <div class="date input"><?=date("d",$news["date"]); ?>.<?=date("m",$news["date"]); ?>.<?=date("y",$news["date"]); ?>&nbsp;<?=date("H:i",$news["date"]); ?></div>
        </div>
        <div class="text" style="width: 920px; margin-top:15px;word-wrap: break-word;">
            <?if($news['img'] != '') {?>
            <a href="/img_download/news/<?=$news['img']; ?>" target="_blank"><img src="/img_download/news/<?=$news['img']; ?>" width="400"></a>
            <? } ?>
            <h3><?=$news['title']; ?></h3>
            <div><strong><?=$news['text']; ?></strong></div>
        </div>
    </div> 	
</aside>
	<?PHP
	
	}

}else echo "<center>Новостей нет :(</center>";

?>
</section>

