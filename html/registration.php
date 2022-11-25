<?php session_start();
include '../functionsApp/authByCookies.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V9</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="../css/registration.css">

    <meta name="robots" content="noindex, follow">
<body class="body">

<div class="container-login">
    <div>
        <form name="registration" method="post" action="/functionsApp/registrFunc.php" style="height: 760px">
            <div class="container">
                <h3>Register</h3>
                <p class="info">Please fill in this form to create an account.</p>
                <hr>
                <label id="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label id="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label id="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <label id="psw_repeat"><b>Repeat password</b></label>
                <input type="password" placeholder="Enter repeat password" name="pswR" required>
                <?php if (!$_SESSION['message'])
                    echo '<hr>'?>

               <?php
              if ($_SESSION['message']) {
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
                ?>
                <button type="submit" class="registerbtn">Register</button>
                <div class="signin info">
                    <p>Уже есть аккаунт? <a href="auth.php">Войти</a>.</p>
                </div>
                <p class="info" style="font-size: 10px">Создавая аккаунт,
                    вы соглашаетесь с нашими условиями
                    конфиденциальности <a href="#">Условия и конфиденциальность</a>.</p>

            </div>


        </form>
    </div>
</div>
</body>
</html>
