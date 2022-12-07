<?php
include_once 'publicPost.php';
include_once '../functionsDB/dbFunctions.php';
include_once 'postFunctions.php';
include_once 'check.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = clean($_POST['title']);
    $category = $_POST['category'];
    $text = clean($_POST['text']);
    $date = $_POST['date'];
    /** Если запрос пришел от страницы createPost admin */
    if (isset($_POST['submit_save']) || isset($_POST['submit_save_and_push'])) {
        $id = setId("posts");
    }
    if (isset($_POST['submit_save'])) {
        $public = 0;
    }
    if (isset($_POST['submit_save_and_push'])) {
        $public = 1;
    }
    if (isset($_POST['submit_update_and_push'])) {
        $id = $_POST['id'];
        $public = 1;
    }
    /** Если отправлена форма для обновления update post*/
    if (isset($_POST['submit_update'])) {
        $id = $_POST['id'];
        $public = $_POST['public'];
    }
    $errorCode = $_FILES['image']['error'];
    //проверка на количество символов в тексте
    $checkSizeText = checkCountCharsInText($text);
    if (!empty($title) && !empty($category) && !empty($text) && ($checkSizeText) && !empty($date) && isset($_FILES) && ($errorCode == UPLOAD_ERR_OK)) {
        //загружаем файл и получаем имя файла
        $nameImage = makeUpload($_FILES['image']);
        //готовим массив для загрузки в БД в категорию 'posts'
        $category = getValueById("category", $category, 1);
        $data = [];
        $data = [$id, $date, $title, $nameImage, $text, $category, $public];
        //загружаем в БД
        insert("posts", $id, $data);
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        if (isset($_POST['submit_save_and_push']) || isset($_POST['submit_update_and_push'])) {
            publicPost($id);
        }

    }

    /**Обработка ошибок*/
    if (!isset($_FILES) || $errorCode != UPLOAD_ERR_OK) {
        $checkErrorUpload = checkErrorUploadImage($errorCode);
        if (!empty($checkErrorUpload)) {
            $_SESSION['message'] = $checkErrorUpload;
        } else {
            $checkTypeImage = checkTypeImageFile($_FILES['image']);
            if ($checkTypeImage) {
                $_SESSION['message'] = 'Недопустимый тип файла.';
            }
        }
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    if (!$checkSizeText) {
        $_SESSION['message'] = "Введите минимум 2000 символов";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    if (empty($title)) {
        $_SESSION['message'] = 'заполните название поста';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    if (empty($category)) {
        $_SESSION['message'] = 'выберите категорию';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    if (empty($text)) {
        $_SESSION['message'] = 'Введите текст';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    if (empty($date)) {
        $_SESSION['message'] = 'Установите дату';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

/**Загрузка файла в БД*/
function makeUpload(array $fileImage): string
{
    $nameImage = mt_rand(0, 10000) . $fileImage["name"];
    move_uploaded_file($fileImage["tmp_name"], "../images/$nameImage");
    return $nameImage;
}







