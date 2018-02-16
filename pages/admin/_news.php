
<center><h1><span>Новости</span></h1></center>


<?php
if (isset($_POST['text'])) {
$text = $_POST['text'];
$title = $_POST['title'];
$date = time();

$types     = array(
        '.jpg',
        '.JPG',
        '.jpeg',
        '.gif',
        '.png'
    ); //поддерживаемые форматы загружаемых файлов
	
	 $fname     = $_FILES['filename']['name'];
	//$fname = md5($fname);
    $ext       = substr($fname, strpos($fname, '.'), strlen($fname) - 1); //определяем тип загружаемого файла
	
	
   if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }
   
   //проверка на соответствие формата
    if (!in_array($ext, $types)) {
        $f_err++;
        $mess = '<p style="color:red;">Загружаемый файл не является картинкой</p>';
    }
	
	
	 
   
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
	 $rand = rand(1, 999999999999999999999999999999999);
	 $n = md5($_FILES["filename"].'+'.$rand);
	 $new_name     = $n . $ext;
     move_uploaded_file($_FILES["filename"]["tmp_name"], "img_download/news/".$new_name);
   } 

$qwe = $db->Query("INSERT INTO db_news (date,title,text, img) VALUES ('$date','$title','$text', '$new_name')");
echo "Новость добавлена";

}

if(isset($_POST['id'])) {
$id = $_POST['id'];
$asd = $db->Query("DELETE FROM db_news WHERE id = $id");
echo "Удалена новость №".$id;
}
?>
<center>
<form method="post" action="" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Заголовок">
<br>
<textarea name="text" rows="7" cols="40">Текст новости</textarea><br>
 Файл изображения: <input type="file" name="filename" /><br>
<input type="submit" value="Добавить новость">
</form>
</center>


<section class="otzivs">
<?
$con = $db->Query("SELECT * FROM db_news ORDER BY id DESC");
while($c = $db->FetchArray()) {
$date = date("d-M-y", $c['date']);
?>
<aside style="padding: 5px 0 30px;">

    <div class="item">
        <div class="dates">
            <div class="date input"><?=date("d",$c["date"]); ?>.<?=date("m",$c["date"]); ?>.<?=date("y",$c["date"]); ?>&nbsp;<?=date("H:i",$c["date"]); ?></div>
        </div>
        <div class="text" style="width: 920px; margin-top:15px;word-wrap: break-word;">
            <?if($c['img'] != '') {?>
            <a href="/img_download/news/<?=$c['img']; ?>" target="_blank"><img src="/img_download/news/<?=$c['img']; ?>" width="400"></a>
            <? } ?>
            <h3><?=$c['title']; ?></h3>
            <div><strong><?=$c['text']; ?></strong></div>
            
            <form method="post" action="">
                <input type="hidden" name="id" value="<?=$c['id']; ?>">
                <input type="submit" value="Удалить">
            </form>
        </div>
    </div> 	
</aside>
<? } ?>
</section>