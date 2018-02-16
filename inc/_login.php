<center>

	<h1>Авторизация</h1>
	<div style="text-align:center;color:red;padding-bottom:20px;">
		<?PHP
			if(isset($_POST["login"])){
				$login = $func->IsLogin($_POST["login"]);
				$pass = $func->IsPassword($_POST["qiwi"]);
				$passmd = $func->md5Password($pass);
				
				$db->Query("SELECT * FROM db_users WHERE login = '$login'");
				if ($db->NumRows() == 1) {

				$log_data = $db->FetchArray();

					if (strtolower($log_data["pass"]) == strtolower($passmd)) {
						$_SESSION["user_id"] = $log_data['id'];
						$_SESSION['login'] = $log_data['login'];
						Header("Location: /account");
					} else echo "Login и/или Пароль указан неверно";
				
				} else echo "Указанный Login не зарегистрирован в системе";
			}
		?>
	</div>
	<form id="enter" action="" method="POST" style="margin:0;padding:0">
		<table>
			<tr>
				<td><input class="input_reg" style="width:200px;" name="login" id="login" placeholder="Логин" value="" size="16" type="text"><br></td>
				<td><input class="input_reg" style="width:200px;" name="qiwi" id="qiwi" placeholder="Пароль" value="" size="16" type="password"><br></td>
			</tr>
		</table>
		<br>
		<a class="input" href="javascript:with(document.getElementById('enter')){ submit(); }">ВОЙТИ</a>
	</form>

</center>