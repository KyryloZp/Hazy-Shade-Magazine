<?php 

/**
 * Внесение в БД данных продуктов с привязкой к заказу
 * @param integer $orderId ID - заказа
 * @param array $cart    массив корзины
 * @return boolean True or False в зависимости от успешности добавления в БД
 */
function setPurchaseForOrder($orderId, $cart) {

	$sql = "INSERT INTO purchase
			(`order_id`, `product_id`, `price`, `amount`, `full_price`)
			values ";

	$values = array();
	foreach ($cart as $item) {
		$values[]= "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}', '{$item['realPrice']}')";
	}

	$sql .= implode($values, ', ');
	$rs = mysql_query($sql);
	return $rs;
}

function getPurchaseForOrder($orderId){

	$sql = "SELECT `pe`.*, `ps`.`name`, `ps`.`image`
			FROM purchase as `pe`
			JOIN products as `ps` ON `pe`.product_id = `ps`.id
			WHERE `pe`.order_id = {$orderId}";

	$rs = mysql_query($sql);
	return createSmartyRsArray($rs);
}