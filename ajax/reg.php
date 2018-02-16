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



$login = $func->IsLogin($_POST["u_login"]);
	$pass = $func->IsPassword($_POST["u_qiwi"]);
	$mail = $func->IsMail($_POST["mail"]);
	$passmd = $func->md5Password($pass);
	$time = time();
	$ip = $_SERVER["REMOTE_ADDR"];
	$bonus = 0;
	$ref_id = intval($_POST['ref']);

  
  $purse  = $db->RealEscape($_POST['u_kosh']);
	
	
		if($login !== false){

		if($mail !== false) {
			
		if($pass !== false){  
				
        if(!empty($purse)) {  
         
			$db->Query("SELECT COUNT(*) FROM db_users WHERE login = '$login'");
			if($db->FetchRow() == 0){
			
				# Регаем пользователя
				$db->Query("INSERT INTO db_users (login, pass, date_reg, money_in, refer, ip, email, qiwi) 
				VALUES ('$login','$passmd', '$time', '$bonus', '$ref_id','$ip', '$mail', '$purse')");
				$lid = $db->LastInsert();
				$db->Query("UPDATE db_stats SET user = user + 1 WHERE id = 1");
				$db->Query("UPDATE db_users SET kol_ref = kol_ref + 1 WHERE id = '$ref_id'");
				
				$sender = new isender;
				$sender -> SendAfterReg($login, $mail, $pass);
				
				$_SESSION["user_id"] = $lid;
				$_SESSION['login'] = $login;
				echo "<span style=\"color:green;\">Вы успешно Зарегистрировались! Идет перенаправление...</span>";
				exit("<html><head><meta    http-equiv='Refresh' content='2;    URL=/account'></head></html>");
									
			
			}else echo "<span style=\"color:red;\">Указанный логин уже используется</span>";
						
          
		}else echo "<span style=\"color:red;\">Не верный формат Qiwi кошелька! Пример +79616549895</span>";
			
		}else echo "<span style=\"color:red;\">Пароль заполнен неверно</span>";
			
		}else echo "<span style=\"color:red;\">E-Mail заполнен неверно</span>";
		
		}else echo "<span style=\"color:red;\">Логин заполнен неверно</span>";

?>