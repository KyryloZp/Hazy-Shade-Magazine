<?php 
	
	/**
	 * Инициализация подключения к БД
	 */
	
	$dblocation = "127.0.0.1";
	$dbname = "magazine";
	$dbuser = "root";
	$dbpassword = "";

	// соединяемся к БД
	$db = mysql_connect($dblocation, $dbuser, $dbpassword);

	if(! $db) {
		echo "Ошибка доступа к MySQl";
		exit();
	}

	// устанавливаем кодировку по умолчанию для текущего соединения
	mysql_set_charset('utf8');

	if( ! mysql_selectdb($dbname, $db)) {
		echo "Ошибка доступа к базе данных:" . $dbname;
		exit();
	}
