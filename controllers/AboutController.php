<?php 

/**
 * Контроллер страницы О НАС
 * 
 */

	// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование главной страницы создания аккаунта 
 * @param  object $smarty шаблонизатор
 */
	function indexAction($smarty) {

		$rsCategories = getAllMainCatsWithChildren();

		$scriptName = 'create-account.js';

		$smarty->assign('pageTitle', 'About Us');
		$smarty->assign('scriptName', $scriptName);
		$smarty->assign('rsCategories', $rsCategories);

		loadTemplate($smarty, 'head');
		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'breadcrumb');
		loadTemplate($smarty, 'about-us');
		loadTemplate($smarty, 'footer');
	}