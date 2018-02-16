


<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$prof_data = $db->FetchArray();
$db->Query("SELECT * FROM db_users WHERE refer = '$user_id'");
$col = $db->NumRows();
?>

<center>
	<h1><span>Личный кабинет</span></h1>

	<p>Добро пожаловать, уважаемый <span style="font-weight:bold;"><?=$prof_data['login']; ?></span>!</p>
	<br>

	<table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td align="left" style="padding:3px;">Ваш баланс:</td>
			<td align="left" style="padding:3px;"> <font color="#000;">{!BALANCE_OUT!}</font>
			</td>
		</tr>
		<tr>
			<td align="left" style="padding:3px;">Всего рефералов:</td>
			<td align="left" style="padding:3px;">
				<font color="#000;"><?php echo $col; ?></font>
			</td>
		</tr>
        <tr>
            <td align="left" style="padding:3px;">Ваш QIWI-кошелек:</td>
            <td align="left" style="padding:3px;">
                <font color="#000;"><?=$prof_data["qiwi"]; ?></font>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding:3px;">Ваш ID:</td>
            <td align="left" style="padding:3px;">
                <font color="#000;"><?=$prof_data["id"]; ?></font>
            </td>
        </tr>
		<tr>
			<td align="left" style="padding:3px;">Вас пригласил:</td>
			<td align="left" style="padding:3px;">
				<font color="#000;"><?=$prof_data["referer"]; ?> его ID <?=$prof_data["refer"]; ?></font>
			</td>
		</tr>
	</table>

	<br>
	<br>

	<div class="my_acc">Смена пароля</div>
	<br>
    <?PHP
        if(isset($_POST["old"])){
            $old  = $func->IsPassword($_POST["qiwi"]);
        $oldd = $func->md5Password($pass);
            
            $new = $func->IsPassword($_POST["new"]);
            $pass = $func->md5Password($new);
            
            if(strtolower($log_data["pass"]) == strtolower($old)){
            
                    if($new !== false){
                    
                        if( strtolower($new) == strtolower($_POST["re_new"])){
                        
                            $db->Query("UPDATE db_users SET pass = '$pass' WHERE id = '$user_id'");
                            
                            echo "<span style=\"color:green;\">Новый пароль успешно установлен</span>";
                        
                        }else echo "<span style=\"color:red;\">Пароль и повтор пароля не совпадают</span>";
                    
                    }else echo "<span style=\"color:red;\">Новый пароль имеет неверный формат</span>";
                
                }else echo "<span style=\"color:red;\">Вы неверно ввели старый пароль!</span>";
            
        }
    ?>
	<form action="" method="post">
		<table width="330" border="0" align="center">
			<tr>
				<td>Старый пароль:</td>
				<td align="center">
					<input type="password" name="old"></td>
			</tr>
			<tr>
				<td>Новый пароль:</td>
				<td align="center">
					<input type="password" name="new"></td>
			</tr>
			<tr>
				<td>Повтор пароля:</td>
				<td align="center">
					<input type="password" name="re_new"></td>
			</tr>
		</table>
        <br>
        <input type="submit" value="Сменить пароль" class="input">
	</form>
	<br>
	<div class="min">Пароль должен иметь от 6 до 20 символов (только англ. символы и цифры)</div>

</center>
