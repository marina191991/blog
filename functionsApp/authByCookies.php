<?php
include_once '../functionsDB/dbFunctions.php';
include_once 'functionsDB/dbFunctions.php';
//Если пустая переменная used_id/admin_id/moderator_id из сессии (для авторизованного она со значением).

if (empty($_SESSION['user_id']) && empty($_SESSION['admin_id']) && empty($_SESSION['moderator_id'])) {
    //Проверяем, не пустые ли нужные нам куки...
    if (isset($_COOKIE['token'])) {
        $key = $_COOKIE['token'];
        $queryResult = selectWhereFieldEqual("users", 3, $key);
        if (!empty($queryResult)) {
            $id = getIdByField("users", 3, $key);
            $role = getValueById("users", $id, 4);
            $userName = getValueById("users", $id, 0);
            switch ($role) {
                case 1:
                    $_SESSION['admin_id'] = $id;
                    $_SESSION['admin_name'] = $userName;
                    break;

                case 2:
                    $_SESSION['moderator_id'] = $id;
                    $_SESSION['moderator_name'] = $userName;
                    break;

                case 3:
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $userName;
                    break;
            }

        }
    }
}
