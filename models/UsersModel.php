<?php 

/**
 * Модель для таблицы пользователей (users)
 * 
 */

/**
 * Регистрация нового пользователя
 * @param  string $email  почта
 * @param  string $pwdMD5 пароль зашифрованный в MD5
 * @param  string $name   имя пользователя
 * @param  string $phone  телефон
 * @param  string $adress адрес пользователя
 * @return array         массив данных нового пользователя
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress, $secondName, $companyName, $nip, $zipCode, $city, $country) {

	$email = htmlspecialchars(mysql_real_escape_string($email));
	$name = htmlspecialchars(mysql_real_escape_string($name));
	$phone = htmlspecialchars(mysql_real_escape_string($phone));
	$adress = htmlspecialchars(mysql_real_escape_string($adress));
	$secondName = htmlspecialchars(mysql_real_escape_string($secondName));
	$companyName = htmlspecialchars(mysql_real_escape_string($companyName));
	$nip = htmlspecialchars(mysql_real_escape_string($nip));
	$zipCode = htmlspecialchars(mysql_real_escape_string($zipCode));
	$city = htmlspecialchars(mysql_real_escape_string($city));
	$country = htmlspecialchars(mysql_real_escape_string($country));
	
	$sql = "INSERT INTO
	users (`email`, `pwd`, `name`, `phone`, `adress`, `second-name`, `company-name`, `nip`, `zip-code`, `city`, `country`)
	VALUES ('.{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}', '{$secondName}', '{$companyName}', '{$nip}', '{$zipCode}', '{$city}', '{$country}')";

	$rs = mysql_query($sql);

	if ($rs) {
		$sql = "SELECT *
		FROM users
		WHERE (`email` = '.{$email}') and `pwd` = '{$pwdMD5}'
		LIMIT 1";

		$rs = mysql_query($sql);
		$rs = createSmartyRsArray($rs);

		if (isset($rs[0])) {
			$rs['success'] = true;
		} else {
			$rs['success'] = false;
		}
	} else {
		$rs['success'] = false;
	}
	return $rs;
}

/**
 * Проверка параметров для регистрации пользователя
 * @param  string $email      почта
 * @param  string $pwd        пароль
 * @param  string $confirmPwd повтор пароля
 * @return array             результат
 */
function checkRegisterParams($email, $pwd, $confirmPwd){
	$res = null;

	if(! $email){
		$res['success'] = false;
		$res['message'] = 'Введите email';
	}

	if (! $pwd) {
		$res['success'] = false;
		$res['message'] = 'Введите пароль';
	}
	if (! $confirmPwd) {
		$res['success'] = false;
		$res['message'] = 'Введите пароль';
	}
	if ($pwd != $confirmPwd) {
		$res['success'] = false;
		$res['message'] = 'Пароли не совпадают';
	}
	return $res;
}


/**
 * Проверка почты(есть ли такая же почта)
 * @param  string $email 
 * @return array        строка из таблицы users, либо пустой массив
 */
function checkUserEmail($email){
	$email = mysql_real_escape_string($email);
	$sql = "SELECT id
			FROM users
			WHERE email = '.{$email}'";

	$rs = mysql_query($sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}

/**
 * Авторизация пользователя
 * @param  string $email почта(логин)
 * @param  string $pwd   пароль
 * @return array        массив данных пользователя
 */
function loginUser($email, $pwd){
	$email = htmlspecialchars(mysql_real_escape_string($email));
	$pwd = md5($pwd);

	$sql = "SELECT *
			FROM users
			WHERE (`email` = '.{$email}' and `pwd` = '{$pwd}')
			LIMIT 1";

	$rs = mysql_query($sql);

	$rs = createSmartyRsArray($rs);
	if (isset($rs[0])) {
		$rs['success'] = true;
	} else {
		$rs['success'] = false;
	}
	return $rs;
}


/**
 * Изменения данных о пользователе
 * @param   string  $email       почта пользователя
 * @param   string  $pwd         новый пароль
 * @param   string  $confirmPwd  повтор нового пароля
 * @param   string  $oldPwd      старый пароль
 * @param   string  $name        Имя пользователя
 * @param   string  $phone       телефон
 * @param   string  $adress      адресс
 * @param   string  $secondName  Фамилия пользователя
 * @param   string  $companyName Имя компании в которой работает пользователь
 * @param   string  $nip         почтовый индекс
 * @param   string  $zipCode     зип код
 * @param   string  $city        город в котором проживает пользователь
 * @param   string  $country     страна в которой проживает пользователь
 * @return boolean    true          в случае успеха
 */
function updateUserData($pwd, $confirmPwd, $oldPwd, $name, $phone, $adress, $secondName, $companyName, $nip, $zipCode, $city, $country) {

	$email = htmlspecialchars(mysql_real_escape_string($_SESSION['user']['email']));
	$name = htmlspecialchars(mysql_real_escape_string($name));
	$phone = htmlspecialchars(mysql_real_escape_string($phone));
	$adress = htmlspecialchars(mysql_real_escape_string($adress));
	$secondName = htmlspecialchars(mysql_real_escape_string($secondName));
	$companyName = htmlspecialchars(mysql_real_escape_string($companyName));
	$nip = htmlspecialchars(mysql_real_escape_string($nip));
	$zipCode = htmlspecialchars(mysql_real_escape_string($zipCode));
	$city = htmlspecialchars(mysql_real_escape_string($city));
	$country = htmlspecialchars(mysql_real_escape_string($country));

	$pwd = trim($pwd);
	$confirmPwd = trim($confirmPwd);
	$oldPwd = trim($oldPwd);

	$newPwd = null;
	if ($pwd && ($pwd == $confirmPwd)) {
		$newPwd = md5($pwd);
		$oldPwd = md5($oldPwd);

	}
	
	$sql = "UPDATE `users`
			SET ";

	if ($pwd) {
		$sql .= "`pwd` = '{$newPwd}', " ;
	}

	$sql .= " `name` = '{$name}',
			`phone` = '{$phone}',
			`adress` = '{$adress}',
			`second-name` = '{$secondName}',
			`company-name` = '{$companyName}',
			`nip` = '{$nip}',
			`zip-code` = '{$zipCode}',
			`country` = '{$country}'
			WHERE
			`email` = '{$email}'";
	if ($pwd) {
			$sql .= " AND `pwd` = '{$oldPwd}'";
	}
	$sql .= "LIMIT 1";

	$rs = mysql_query($sql);

	return $rs; 
}

/**
 * Получить данные заказа текущего пользователя
 * 
 * @return array массив заказов с привязкой к продуктам
 */
function getCurUserOrders() {

	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
	$rs = getOrderWithProductsByUser($userId);

	return $rs;
}