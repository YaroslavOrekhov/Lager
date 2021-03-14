<?php

require_once 'connection.php'; //подключаем скрипт подключения БД

//подключаемся к серверу
$link = mysql_connect($host, $user, $password, $database)
    or die('Ошибка ' .mysql_error($link));

//операции с БД
$query ="SELECT * FROM child_group";
$result = mysql_query($link, $query) or die ('Ошибка ' .mysql_error($link));
if($result)
{
    echo "Выполнение запроса прошло успешно";
    echo $result;
}

//закрытие подключения к БД
mysql_close($link);

?>