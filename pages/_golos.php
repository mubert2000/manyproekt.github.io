<?PHP
$_OPTIMIZATION["title"] = "Голосование";
$_OPTIMIZATION["description"] = "Голосование";
$_OPTIMIZATION["keywords"] = "Голосование";
$link = mysql_connect($config->HostDB, $config->UserDB, $config->PassDB); 
mysql_select_db($config->BaseDB, $link);
?>

<h1 class="otz"><span class="poloska">ГОЛОСОВАНИЕ</span></h1>

<script type="text/javascript">
    function ajaxFormPoll(form) {
        for(var i=0;i<form.variant.length;i++)
            {if(form.variant[i].checked) variant2 = form.variant[i].value;}
		
        idq2 = form.idq.value; /* Получаем значения из поля "Имя" */

        $("#opros_id_"+idq2).html("<div style='text-align:center;'><img src=\"/images/load.gif\"></div>"); /* Добовляем лоадер на время передачи данных */
        $.post("ajax/poll_script.php", {idq:idq2,variant:variant2}, function(data){ 
            $("#opros_id_"+idq2).html(data); /* Это чтобы форма не отправилась с перезагрузкой */
		});
		
        return false;
    }
</script>
<?php
# Вытаскиваем активные опросы
$result_quest = mysql_query("SELECT * FROM `poll_question` WHERE quest_act = '1' ORDER by quest_id DESC") or die('Ошибка');
	
while ($quest = mysql_fetch_array($result_quest)) {
    $id_quest = $quest['quest_id'];
    $name_quest = $quest['quest_name'];
	
    echo "<h3>".$name_quest."</h3><br/>";
    echo '<div id="opros_id_'.$id_quest.'">';		
	
# Считаем количество проголосовавших за данный опрос    
    $total = mysql_query("SELECT SUM(var_voice) as sum FROM poll_variant WHERE var_id_quest = ".$id_quest) or die('Ошибка');
    $totl = mysql_fetch_array($total);
    $sum = $totl['sum'];
	
# Если человек уже голосовал то показываем сколько человек проголосовало	
    if (isset($_COOKIE['opros'.$id_quest])) {
	    echo 'Всего проголосовало: <b>'.$sum.'</b><br/>';
    }
# Вытаскиваем варианты ответов	
    $query_var = mysql_query("SELECT * FROM `poll_variant` WHERE var_id_quest = '$id_quest' ORDER BY var_id ASC") or die(mysql_error());
    ?>
        <form onSubmit="return ajaxFormPoll(this)">
            <input type="hidden" name="idq" value="<?=$id_quest;?>">
			<?php
            while ($var = mysql_fetch_array($query_var)) {
                $id_var = $var['var_id'];
                $name_var = $var['var_name'];
                $voice_var = $var['var_voice'];
				
                # считаем сколько процентов проголосовало за данный опрос
                if($sum==0) $procent=0;
                else $procent = (100*$voice_var)/$sum;
				
                # Если пользователь не голосовал выводим варианты ответов, иначе выводим результат голосования				
                if (!isset($_COOKIE['opros'.$id_quest]) and isset($_SESSION['user_id']))
                    echo '<input type="radio" name="variant" value="'.$id_var.'" > '.$name_var.'<br/>';
                else {
                    echo '<span style="color:#5AB9F4;">'.$name_var."</span> ( ".$voice_var." / ".sprintf("%01.1f%s", $procent,'%')." )<br/>";
                    echo '<div style="width:100%; border:1px solid #ccc; margin-bottom:5px;"><div style="height:2px; background:red; width:'.$procent.'%;"></div></div>';
                }
            }
            # если пользователь не голосовал даем ему эту возможность	
            if (!isset($_COOKIE['opros'.$id_quest]) and isset($_SESSION['user_id']))
                echo '<div class="text-center"><input type="submit" value="Голосовать" class="baton mr" /></div>';
            ?>
	    </form>
    </div><br/>
	<hr>
<?php } 

?>