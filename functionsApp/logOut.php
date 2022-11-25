<?php
session_start();
include '../functionsDB/dbFunctions.php';

$id = (int)$_SESSION['user_id'];
$_SESSION['user_id'] = null;
$_SESSION['user_name']=null;
if (isset($_COOKIE['token'])) {
    setcookie('token', '', time()); //удаляем ключ
    unset($_COOKIE['test']);
//перезаписываем токен у пользователя
    $token = md5(microtime() . 'salt' . time());
    insertValueById("users", $id, $token, 3);
}
/**Добавить хитрое удаление куков */
header("Location: " . $_SERVER["HTTP_REFERER"]);
//header("Location: ../html/index.php");
