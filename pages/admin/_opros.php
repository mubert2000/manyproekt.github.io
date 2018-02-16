<?
$link = mysql_connect($config->HostDB, $config->UserDB, $config->PassDB); 
mysql_select_db($config->BaseDB, $link);
echo "<b>ДОБАВЛЕНИЕ ОПРОСА<b></br></br>";

# Проверяем входящие данные
$id = isset($_GET['poll_id']) ? intval($_GET['poll_id']) : 0;

# Удаляем вопрос
$query_del = mysql_query("DELETE FROM `poll_question` WHERE quest_id = ".$id) or die(mysql_error()); 

# Удаляем все варианты ответа относящиеся к данному вопросу
$query_del = mysql_query("DELETE FROM `poll_variant` WHERE var_id_quest = ".$id) or die(mysql_error()); 


?>
        <table border="1" align="center">
        <?php
# вытаскиваем все опросы
            $query = mysql_query("SELECT * FROM `poll_question` ORDER BY quest_id DESC") or die(mysql_query());
            while ($row = mysql_fetch_array($query)) {
                echo '<tr>';
                echo '<td>'.$row['quest_name'].' || </td>';
                echo '<td><a href="/admin/opros/poll_id/'.$row['quest_id'].'" onclick="return confirm(\'Удалить опрос '.$row['quest_name'].'\')"> Удалить</a></td>';
                echo '</tr>';
            }
        ?>
        </table>
		<br><hr><br>
		<h3>Добавить опрос</h3>
<?
# если кнопка НЕ нажата, то выводим форму
if (!isset($_POST['submit'])) {
?>
    <form action="" method="POST">
        Вопрос <input type="text" name="quest" size="50"/><br/>
        Варианты ответа (1 строчка - 1 вариант)<br/>
	    <textarea rows="15" cols="48" name="variant"></textarea><br/>
	    <input type="submit" name="submit" value="Добавить"/>
    </form>
    <br/>
    
<?php
}
else { # если кнопка нажата, то заносим в базу опрос
    $err = array();
    $quest = mysql_real_escape_string($_POST['quest']);
    $variant = mysql_real_escape_string($_POST['variant']);
 
# Проверяем заполнено ли поле для ввода вопроса 
    if (trim($quest) == '') {
        $err[] = "Вы не задали вопрос";
    }
# Проверяем введены ли варианты ответа
    if (trim($variant) == '') {
	    $err[] = "Вы не ввели варианты ответа";
    }
    else {
# Разделяем строки и засовываем их в массив
	    $variant= explode('\r\n', $variant);
        if (count($variant) < 2) {
            $err[] = "Вариантов ответа должно быть минимум 2!";
        }
    }
# Проверяем нет ли уже такого вопроса в базе
    $quest_query = mysql_query("SELECT count(*) FROM `poll_question` WHERE quest_name = '".$quest."'") or die(mysql_query());
    $count = mysql_result($quest_query,0,0);
    if ($count > 0 ) $err[] = "Такой вопрос уже есть в базе, задайте другой";
    unset($quest_query);
	
# Проверяем были ли ошибки, если ошибки были выводим их
    if (count($err) != 0) {
        echo "<b>Ошибки:</b><br/>";
        foreach ($err as $error) echo $error."<br/>";
        echo "<br><a href=\"javascript:history.go(-1);\">Вернуться назад</a>";
    }
# Если ошибок небыло заносим данные в базу
    else {
# Записываем вопрос в базу
        $q = mysql_query("INSERT INTO `poll_question` SET quest_name = '".$quest."', quest_act = 1") or die (mysql_error());
	    unset($q);
# Узнаем ID только что записанного вопроса
        $q = mysql_query("SELECT * FROM `poll_question` WHERE quest_name = '".$quest."'") or die(mysql_error());
        $row = mysql_fetch_array($q);
        $id_quest = $row['quest_id'];
        unset($q,$row);
#Записываем в базу варианты ответа
        foreach ($variant as $var)
            $q = mysql_query("INSERT INTO `poll_variant` SET var_id_quest = ".$id_quest.", var_name = '".$var."', var_voice = 0") or die(mysql_error());
        
        echo 'Опрос успешно добавлен!<br/>';
     		
    }
}