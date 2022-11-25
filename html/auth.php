<?php session_start();
include 'functionsApp/authByCookies.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V9</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="../css/auth.css">

    <meta name="robots" content="noindex, follow">
<body class="body">
<div class="container-login">
    <div>
        <form action="/functionsApp/authentification.php" method="post" name="auth" style="height: 650px;">
            <div class="container">
                <h3>Log in</h3>
                <p class="info">Please fill in this form to sign in.</p>
                <hr>
                <label id="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                <label id="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <?php if (!$_SESSION['message'])
                    echo '<hr>' ?>
                <?php if ($_SESSION['message'])
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                unset($_SESSION['message'])
                ?>
                <button type="submit" class="signinsbm">sign in</button>
                <div>
                    <input type="checkbox" name="remember" value="1"><label id="remember me" class="info">Remember
                        me</label><br>
                </div>
                <div class="forgetPass info" style="">
                    <p><a href="auth.php" id="forget_password">Forget password?</a></p>
                </div>
            </div>


        </form>
    </div>
</div>
</body>
</html>
