<script>
	function reg_ajax() {
		$('input.form_submit').attr('disabled','disabled');
		//Получаем параметры
		var u_login = $("#u_login").val(),
			u_qiwi = $("#u_qiwi").val(),
			u_kosh = $("#u_kosh").val(),
			ref = $("#ref").val(),
			mail = $("#u_mail").val();

		// Отсылаем паметры
		$.ajax({
			type: "POST",
			url: "/ajax/reg.php",
			data: "u_login=" + u_login + "&u_qiwi=" + u_qiwi + "&u_kosh=" + u_kosh + "&ref=" + ref + "&mail=" + mail,
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
	<p style="margin:-15px 0 10px;font:20px 'Gubia bold';">Обратите внимание, что <a target="_blank" style="font-family:'Gubia black'" href="https://w.qiwi.com">Qiwi-кошелек</a> обязателен!</p>
	<div class="info_ajax" style="font:20px 'Gubia bold';margin-bottom:20px;"></div>
	<form id="enter" action="" method="POST" style="margin:0;padding:0">
		<table style="margin:0 auto;text-align:left;">
			<tr>
				<td>
					<div class="min">Логин от 2 символов</div>
					<input class="input_reg" type="text" name="u_login" id="u_login" placeholder="Логин" required="required" maxlength="30" value="">
					<div class="min">Пароль от 5 символов</div>
					<input class="input_reg" name="u_qiwi" id="u_qiwi" type="password" placeholder="Пароль" required="required" maxlength="30" value="">
				</td>
				<td>
					<div class="min">Введите ваш e-mail</div>
					<input class="input_reg" type="text" name="u_mail" id="u_mail" placeholder="Email" required="required" value="">
					<div class="min">Введите ваш QIWI-кошелек</div>
					<input class="input_reg" type="text" name="u_kosh" id="u_kosh" placeholder="+79616549895" required="required" value="">
				</td>
			</tr>
		</table>
		<br>
		<input type="hidden" name="ref" id="ref" value="<?=$referer_id; ?>">
		<input type="button" onclick="reg_ajax();" value="Регистрация" class="input form_submit" style="outline:none;">
		<br><br>
		<div>Вас пригласил: <font color="#E17E06"><?=$ref_name; ?></font><br>	Нажимая кнопку "Регистрация" вы соглашаетесь с <a href="/success">правилами</a>	проекта!</div>
	</form>
</div>
