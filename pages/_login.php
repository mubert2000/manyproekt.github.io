<script>
	function auth_ajax() {
		$('input.form_submit').attr('disabled','disabled');
		//Получаем параметры
		var login = $("#login").val(),
			cap = $("#capcha").val(),
			qiwi = $("#qiwi").val();

		// Отсылаем паметры
		$.ajax({
			type: "POST",
			url: "/ajax/login.php",
			data: "login=" + login + "&qiwi=" + qiwi+ "&cap="+cap,
			beforeSend: function() {
				$('.info_ajax').html('<img style="vertical-align:middle;" src="/img/loading.gif" width="45" height="45" border="0">');
			},
			success: function(rezult) {
				$('.info_ajax').html(rezult);
				$('input.form_submit').attr('disabled','');
			}
		});
	}
</script>

<div style="text-align:center;padding-bottom:30px;">
	<h1 style="padding-bottom:30px;"><span>Авторизация</span></h1>
	<div class="info_ajax" style="font:20px 'Gubia bold';margin-bottom:20px;"></div>
	<form id="enter" action="" method="POST" style="margin:0;padding:0">
		<table style="margin:auto;">
			<tr>
				<td><input class="input_reg inp_t" style="width:200px;" name="login" id="login" placeholder="Логин" value="" size="16" type="text"><br></td>
				<td><input class="input_reg inp_t" style="width:200px;" name="qiwi" id="qiwi" placeholder="Пароль" value="" size="16" type="password"><br></td>
			</tr>
			<tr>
			<td><img src="pages/cap.php" alt=""></td><td><input class="input_reg inp_t" style="width:200px;" name="capcha" id="capcha" placeholder="Код с картинки" value="" size="10" type="text"></td>
			</tr>
		</table>
		<br>
		<input type="button" onclick="auth_ajax();" value="ВХОД" class="input form_submit" style="outline:none;">
		<a href="/recovered" class="input">Восстановить пароль</a>
	</form>
</div>
