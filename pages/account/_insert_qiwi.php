<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$logn = $balance['login'];
$db->Query("SELECT * FROM db_fake WHERE id = 1");
$qiwi = $db->FetchArray();
?>

<center>
	<h1><span>Пополнение баланса</span></h1>
</center>
<br>
<table bordercolor="#86cb12" border="7" width="100%">
	<tr>
		<td style="padding:25px;" align="center">
			<div style="font-size:14px;" class="popolnit_info">
				<div style="font-weight:bold;">Заходим в свой кошелёк на сайте <a target="_blank" style="color:#339AD5;text-decoration:underline;font-weight:bold;" href="https://w.qiwi.com">w.qiwi.com</a></div>
				1.Выбираем раздел "Перевести". <br>
				2.В поле "На другой кошелек" вписываем кошелек <font color="red">+79520400221</font><br>
				3.Вводим сумму вклада (от 50 до 50.000 руб). <br>
				4.Жмём кнопку "Оплатить". <br>
				5.Копируем номер платежа, переходим в свой аккаунт на нашем сайте, нажимаем вкладку "Пополнить" 
				<br>и вставляем в поле "Номер транзакции" <br>
				6.Вписываем номер транзакции и сумму вклада, далее жмем "Создать вклад".<br><br>
			</div>
			<?PHP
			function ViewPurse($batch){
				if( !preg_match("/^[a-zA-Z0-9]{5,30}$/", $batch) ) return false;	
				return $batch;
			}
				
			if (isset($_POST['batch'])) {
				$batch = ViewPurse($_POST['batch']);
				$time = time();
				$status = 0;
				$ps = 1;
				if($batch !== false) {
					if ($ps == 1) {
						$sum_tarif1 = 10;
						$time_tarif1 = 24;
						$perc_tarif1 = $perc_tarif1;
						$count = $srok1 / 24;
						$sutki = $srok1 / 24;
						$percent = $perc_tarif1 / $sutki;
						
                                                   }
					
				$db->Query("SELECT COUNT(*) FROM db_insert WHERE batch = '$batch'");
						if($db->FetchRow() == 0){
							$db->Query("INSERT INTO db_insert (login, user_id, batch, date, status) 
							VALUES ('$logn', '$user_id', '$batch', '$time', '$status') ");
							$lid = $db->LastInsert();

							$db->Query("INSERT INTO db_deposit (id_user, login, date_start, date_end, summa, percent, count_full, status, id_trans) 
							VALUES ('$user_id', '$logn', '$time', '$last_time', '0', '$percent', '$count', '3', '$lid') ");

							echo "<center><font color = 'green'><b>Заявка отправлена!</b></font></center>";
						
						}else echo "<center><font color = 'red'><b>Транкзация уже существует!</b></font></center>";
						
				}else echo "<center><font color = 'red'><b>Транзакция имеет неверное значение!</b></font></center> ";
			} ?>
			<br>
			<table width="320px" cellpadding="0px" cellspacing="0px">
				<tbody>
                <tr>
						<td>
							<form id="popolnit" action="" method="POST" style="margin:0;padding:0;">
							
						</td>
					</tr>
					<tr><td>&nbsp;&nbsp;</td></tr>
					<tr>
						<td>
							<input id="batch" class="popolnit_input input_reg" type="text" name="batch" required="required" placeholder="Номер транкзации" style="margin:0 auto;">
							</form>
						</td>
					</tr>
				</tbody>
			</table>
			<br>
			<span id="btn_"><input type="button" onclick="javascript:with(document.getElementById('popolnit')){ submit(); }" value="СОЗДАТЬ ВКЛАД" class="input"></span>
		</td>
	</tr>
</table>
<div class="ptable four">
	<!--four задает ширину для суммы -->
	<div class="row main">
		<div class="date">Cумма</div>
		<div class="tarif">Дата</div>
		<div class="stat" style="width:200px;">Транкзация или mail</div>
		<div class="nachi">Статус</div>
	</div>
	<div class="row">
		<table border="1" align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
		<?php
		$db->Query("SELECT * FROM db_insert WHERE user_id = '$user_id'");
		while($batch = $db->FetchArray() ) {
			$bat = $batch['batch'];
			$date = $batch['date'];
			$status = $batch['status'];
			$summa = $batch['summa'];
		?>

			<tr><td>
				<div class="date"><?php if($summa == 0) { echo "-//-"; } else { echo $summa; } ?></div>
				<div class="tarif"><?php echo date('d-m-Y', $date); ?></div>
				<div class="stat" style="width:200px;">
				<?php echo $bat; ?>
				</div>
				<?php
				if($status == 0){ echo '<div class="nachi">В обработке</div>'; }
				if($status == 1){ echo '<div class="nachi">Принято</div>'; }
				if($status == 2){ echo '<div class="nachi">Отказано</div>'; }
				?>
			</td></tr>

		<?php } ?>
		</table>
	</div>
</div>