<?php 

/**
 * Контроллер функций пользователя
 * 
 */

	// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

/**
 * AJAX регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 * 
 * @return json массив данных нового пользователя
 */
function registerAction(){

	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);
	

	$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
	$confirmPwd = isset($_REQUEST['confirm-pwd']) ? $_REQUEST['confirm-pwd'] : null;

	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
	$adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
	$name = isset($_REQUEST['first-name']) ? $_REQUEST['first-name'] : null;
	$name = trim($name);
	$secondName = isset($_REQUEST['last-name']) ? $_REQUEST['last-name'] : null;
	$companyName = isset($_REQUEST['company-name']) ? $_REQUEST['company-name'] : null;
	$nip = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : null;
	$zipCode = isset($_REQUEST['zip-code']) ? $_REQUEST['zip-code'] : null;
	$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : null;
	$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : null;

	$resData = null;
	$resData = checkRegisterParams($email, $pwd, $confirmPwd);

	if (! $resData && checkUserEmail($email)) {
		$resData['success'] = false;
		$resData['message'] = 'Пользователь с таким email уже зарегистрирован';
	}
	


	if (! $resData) {
		$pwdMD5 = md5($pwd);
		$userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress, $secondName, $companyName, $nip, $zipCode, $city, $country);

		if ($userData['success']) {
			$resData['message'] = 'Пользователь успешно зарегистровался';
			$resData['success'] = true;

			$userData = $userData[0];
			$resData['userName'] = $userData['name'];
			$resData['userEmail'] = $email;

			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		} 
		/*
		else {
			$resData['success'] = false;
			$resData['message'] = 'Ошибка реестрации';
		}*/

	}

	echo json_encode($resData);
}


/**
 * Разлогинивание пользователя
 * 
 */
function logoutAction(){
	if(isset($_SESSION['user'])) {
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
		unset($_SESSION['items']);
		unset($_SESSION['size']);
		unset($_SESSION['saleCart']);
	}

	redirect('/');
}

function loginAction(){
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);

	$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
	$pwd = trim($pwd);

	$userData = loginUser($email, $pwd);

	if ($userData['success']) {
		$userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

		$resData = $_SESSION['user'];
		$resData['success'] = true;

	} else {
		$resData['success'] = false;
		$resData['message'] = 'Неверный логин или пароль';
	}
	echo json_encode($resData);
}
