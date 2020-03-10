<?php 
	
	/**
	 * ProductController.php
	 *
	 *  Контроллер страницы товара (/product/1)
	 *  
	 */
	
	// подключаем модели
	include_once '../models/ProductsModel.php';
	include_once '../models/CategoriesModel.php';

	/**
	 *  Формирование страницы продукта
	 *
	 * 	@param onject $smarty шаблонизатор
	 * 	
	 */
	function indexAction($smarty) {
		$itemId = isset($_GET['id']) ? $_GET['id'] : null;
		if ($itemId == null) {
			exit();
		}

	// получить данные продукта
	$rsProduct = getProductById($itemId);

	// получить все категории
	$rsCategories = getAllMainCatsWithChildren();

	// breadcrump
	$rsParentCategoryProduct = $rsProduct['parent_id'];
	$rsParentCategory = getCatById($rsParentCategoryProduct);
	$categoryProduct = $rsProduct['category_id'];
	$rsCategoryProduct = getCatById($categoryProduct);

	// получить все изображения товара
	$Catalog_img  = $rsProduct['catalog_img'];
	$rsCatalog_img = explode(",", $Catalog_img);

	// получить все размеры товара
	$Size_array = $rsProduct['size'];
	$rsSize = explode(",", $Size_array);
	//d($_SESSION['size']);
	// Подключение нужных скриптов для данной страницы
	$scriptName = 'details.js';
	$addScript = 'libs/Magnific-Popup/dist/jquery.magnific-popup.min.js';

	// Подключение дополнительных css
	$addStyle = 'libs/magnific-popup/dist/magnific-popup.css';

	$smarty->assign('pageTitle', '');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProduct', $rsProduct);
	$smarty->assign('rsCatalog_img', $rsCatalog_img);
	$smarty->assign('rsSize', $rsSize);
	$smarty->assign('scriptName', $scriptName);
	$smarty->assign('addScript', $addScript);
	$smarty->assign('rsParentCategory', $rsParentCategory);
	$smarty->assign('rsCategoryProduct', $rsCategoryProduct);
	$smarty->assign('addStyle', $addStyle);

	loadTemplate($smarty, 'head');
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'breadcrumb');
	loadTemplate($smarty, 'product');
	loadTemplate($smarty, 'footer');
	}