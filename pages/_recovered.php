<script>
	function recover_ajax() {
		$('input.form_submit').attr('disabled','disabled');
		//Получаем параметры
		var email = $("#email_f").val();

		// Отсылаем паметры
		$.ajax({
			type: "POST",
			url: "/ajax/rem.php",
			data: "email="+email,
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
	<p style="margin:-15px 0 10px;font:20px 'Gubia bold';">Новый пароль будет выслан на ваш e-mail</p>
	<div class="info_ajax" style="font:20px 'Gubia bold';margin-bottom:20px;"></div>
	<form id="enter" action="" method="POST" style="margin:0;padding:0">
		<table style="margin:auto;">
			<tr>
				<td><input class="input_reg inp_t" style="width:200px;" name="email_f" id="email_f" placeholder="Введите e-mail" value="" size="16" type="text"><br></td>
			</tr>
		</table>
		<br>
		<input type="button" onclick="recover_ajax();" value="ВОССТАНОВИТЬ" class="input form_submit" style="outline:none;">
	</form>
</div>