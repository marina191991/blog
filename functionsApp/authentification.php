<?php
include 'check.php';
include '../functionsDB/dbFunctions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = clean($_POST['email']);
    $password = clean($_POST['psw']);

    if (!empty($email) && !empty($password)) {
        if (checkLength($password, 6, 12) && validEmail($email)) {
            $password = md5(clean($_POST['psw']));
            //поиск по базе юзера с данными присланными в пост запросе
            $userCheckExist = selectWhereFieldsEqual("users", 1, $email, 2, $password);
            $emailArr = selectWhereFieldEqual("users", 1, $email);
            $passwordArr = selectWhereFieldEqual("users", 2, $password);
            if (!empty($userCheckExist)) {
                $id = getIdByField("users", 1, $email);
                $userName=getValueById("users",$id,0);
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $userName;
               /**check checkbox 'Remember me' and add cookie*/
                if (!empty($_REQUEST['remember']) && $_REQUEST['remember'] == 1) {
                    $token = getValueById("users", $id, 3);
                    setcookie('token', $token, time() + 60 * 60 * 24,"/"); //действует во всех каталогах сайта за счет "/"
                   /** Чтобы установленная кука сразу появилась в массиве $_COOKIE*/
                    $_COOKIE['token'] = $token;
                }

                header("Location: ../html/index.php");
            } else {
                //случай, когда емэйл есть в базе, но он не совпадает с паролем
                if (!empty($emailArr)) {
                    $_SESSION['message'] = 'there is no user with this email';
                    header('Location: ../html/auth.php');
                }
                //случай, когда нет в базе
                if (empty($emailArr)) {
                    $_SESSION['message'] = 'there is no user with this email';
                    header('Location: ../html/auth.php');
                }
                if (empty($passwordArr)) {
                    $_SESSION['message'] = 'the password is not correct';
                    header('Location: ../html/auth.php');
                }
                //случай, когда пароль существует в базе, но не подходит юзеру
                if (!empty($passwordArr)) {
                    $_SESSION['message'] = 'the password is not correct';
                    header('Location: ../html/auth.php');
                }
            }
        } else {
            if (!validEmail($email)) {
                $_SESSION['message'] = 'Please enter valid the email.';
                header('Location: ../html/auth.php');

            }
            if (!checkLength($password, 6, 12)) {
                $_SESSION['message'] = 'Field password must be min 6 chars and max 12 chars';
                header('Location: ../html/auth.php');

            }
        }


    } else {
        if (empty($email)) {
            $_SESSION['message'] = 'Please enter the email.';
            header('Location: ../html/auth.php');
        }

        if (empty($password)) {
            $_SESSION['message'] = 'Please enter the password.';
            header('Location: ../html/auth.php');

        }
    }

}