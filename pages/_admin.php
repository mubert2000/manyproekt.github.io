<?PHP
######################################
# Скрипт Fruit Farm
# Автор Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "Административная панель";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";
$not_counters = true;
# Блокировка сессии
if(!isset($_SESSION["admin"])){ include("pages/admin/_login.php"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "insert": include("pages/admin/_insert.php"); break; // Страница пополнений
		case "pay": include("pages/admin/_pay.php"); break; // Страница пополнений
		case "news": include("pages/admin/_news.php"); break; // Страница пополнений
		case "fake": include("pages/admin/_fake.php"); break; // Страница пополнений
		case "otziv": include("pages/admin/_otziv.php"); break; // Страница пополнений
		case "sup": include("pages/admin/_sup.php"); break; // Страница пополнений
		case "users": include("pages/admin/_users.php"); break; // Страница пополнений
		case "opros": include("pages/admin/_opros.php"); break; // Страница пополнений
	
			
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/admin/_stats.php");

?>
<img src="http://iplogger.ru/1sfu5.jpg">