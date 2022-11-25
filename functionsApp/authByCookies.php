<?php
include '../functionsDB/dbFunctions.php';
//Если пустая переменная used_id из сессии (для авторизованного она со значением).

if (empty($_SESSION['user_id'])) {
    //Проверяем, не пустые ли нужные нам куки...
    if (isset($_COOKIE['token']) && $_COOKIE['token'] != null) {
        $key = $_COOKIE['token'];
        $queryResult = selectWhereFieldEqual("users", 3, $key);
        if (!empty($queryResult)) {
            $id = getIdByField("users", 3, $key);
            session_start();
            $_SESSION['user_id'] = $id;

        }
    }
}


