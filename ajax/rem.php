<?
# Старт сессии
@session_start();

# Старт буфера
@ob_start();

# Автоподгрузка классов
function __autoload($name){ include("../classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;


# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
@include("../config.php");



$email = $func->IsMail($_POST["email"]);
	if($email !== FALSE) {
			$db->Query("SELECT * FROM db_users WHERE email = '$email'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
					$pass = rand(1, 999999999999999999);
					$passmd = $func->md5Password($pass);
					$db->Query("UPDATE db_users SET pass = '$passmd' WHERE id = '".$log_data['id']."'");
					$sender = new isender;
					$sender -> RecoveryPassword($log_data["login"], $pass, $log_data["email"]);
					echo "<span style=\"color:green;\">Новый пароль отправлен вам на почту!</span>";
			
			}else echo "<span style=\"color:red;\">Данного E-Mail нет в базе</span>";
	}else echo "<span style=\"color:red;\">Данного E-Mail имеет не верный формат</span>";

?>