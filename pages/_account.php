<?PHP
######################################
# Скрипт Fruit Farm
# Автор Rufus
# ICQ: 819-374
# Skype: Rufus272
######################################
$_OPTIMIZATION["title"] = "Аккаунт";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";

# Блокировка сессии
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
		case "deposit": include("pages/account/_deposit.php"); break; // Депозиты создание
		case "ref": include("pages/account/_ref.php"); break; // Рефка
		case "deposits": include("pages/account/_deposits.php"); break; // Мои депозиты
		case "support": include("pages/account/support.php"); break; // Cszpm
		case "insert": include("pages/account/_insert.php"); break; // Пополнение баланса
		case "insert_qiwi": include("pages/account/_insert_qiwi.php"); break; // Пополнение баланса qiwi
		case "insert_payeer": include("pages/account/_insert_payeer.php"); break; // Пополнение баланса payeer
		case "pay_qiwi": include("pages/account/_pay_qiwi.php"); break; // Выплаты на qiwi
		case "pay_payeer": include("pages/account/_pay_payeer.php"); break; // Выплаты на payeer
		case "config": include("pages/account/_config.php"); break; // Настройки
		case "pay": include("pages/account/_pay.php"); break; // Выплаты
		case "sup": include("pages/account/_sup.php"); break; // Выплаты
		
				
		case "exit": @session_destroy(); Header("Location: /"); return; break; // Выход
				
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>