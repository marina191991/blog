<?php
session_start();
include '../functionsDB/dbFunctions.php';
include 'check.php';



//Получаем данные от элементов формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean($_POST['username']);
    $email = clean($_POST['email']);
    $password = clean($_POST['psw']);
    $passwordR = clean($_POST['pswR']);

    $id = setId("users");
    $token = md5(microtime() . 'salt' . time());


    if (!empty($name) && !empty($email) && !empty($password) && !empty($passwordR)) {

        if (checkPass($password, $passwordR) && checkLengthValues($password, $name) && validEmail($email)) {
            $password=md5(clean($_POST['psw']));
            $passwordR = md5(clean($_POST['pswR']));
            //проверка на наличие юзера в бд
            $nameArr = selectWhereFieldEqual("users", 0, $name);
            $emailArr = selectWhereFieldEqual("users", 1, $email);
            $role=3;
            if (empty($nameArr) && empty($emailArr)) {
                $data = [$name, $email, $password, $token,$role];
                insert("users", $id, $data);
                session_start();
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] =$name;
                header("Location: ../index.php");
            } else {
                if (!empty($nameArr)) {
                    $_SESSION['message'] = 'the name is using other user';
                    header("Location: ../pages/registration.php");
                }
                if (!empty($emailArr)) {
                    $_SESSION['message'] = 'the email is using other user';
                    header("Location: ../pages/registration.php");
                }
            }
        } else {
            if (!validEmail($email)) {
                $_SESSION['message'] = 'Please enter valid the email.';
                header("Location: ../pages/registration.php");
            }
            if (!checkPass($password, $passwordR)) {
                $_SESSION['message'] = 'Passwords do not match';
                header("Location: ../pages/registration.php");
            }
            if (!checkLength($name, 4, 10)) {
                $_SESSION['message'] = 'Field name must be min 4 chars and no max 10 chars';
                header("Location: ../pages/registration.php");
            }
            if (!checkLength($password, 6, 12)) {
                $_SESSION['message'] = 'Field password must be min 6 chars and max 12 chars';
                header("Location: ../pages/registration.php");
            }
        }


    } else {
        if (empty($email)) {
            $_SESSION['message'] = 'Please enter the email.';
            header("Location: ../pages/registration.php");
        }
        if (empty($name)) {
            $_SESSION['message'] = 'Please enter the name.';
            header("Location: ../pages/registration.php");

        }
        if (empty($password)) {
            $_SESSION['message'] = 'Please enter the password.';
            header("Location: ../pages/registration.php");

        }
    }

}


