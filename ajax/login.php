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

if($_POST['cap']!=$_SESSION['capcha']){echo 'Код с картинки введен не правильно!';exit;}

$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["qiwi"]);
	$passmd = $func->md5Password($pass);
	
			$db->Query("SELECT * FROM db_users WHERE login = '$login'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($passmd)){
				
					
						$_SESSION["user_id"] = $log_data['id'];
						$_SESSION['login'] = $log_data['login'];
						echo "<span style=\"color:green;\">Вы успешно авторизовались! Идет перенаправление...</span>";
						exit("<html><head><meta    http-equiv='Refresh' content='2;    URL=/account'></head></html>");
						
					
				
				}else echo "<span style=\"color:red;\">Ошибка авторизации</span>";
			
			}else echo "<span style=\"color:red;\">Ошибка авторизации</span>";

?>