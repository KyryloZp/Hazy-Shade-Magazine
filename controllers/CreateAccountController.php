<?php 

/**
 * Контроллер страницы создания аккаунта
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

	$scriptName = 'create-account.js';

	$smarty->assign('pageTitle', 'Create your Account');
	$smarty->assign('scriptName', $scriptName);
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'head');
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'account-create');
	loadTemplate($smarty, 'footer');
}

