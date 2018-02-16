<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$logn = $balance['login'];
?>

<center><h1><span>Вклады</span></h1>

Вкладывать можно от 50 рублей.<br>
СУММА ИНВЕСТИРОВАНИЯ<br>
50 РУБ - 15.000 РУБ - за 24 часа 50% прибыли<br>
<br>
<?
if(isset($_POST['vlo'])){
$sum = $_POST['summa'];
if($sum>='10' and $sum<='10000'){
if($sum<=$balance['money_out']){
if($sum>='50' AND $sum<='15000'){ $percent = '50';}
elseif($sum>='60' AND $sum<='15000'){$percent = '50';}

$db->Query("SELECT COUNT(*) FROM db_insert WHERE batch = '$batch'");
					
							$lid = $db->LastInsert();

$db->Query("UPDATE db_users SET money_out=money_out-'".$sum."' WHERE id='".$user_id."'");
$db->Query("INSERT INTO db_deposit (id_user, login, date_start, date_end, summa, percent, count_full, status, id_trans) VALUES ('$user_id', '$logn', '$time', '$last_time', '".$sum."', '$percent', '1', '0', '$lid') ");
echo 'Успешно вложино.';
}else{echo 'Недостаточно средств.';}
}else{
echo 'Сумма вклада от 10р до 10000 р.';
}
}
?>
<form method="post" action="">
<table style='align:center'><tr>
<td><b>Ваш баланс : <?=$balance['money_out']?> РУБ.</b></td><td> <input type="text" name="summa" placeholder="Введите сумму" class="popolnit_input input_reg"> </td>
</tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td colspan='2'><center><input type="submit" name='vlo' value="Вложить" class="input" onclick=""></center></td>
</tr></table>

</form>


<center>










<div id="res1dfr78"></div>
     <div class="ptable four"> <!--four задает ширину для суммы -->
        <div class="row main">
            <div class="date" style="width:150px;">Дата вклада</div>
	    <div class="tarif" style="width:250px;">Сумма / % в сутки</div>
            <div class="stat" style="width:130px;">Начисления</div>
            <div class="nachi" style="width:430px;">Статус</div>
        </div><div class="row">
		

<?php

$db->Query("SELECT * FROM db_deposit WHERE id_user = '$user_id'");

while($depo = $db->FetchArray() ){
$dep_id = $depo['id'];
$date_end = $depo['date_end'];
$date_start = $depo['date_start'];
$count_dep = $depo['count'];
$count_full = $depo['count_full'];
$summa = $depo['summa'];
$perc = $depo['percent'];
$status = $depo['status'];

echo '
<tr>
<div class="date"  style="width:150px;">'.date("d-m-Y", $date_start).'</div>
<div class="tarif" style="width:250px;">'.$summa.' Р / '.$perc.'%</div>
<div class="stat" style="width:130px;">'.$count_dep.'/'.$count_full.' </div>';

if ($status == 0) {
echo '  <div class="nachi" id="deptimer'.$dep_id.'" style="width:430px;"></div><br>
';
} elseif($status == 1) {
echo '<div class="nachi" style="width:430px;">Отработан</div>';
}elseif($status == 3) {
echo '<div class="nachi" style="width:430px;">Ожидает</div>';
} elseif($status == 4) {
echo '<div class="nachi" style="width:430px;">Отклонен</div>';
}
echo '


	
		<div class="nachi'.$dep_id.' style="width:430px;"" >&nbsp;</div>
		
		<script language="JavaScript">
		<!--
			CalcTimePercent('.$dep_id.', '.$date_start.', '.$date_end.', '.time().');
		//-->
		</script></tr>
	


';


}







?>

</center>
</div>
</div>