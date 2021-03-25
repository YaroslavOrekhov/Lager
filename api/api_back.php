<?php

require_once 'connection.php'; //подключаем скрипт подключения БД

echo 'host: '.$host.'<br>';
echo 'user: '.$user.'<br>';
echo 'password: '.$password.'<br>';
echo 'database: '.$database.'<br>';

//подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
    or die('Ошибка ' .mysqli_error($link));

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

// echo gettype($link);
// var_dump($link);  
$query = "SELECT * FROM child_group";
$result = mysqli_query($link, $query);
// var_dump( $result);
// echo $result;
if ($result){
    $rows = mysqli_num_rows($result);
    echo $rows;

    echo "<table><tr><th>Id</th><th>Num</th><th>Name</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    // очищаем результат
    mysqli_free_result($result);
}

function get_data(){

    $query = "SELECT * FROM child_group";
    
    if($result = mysqli_query($link, $query) === true){
        echo 'Succec';
    } else {
        echo 'fail';
    }
    //  or die ('Ошибка ' .mysql_error($link));
    return $result;
};

// $a = get_data();
//  echo $a;

    

//закрытие подключения к БД
mysqli_close($link);

?>