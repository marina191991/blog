<?php
include_once '../functionsApp/postFunctions.php';
include_once '../functionsDB/dbFunctions.php';
include_once '../functionsApp/commentOut.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Создать пост</title>
    <link href="../css/adminIndex.css" rel="stylesheet">
    <link href="../css/createPost.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<div class="top">
    Меню администратора
</div>
<div class="main-index" id='main'>
    <div class="header-adm-index " style="margin-bottom: 3%;">
        <a href="createPost.php"> Создание поста</a>
    </div>
    <div class="header-adm-index " style="margin-bottom: 3%;">
        <a href="updatePost.php" style="padding: 3% 68% 3% 0px;">Редактирование поста</a>
    </div>
    <div class="header-adm-index ">
        <a href="#"> Удаление </a>
    </div>

</div>

<div><!--footer--></div>

</body>
</html>


