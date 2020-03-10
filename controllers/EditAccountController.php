<?php 

/**
 * Контроллер страницы О НАС
 * 
 */

	// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * Формирование главной страницы создания аккаунта 
 * @param  object $smarty шаблонизатор
 */

function indexAction($smarty) {

	$rsCategories = getAllMainCatsWithChildren();

	$scriptName = 'edit-account.js';

	$smarty->assign('pageTitle', 'About Us');
	$smarty->assign('scriptName', $scriptName);
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'head');
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'edit-account');
	loadTemplate($smarty, 'footer');
}

function updateAction() {
	if (! isset($_SESSION['user'])) {
		redirect('/');
	}

	$resData = array();
	$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
	$confirmPwd = isset($_REQUEST['confirm-pwd']) ? $_REQUEST['confirm-pwd'] : null;
	$oldPwd = isset($_REQUEST['old-pwd']) ? $_REQUEST['old-pwd'] : null;

	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
	$adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
	$name = isset($_REQUEST['first-name']) ? $_REQUEST['first-name'] : null;
	$secondName = isset($_REQUEST['last-name']) ? $_REQUEST['last-name'] : null;
	$companyName = isset($_REQUEST['company-name']) ? $_REQUEST['company-name'] : null;
	$nip = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : null;
	$zipCode = isset($_REQUEST['zip-code']) ? $_REQUEST['zip-code'] : null;
	$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : null;
	$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : null;

	// проверка правильности пароля
	$oldPwdMD5 = md5($oldPwd);
	if ($pwd  && (! $oldPwd || (($_SESSION['user']['pwd']) != $oldPwdMD5))) {
		$resData['success'] = false;
		$resData['message'] = 'Текущий пароль не верен';
		echo json_encode($resData);
		return false;
	}

	if ($pwd != $confirmPwd) {
		$resData['success'] = false;
		$resData['message'] = 'Пароли не совпадают';
		echo json_encode($resData);
		return false;
	}

	//обновление данных пользователя
	$res = updateUserData($pwd, $confirmPwd, $oldPwd, $name, $phone, $adress, $secondName, $companyName, $nip, $zipCode, $city, $country);
	if ($res) {
		$resData['success'] = true;
		$resData['message'] = 'Данные сохранены';
		$resData['userName'] = $name;

		$_SESSION['user']['name'] = $name;
		$_SESSION['user']['phone'] = $phone;
		$_SESSION['user']['pwd'] = $pwd;
		$_SESSION['user']['adress'] = $adress;
		$_SESSION['user']['secondName'] = $secondName;
		$_SESSION['user']['companyName'] = $companyName;
		$_SESSION['user']['nip'] = $nip;
		$_SESSION['user']['zipCode'] = $zipCode;
		$_SESSION['user']['city'] = $city;
		$_SESSION['user']['country'] = $country;
		$_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];


	} elseif (! $res) {
		$resData['success'] = false;
		$resData['message'] = 'Ошибка сохранения данных';
	}
	echo json_encode($resData);
}