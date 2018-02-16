<?PHP
######################################

$_OPTIMIZATION["title"] = "Отзывы";
$_OPTIMIZATION["description"] = "Отзывы проекта";
$_OPTIMIZATION["keywords"] = "Отзывы нашего проекта";
?>

<h1 class="otz" style="text-align:center;"><span class="poloska">Отзывы</span></h1>


<?PHP 
if (!isset($_SESSION['login'])) {
echo '<center><font color="red">Для добавления отзыва необходимо авторизоваться!</font></center><br><br>';
} else {
?>
<div style="margin:-30px 0 30px;">
<center>
    <h2>Оставить отзыв</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <table style="margin:0 auto;">
            <tr>
                <td align="center">
                    <textarea rows="5" cols="50" name="text" style="max-width:500px;"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Скрин(Не обязательно):
                    <input type="file" name="filename" id="filename" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" style="margin-top:10px;" class="input" value="Добавить"></td>
            </tr>
        </table>
    </form>
</center>
</div>
<? } ?>


<?PHP

if(isset($_POST['text'])) {
$text = $db->RealEscape($_POST['text']);

if(isset($_SESSION['login'])) {
if(!empty($text)) {
$login = $_SESSION['login'];
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
	 $rand = rand(1, 9999999999999999999);
	 $n = md5($_FILES["filename"].'+'.$login);
	 $new_name     = $n . $ext;
     move_uploaded_file($_FILES["filename"]["tmp_name"], "img_download/otziv/".$new_name);
   } 
$db->Query("INSERT INTO db_otziv (name, date, text, status, img) VALUES ('$login', '$date', '$text', 0, '$new_name')");
echo '<center><font color="green">Ваш отзыв успешно добавлен и появится после проверки модератором на наличие соблюдения правил!</font></center>';
}else echo '<center><font color="red">Введите текст отзыва!</font></center>';
}else echo '<center><font color="red">Для добавления отзыва необходимо авторизоваться!</font></center>';
}

?> 

<section class="otzivs scontent">

<?PHP 
$db->Query("SELECT * FROM db_otziv WHERE status = 1 ORDER BY id DESC");
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
        </div>
    </div>
</aside>
<?PHP 
}
}else { echo "<center>Отзывов нет :(</center>"; }
?> 
</section>