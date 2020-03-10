<?php 

/**
 * Контроллер страницы О НАС
 * 
 */

	// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';


/**
 * Формирование главной страницы создания аккаунта 
 * @param  object $smarty шаблонизатор
 */
function indexAction($smarty) {

	if(! isset($_SESSION['user'])) {
		redirect('/');
	}

	$rsCategories = getAllMainCatsWithChildren();

	$rsUserOrders = getCurUserOrders();

	//d($rsUserOrders);
	/*
	foreach $rsChildren as $item) {
		$rsProduct[$item['id']] = $children['product_id'];
	}
*/
	$scriptName = 'create-account.js';

	$smarty->assign('pageTitle', 'Your Account');
	$smarty->assign('scriptName', $scriptName);
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsUserOrders', $rsUserOrders);

	loadTemplate($smarty, 'head');
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'account');
	loadTemplate($smarty, 'footer');
}