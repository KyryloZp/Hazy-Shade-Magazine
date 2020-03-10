<?php 

	/**
	 * Модель для таблицы продукции (products)
	 */
	

	/**
	 * Получаем последние добавленные товары
	 * @param  integer $limit Лимит товаров
	 * @return array        Массив товаров
	 */
	function getLastProducts($limit = null) {
		$sql = 'SELECT *
		FROM `products`
		ORDER BY id DESC';

		if($limit) {
			$sql .= " LIMIT {$limit}";
		}

		$rs = mysql_query($sql);

		return createSmartyRsArray($rs);
	}

	/**
	 * Получить продукты для категории $itemId
	 * @param  integer $itemId ID категории
	 * @return array         массив продуктов
	 */
	function getProductsByCat($itemId) {
		$itemId = intval($itemId);

		$sql = "SELECT *
		FROM products
		WHERE category_id = ' {$itemId} '";

		$rs = mysql_query($sql);

		return createSmartyRsArray($rs);
	}

	/**
	 * Получить данные продукта по родительскому ID
	 * @param  integer $itemId ID родителя
	 * @return arra         массив данных продукта
	 */
	function getProductsByParentCat($itemId) {
		$itemId = intval($itemId);

		$sql = "SELECT *
		FROM products
		WHERE parent_id = ' {$itemId} '";

		$rs = mysql_query($sql);

		return createSmartyRsArray($rs);
	}

	/**
	 * Получить данные продукта по ID
	 * @param  integer $itemId ID продукта
	 * @return array         массв данных продукта
	 */
	function getProductById($itemId){
		$itemId = intval($itemId);
		$sql = "SELECT *
		FROM products
		WHERE id = '{$itemId}'";

		$rs = mysql_query($sql);
		return mysql_fetch_assoc($rs);
	}

	/**
	 * Получить список продуктов из массива индентификаторов ID-s
	 * @param  array $itemsIds массив индентификаторов продуктов
	 * @return array           массив данных продуктов
	 */
	function getProductsFromArray($itemsIds){

		$strIds = implode(', ', $itemsIds);
		$sql = "SELECT *
		FROM products
		WHERE id in ({$strIds})";

		$rs = mysql_query($sql);
		return createSmartyRsArray($rs);
	}

	/**
	 * Получить список всех товаров и отсортировать по категории ID
	 * @return array массив товаров
	 */
	function getProducts(){

		$sql = "SELECT *
		FROM `products`
		ORDER BY category_id";

		$rs = mysql_query($sql);
		return createSmartyRsArray($rs);
	}

	/**
	 * Добавление нового товара
	 * @param  string $itemName  Название продукта
	 * @param  integer $itemPrice Цена
	 * @param  string $itemDesc  Описание
	 * @param  integer $itemCat ID  категории
	 * @param  integer  itemParentCat Родительская категория продукта
	 * @return [type]       
	 */
	function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat, $itemParentCat) {

		$sql = "INSERT INTO products (`name`, `price`, `description`, `category_id`, `parent_id`)
		VALUES ('{$itemName}', '{$itemPrice}', '{$itemDesc}', '{$itemCat}', '{$itemParentCat}')";

		$rs = mysql_query($sql);
		return $rs;
	}

	function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $itemParentCatId, $itemSize, $newFileName = null) {

		$set = array();

		if ($itemName) {
			$set[] = "`name`='{$itemName}'";
		}

		if ($itemPrice > 0) {
			$set[] = "`price`='{$itemPrice}'";
		}

		if ($itemStatus != null) {
			$set[] = "`status`='{$itemStatus}'";
		}

		if ($itemDesc) {
			$set[] = "`description`='{$itemDesc}'";
		}

		if ($itemCat) {
			$set[] = "`category_id`='{$itemCat}'";
		}

		if ($newFileName) {
			$set[] = "`image`='{$newFileName}'";
		}

		if ($itemParentCatId) {
			$set[] = "`parent_id`='{$itemParentCatId}'";
		}

		if ($itemSize) {
			$set[] = "`size`='{$itemSize}'";
		}

		$setStr = implode($set, ", ");
		$sql = "UPDATE products
		SET {$setStr}
		WHERE id = '{$itemId}'";

		$rs = mysql_query($sql);
		return $rs;
	}


	function updateProductImage($itemId, $newFileName){
		$rs = updateProduct($itemId, null, null, null, null, null, null, null, $newFileName);

		return $rs;
	}


	function getProductGalery($itemId) {

		$sql = "SELECT `catalog_img`
		FROM products
		WHERE id = '{$itemId}'";

		$rs = mysql_query($sql);
		return createSmartyRsArray($rs);

	}

	function updateProductGallery($itemId, $setStr){

		$sql = "UPDATE products
		SET `catalog_img` = '{$setStr}'
		WHERE id = '{$itemId}'";

		$rs = mysql_query($sql);
		return $rs;
	}



/**
 * Получить продукты в зависимости от цены и категории (фильтрация по цене, категории и размеру)
 * @param  integer $itemId   ID категории
 * @param  integer $minValue минимальная цена
 * @param  integer $maxValue максимальная цена
 * @param  string  $itemSize  размер одежды
 * @return array           массив с полученными товарами
 */
function getProductsForPriceAndCat($itemId, $minValue, $maxValue, $itemSize){
	$itemId = intval($itemId);
	$minValue = intval($minValue);
	$maxValue = intval($maxValue);


	if ($itemId > 2) {
		$value = "`category_id`";
	} else {
		$value = "`parent_id`";
	}

	if ($maxValue == 1) {
		$sql = "SELECT *
		FROM products
		WHERE {$value} = '{$itemId}'";
	} else {
		$sql = "SELECT *
		FROM products
		WHERE `price` >= '{$minValue}'
		and `price` <= '{$maxValue}'
		and {$value} = '{$itemId}'";
	}



	if ($itemSize) {
		$sql .= " and `size` LIKE '%{$itemSize}%'";
	}

	$rs = mysql_query($sql);
	return createSmartyRsArray($rs);


}

function deleteProduct($itemId) {

	$sql = "DELETE FROM products 
			WHERE id = '{$itemId}'";

	$rs = mysql_query($sql);
	return $rs;
}