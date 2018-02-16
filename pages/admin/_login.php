<?PHP
if(isset($_SESSION["admin"])){ Header("Location: /admin"); return; }

if(isset($_POST["admlogin"])){

	$db->Query("SELECT * FROM db_adm WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	if(strtolower($_POST["admlogin"]) == strtolower($data_log["login"]) AND strtolower($_POST["admpass"]) == strtolower($data_log["pass"]) ){
	
		$_SESSION["admin"] = true;
		Header("Location: /admin");
		return;
	}else echo "<center><font color = 'red'><b>Неверно введен логин и/или пароль</b></font></center><BR />";
	
}
?>
<p align="center"><a href="http://script-money.ru" target="_blank"><img alt="" src="http://script-money.ru/wp-content/uploads/2015/09/uTVJN22.jpeg"></a></p>
<div style="text-align:center;padding-bottom:30px;">
	<h1 style="padding-bottom:30px;"><span>Авторизация в админке</span></h1>
	<div class="info_ajax" style="font:20px 'Gubia bold';margin-bottom:20px;"></div>
	<form id="enter" action="" method="POST" style="margin:0;padding:0">
		<table style="margin:auto;">
			<tr>
				<td><input class="input_reg inp_t" style="width:200px;" name="admlogin" placeholder="Логин" value="" size="16" type="text"><br></td>
				<td><input class="input_reg inp_t" style="width:200px;" name="admpass" placeholder="Пароль" value="" size="16" type="password"><br></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Войти" class="input form_submit" style="outline:none;">
	</form>
</div>

