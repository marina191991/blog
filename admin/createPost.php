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

    <link href="../css/createPost.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<div class="top">
    <a href="adminIndex.php" class="link-home" style="">Главная</a>
    Создание поста
</div>
<div class="main" id='main'>
<div class="header">
    Все поля обязательны для заполнения
    <?php if (isset($_SESSION['message'])) {
        echo '<p class="msg" style="color: #fc0505">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    } ?>
</div>

<form action="../functionsApp/addPost.php" method="post" enctype="multipart/form-data">
    <p><label style="line-height: 2;">Название поста:</label>
        <br>
        <input type="text" name="title" required="required"
               placeholder="Введите название поста" size="60"/>
        <br></p>
    <p>
        <select name="category" required="required" style="margin-right: 1.3%;">
            <option value="">выберите категорию</option>
            <option value="1">People</option>
            <option value="2">Tray</option>
            <option value="3">Food</option>
            <option value="4">Flies</option>
        </select>
        <input name="date" type="date" style="margin-right: 1.3%;"/>
        <!-- максимальный размер файла 3.5Мб-->
        <input type="hidden" name="MAX_FILE_SIZE" value="3500000"/>
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        <input name="image" type="file"/>
    </p>
    <p><label style="line-height: 2;">Текст:</label>
        <br>
        <textarea name="text" required="required" placeholder="Минимум 2000 символов"></textarea>
        <br>
      <!--  <input type="hidden" name="action" value="submit" />-->
    <div class="btn-group" style="width:80%">
        <input style="width:33.3%" id="save" name="submit_save" type="submit" class="sbm" value="Сохранить"/>
          <input style="width:33.3%" id="saveAndPublic" type="submit" class="sbm" name="submit_save_and_push" value="Сохранить и опубликовать">
<!--        <input type="checkbox" name="public" value="1"><label id="remember me" class="info">опубликовать</label><br>
-->        <input style="width:33.3%" name="reset" type="reset" class="sbm" value="Очистить поля">
    </div>

</form>
</div>
<!--footer-->

</body>
</html>


