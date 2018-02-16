<?PHP
######################################
# Счетчик
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}

$_timer_a = TimerSet();


ini_set('date.timezone', 'Europe/Moscow');


# Старт сессии
@session_start();

# Старт буфера
@ob_start();

# Default
$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "QIWI";
$_OPTIMIZATION["description"] = "QIWI";
$_OPTIMIZATION["keywords"] = "Удвоитель Qiwi";

# Константа для Include
define("CONST_WMRUSH", true);

# Автоподгрузка классов
function __autoload($name){ include("classes/_class.".$name.".php");}

# Класс конфига 
$config = new config;

# Функции
$func = new func;

# Установка REFERER
include("inc/_set_referer.php");

# База данных
$db = new db($config->HostDB, $config->UserDB, $config->PassDB, $config->BaseDB);
@include("config.php");

# Шапка
$referer_id = (isset($_COOKIE["ref"]) AND intval($_COOKIE["ref"]) > 0 AND intval($_COOKIE["ref"]) < 1000000) ? intval($_COOKIE["ref"]) : 1;
$db->Query("SELECT * FROM db_users WHERE id = '$referer_id'");
$ref = $db->FetchArray();
$ref_name = $ref['login'];



#Код для вывода кто онлайн
$db->Query("SELECT * FROM db_online WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
if($db->NumRows() == 0) {
$db->Query("INSERT INTO db_online (ip, date) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".time()."')");
}else{
//$q = $db->FetchArray();
$db->Query("UPDATE db_online SET date = '".time()."' WHERE ip ='".$_SERVER['REMOTE_ADDR']."'");
}
$dd_delll = time() - 600;
$db->Query("DELETE FROM db_online WHERE date < '$dd_delll'");

$db->Query("SELECT * FROM db_online");
$kol_users_online = $db->NumRows();
@include("inc/_header.php");

		if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){
			
				case "404": include("pages/_404.php"); break; // Страница ошибки
				case "rules": include("pages/_rules.php"); break; // Правила проекта
				case "about": include("pages/_about.php"); break; // О проекте
				case "contacts": include("pages/_contacts.php"); break; // Контакты
				case "news": include("pages/_news.php"); break; // Новости
				case "success": include("pages/_success.php"); break; // Новости
				case "golos": include("pages/_golos.php"); break; // Новости
				case "market": include("pages/_market.php"); break; // Маркетинг
				case "account": include("pages/_account.php"); break; // Аккаунт
				case "otziv": include("pages/_otziv.php"); break; // Аккаунт
				case "reminder": include("pages/_reminder.php"); break; // Аккаунт
				case "admin": include("pages/_admin.php"); break; // Админка
				case "login": include("pages/_login.php"); break; // Авторизация
				case "recovered": include("pages/_recovered.php"); break; // Восстановление пароля
				case "register": include("pages/_register.php"); break; // Регистрация
				
				
				 
				
			# Страница ошибки
			default: @include("pages/_404.php"); break;
			
			}
			
		}else @include("pages/_index.php");


# Подвал
@include("inc/_footer.php");


# Заносим контент в переменную
$content = ob_get_contents();

# Очищаем буфер
ob_end_clean();
	
	# Заменяем данные
	$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
	$content = str_replace('{!DESCRIPTION!}',$_OPTIMIZATION["description"],$content);
	$content = str_replace('{!KEYWORDS!}',$_OPTIMIZATION["keywords"],$content);
	$content = str_replace('{!GEN_PAGE!}', sprintf("%.5f", (TimerSet() - $_timer_a)) ,$content);
	
	# Вывод баланса
	if(isset($_SESSION["user_id"])){
	
		$user_id = $_SESSION["user_id"];
		$db->Query("SELECT money_in, money_out FROM db_users WHERE id = '$user_id'");
		$balance = $db->FetchArray();
		
		$content = str_replace('{!BALANCE_IN!}', sprintf("%.2f", $balance["money_in"]) ,$content);
		$content = str_replace('{!BALANCE_OUT!}', sprintf("%.2f", $balance["money_out"]) ,$content);
	}
	
// Выводим контент
echo $content;
?>