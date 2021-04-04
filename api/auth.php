<?php

require_once 'connection.php'; //подключаем скрипт подключения БД

//подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
    or die('Ошибка ' .mysqli_error($link));

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

mysqli_set_charset($link, 'utf8');

if(isset($_POST['slogin'])){
    if(isset($_POST['spassword'])){
        $login = $_POST['slogin'];
        $pas = $_POST['spassword'];
    }
}

$query = "SELECT password FROM `users` WHERE `login` LIKE 'test' ";
// $query = "SELECT 'password' FROM users WHERE 'login' LIKE $login";
$result = mysqli_query($link, $query);

if($result){
    $result = mysqli_fetch_assoc($result);
    $result = $result['password'];
    if($result == $pas){
        header('Location: https://lager/');
    }
    // echo var_dump($result);
    echo $result;
}else{
    echo ('Failed');
}



mysqli_free_result($result);

mysqli_close($link);

?>

<?php
$realm = 'Запретная зона';

//user => password
$users = array('admin' => 'mypass', 'guest' => 'guest');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Текст, отправляемый в том случае, если пользователь нажал кнопку Cancel');
}


// анализируем переменную PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Неправильные данные!');


// генерируем корректный ответ
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Неправильные данные!');

// все хорошо, логин и пароль верны
echo 'Вы вошли как: ' . $data['username'];


// функция разбора заголовка http auth
function http_digest_parse($txt)
{
    // защита от отсутствующих данных
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}

?>