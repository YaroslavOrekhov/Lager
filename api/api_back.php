<?php

require_once 'connection.php'; //подключаем скрипт подключения БД

//подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
    or die('Ошибка ' .mysqli_error($link));

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

mysqli_set_charset($link, "utf8");

$query = "SELECT * FROM child_group";
$result = mysqli_query($link, $query);

$rows = mysqli_num_rows($result);

if ($result){
    $output = '';
    $rows = mysqli_num_rows($result);
    $row;

    $number=[];
    $name=[];
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        $number[$i].=$row[1];
        $name[$i].=$row[2];
    }

    $out = json_encode(array(
        count=>$rows,
        number=>$number,
        name=>$name
    ));
    echo $out;    
}

// очищаем результат
mysqli_free_result($result);

//закрытие подключения к БД
mysqli_close($link);

?>