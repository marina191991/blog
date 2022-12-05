<?php
session_start();
include '../functionsDB/dbFunctions.php';
if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
    $id = (int)$_SESSION['user_id'];
    $_SESSION['user_id'] = null;
    $_SESSION['user_name']=null;
}
elseif (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {
    $id = (int)$_SESSION['admin_id'];
    $_SESSION['admin_id'] = null;
    $_SESSION['admin_name']=null;
}
elseif (isset($_SESSION['moderator_id']) && isset($_SESSION['moderator_name'])) {
    $id = (int)$_SESSION['moderator_id'];
    $_SESSION['moderator_id'] = null;
    $_SESSION['moderator_name']=null;
}

if (isset($_COOKIE['token'])) {
    setcookie('token', '', time()); //удаляем ключ
    unset($_COOKIE['token']);
//перезаписываем токен у пользователя
    $token = md5(microtime() . 'salt' . time());
    insertValueById("users", $id, $token, 3);
}
/**Добавить хитрое удаление куков */
header("Location: " . $_SERVER["HTTP_REFERER"]);
//header("Location: ../pages/index.php");
