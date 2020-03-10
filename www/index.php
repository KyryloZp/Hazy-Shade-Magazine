<?php  

session_start(); //стартуем сессию

// если в сессии нет массива корзины то создаем его
if (! isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}
if (! isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}

include_once '../config/config.php'; // Инициализация настроек
include_once '../config/db.php'; // Инициализация базы данных
include_once '../library/mainFunctions.php'; // Основные функции

// определяем с каким контроллером работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

//определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

$rsSession = array();
$rsSession = $_SESSION['items'];
$rsUser = array();
$rsUser = $_SESSION['user'];
$rsSessionPrice = array();


$rsSessionPrice = 0;
foreach ($rsSession as $value) {
	$rsSessionPrice = $rsSessionPrice + $value['price'];

}
unset($value); // разорвать ссылку на последний элемент

// инициализируем переменную шаблонизатора количества элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));
$smarty->assign('rsSession', $rsSession);
$smarty->assign('rsUser', $rsUser);
$smarty->assign('rsSessionPrice', $rsSessionPrice);

loadPage($smarty, $controllerName, $actionName);