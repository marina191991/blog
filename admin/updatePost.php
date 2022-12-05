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
    <title>Редактировать пост</title>

    <link href="../css/createPost.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>

<body>
<div class="top">
    <a href="adminIndex.php" class="link-home" style="">Главная</a>
    Редактирование поста
</div>
<div class="main" id='main'>

    <div class="header">
        Поиск редактируемого поста
        <?php if (isset($_SESSION['message'])) {
            echo '<p class="msg" style="color: #fc0505">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        } ?>
    </div>
    <!-- Поиск редактируемого поста-->
    <form action="../functionsApp/updatePostFunc.php" method="post" enctype="multipart/form-data" name="find">
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
        </p>
        <div class="btn-group" style="width:80%">
            <input style="width:33.3%" id="send" name="submitFind" type="submit" class="sbm" value="Поиск"/>
            <input style="width:33.3%" name="reset" type="reset" class="sbm" value="Очистить поля">
        </div>
    </form>
    <br><br><br><br>
    <!--для отладки-->
    <!-- --><?php
    /*    echo '$_SESSION["category"]' . " " . $_SESSION["category"];
        echo "<br>";
        echo '$_SESSION["title"]' . " " . $_SESSION['title'];
        echo "<br>";
        echo '$_SESSION["id"]' . " " . $_SESSION['id'];
        echo "<br>";
    echo  '$_SESSION["public"]'." ". $_SESSION['public'];
        */ ?>
    <br><br><br><br>
    <!--форма для редактирования поста-->
    <div class="header">
        Форма для редактирования
        <?php if (isset($_SESSION['message_info'])) {
            echo '<p class="msg" style="color: #fc0505">' . $_SESSION['message_info'] . '</p>';

        } ?>
    </div>
    <form action="../functionsApp/addPost.php" method="post" enctype="multipart/form-data">
        <p><label style="line-height: 2;">Информация о публикации:</label>
            <input type="text" name="id" required="required"
                   value="<?php if (isset($_SESSION['public']) && $_SESSION['public'] == 0) {
                       echo 'Не опубликовано';
                   }
                   if (isset($_SESSION['public']) && $_SESSION['public'] == 1) {
                       echo 'Опубликовано';
                   }
                   ?>" readonly/>
            <br></p>
        <p><label style="line-height: 2;">Идентификационный номер поста:</label>
            <input type="text" name="id" required="required"
                   value="<?php if (isset($_SESSION['id'])) {
                       echo $_SESSION['id'];

                   } ?>" readonly/>
            <br></p>
        <p><label style="line-height: 2;">Название поста:</label>
            <br>
            <input type="text" name="title" required="required"
                   placeholder="
                       Введите название поста" size="60"
                   value="<?php if (isset($_SESSION['title'])) {
                       echo $_SESSION['title'];
                       unset($_SESSION['title']);
                   } ?>"
            />
            <br></p>
        <p>
            <select name="category" required="required" style="margin-right: 1.3%;">
                <option value="">выберите категорию</option>
                <option <?php if (isset($_SESSION['category_num']) && ($_SESSION['category_num'] == 1)) {
                    echo 'selected';
                    unset($_SESSION['category_num']);
                } ?> value="1">People
                </option>
                <option <?php if (isset($_SESSION['category_num']) && ($_SESSION['category_num'] == 2)) {
                    echo 'selected';
                    unset($_SESSION['category_num']);
                } ?> value="2">Tray
                </
                >
                <option <?php if (isset($_SESSION['category_num']) && ($_SESSION['category_num'] == 3)) {
                    echo 'selected';
                    unset($_SESSION['category_num']);
                } ?> value="3">Food
                </option>
                <option <?php if (isset($_SESSION['category_num']) && ($_SESSION['category_num'] == 4)) {
                    echo 'selected';
                    unset($_SESSION['category_num']);
                } ?> value="4">Flies
                </option>
            </select>
            <input name="date" type="date" value="<?php if (isset($_SESSION['date'])) {
                echo $_SESSION['date'];
                unset($_SESSION['date']);
            } ?>" style="margin-right: 1.3%;"/>
            <!-- максимальный размер файла 3.5Мб-->
            <input type="hidden" name="MAX_FILE_SIZE" value="3500000"/>
            <!-- Название элемента input определяет имя в массиве $_FILES -->
            <input name="image" type="file"/>
        </p>
        <p><label style="line-height: 2;">Текст:</label>
            <br>
            <textarea name="text" required="required" placeholder="Минимум 2000 символов">
                   <?php if (isset($_SESSION['text'])) {
                       echo $_SESSION['text'];
                       unset($_SESSION['text']);
                   } ?>
                </textarea>
            <br>

        <div class="btn-group" style="width:80%">
            <input style="width:33.3%" id="save" name="submit_update" type="submit" class="sbm" value="Сохранить"/>
            <?php if (isset($_SESSION['public']) && $_SESSION['public'] == 0) {
                echo '<input style="width:33.3%" id="saveAndPublic" type="submit" class="sbm" name="submit_update_and_push" value="Сохранить и опубликовать">';
            } ?>
            <input style="width:33.3%" name="reset" type="reset" class="sbm" value="Очистить поля">
        </div>

    </form>

    <br><br><br><br>
    <!--сюда выводим результат поиска-->
    <div class="header">
        Отображение поста
        <?php if (isset($_SESSION['message_info'])) {
            echo '<p class="msg" style="color: #fc0505">' . $_SESSION['message_info'] . '</p>';
            unset($_SESSION['message_info']);
        } ?>
    </div>

    <?php if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        include_once '../pages/postPart.php';
        unset($_SESSION['id']);
        unset($_SESSION['public']);
        // unset($_SESSION['category']);

    } ?>

</div>
<!--footer-->

</body>
</html>


