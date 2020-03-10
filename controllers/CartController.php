<?php 

	/**
	 * cartController.php
	 *
	 * Контроллер работы с корзиной (/cart/)
	 */
	
	// подключаем модели
	include_once '../models/CategoriesModel.php';
	include_once '../models/ProductsModel.php';
	include_once '../models/OrdersModel.php';
	include_once '../models/PurchaseModel.php';

	function addtocartAction(){
		$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
		if (! $itemId) return false;

		$resData = array();
		$rsProduct = getProductById($itemId);

		// если значение не найдено, то добавляем
		if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
			$_SESSION['cart'][] = $itemId;
			$_SESSION['items'][] = $rsProduct;
			$_SESSION['size'][$itemId] = isset($_REQUEST['size']) ? $_REQUEST['size'] : null;
			$resData['cntItems'] = count($_SESSION['cart']);
			$resData['success'] = 1;
			$resData['name'] = $rsProduct['name'];
			$resData['price'] = $rsProduct['price'];
			$resData['image'] = $rsProduct['image'];
			$resData['id'] = $rsProduct['id'];
		} else {
			$resData['success'] = 0;
		}

		echo json_encode($resData);
	}

	/**
	 * Удаление продукта из корзины
	 *
	 * @param integer id GET параметр - ID удаляемого из корзины продукта
	 * @return json информация об операции(успех, кол-во эдементов в корзине)
	 */
	function removefromcartAction(){
		$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
		if (! $itemId) exit();

		$resData = array();
		$rsProduct = getProductById($itemId);
		$rsSessionItems = $_SESSION['items'];

		$key = array_search($itemId, $_SESSION['cart']);

		if ($key !== false) {
			unset($_SESSION['cart'][$key]);
			unset($_SESSION['items'][$key]);
			unset($_SESSION['size'][$itemId]);

			$resData['success'] = 1;
			$resData['cntItems'] = count($_SESSION['cart']);
			$resData['id'] = $rsProduct['id'];
		} else {
			$resData['success'] = 0;
		}
		echo json_encode($resData);
	}

	/**
	 * Формирование страницы корзины
	 * @link /cart/
	 * 
	 */
	function indexAction($smarty){
		$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
		$rsCategories = getAllMainCatsWithChildren();
		$rsProducts = getProductsFromArray($itemsIds);
		$productSize = $_SESSION['size'];
		$scriptName = 'shoping-cart.js';
		$smarty->assign('pageTitle', 'Cart');
		$smarty->assign('rsCategories', $rsCategories);
		$smarty->assign('rsProducts', $rsProducts);
		$smarty->assign('itemsIds', $itemsIds);
		$smarty->assign('scriptName', $scriptName);
		$smarty->assign('productSize', $productSize);

		loadTemplate($smarty, 'head');
		loadTemplate($smarty, 'header');
		loadTemplate($smarty, 'cart');
		loadTemplate($smarty, 'footer');
	}




/**
 * AJAX функция сохранения заказа
 *
 * @param array $_SESSION['saleCart'] массив покупаемых товаров
 * @return json инфа о результате выполнения
 */


function saveorderAction(){

	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	if (! $cart) {
		$resData['success'] = false;
		$resData['message'] = 'Нет товаров для заказа';
		echo json_encode($resData);
		return;
	}

	$name = $_POST['name'] ? $_POST['name'] : null;
	$phone = $_POST['phone'] ? $_POST['phone'] : null;
	$adress = $_POST['adress'] ? $_POST['adress'] : null;
	$orderId = makeNewOrder($name, $phone, $adress);
	if (! $orderId) {
		$resData['success'] = false;
		$resData['message'] = 'Ошибка создания заказа';
		echo json_encode($resData);
		return;
	}
	$res = setPurchaseForOrder($orderId, $cart);

	if ($res) {
		$resData['success'] = true;
		$resData['message'] = 'Заказ принят';
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
		unset($_SESSION['items']);
		unset($_SESSION['size']);
	} else {
		$resData['success'] = false;
		$resData['message'] = 'Ошибка внесения данных для заказа №' . $orderId;

	}
	echo json_encode($resData);
}

function orderAction($smarty){
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	$resData = array();

	if (! $itemsIds) {
		redirect('/cart');
		return;
	}

	$itemsCnt = array();
	foreach ($itemsIds as $item) {
		$postVar = 'itemsCnt_' . $item;
		$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
	}

	$rsProducts = getProductsFromArray($itemsIds);

	//Добавляем каждому продукту допольнительное поле
	$i=0;
	foreach ($rsProducts as &$item) {
		$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
		if ($item['cnt']) {
			$item['realPrice'] = $item['cnt'] * $item['price'];
		} else {
			unset($rsProducts[$i]);
		}
		$i++;

	}

	if (! $rsProducts) {
		echo "Корзина пуста";
		$resData['success'] = false;
		$resData['message'] = 'Корзина пуста';
		return;
	}

	$_SESSION['saleCart'] = $rsProducts;
	$resData['success'] = true;
	$resData['message'] = 'Заказ создан';
	echo json_encode($resData);
}

