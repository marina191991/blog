<?php
session_start();

include '../functionsDB/dbFunctions.php';
/* Принимаем данные из формы */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $page_id = $_POST["page_id"];
    $text_comment = $_POST["text_comment"];
    if (!empty($name) && !empty($text_comment) && !empty($page_id)) {
        $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
        $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
        $arrayValues = [];
        $date = date("d.m.Y H:i");
        $arrayValues = [$name, $page_id, $text_comment, $date];
        $id = setId("comments");
        insert("comments", $id, $arrayValues);// Добавляем комментарий в таблицу
    }
    elseif (empty($text_comment)) {
        $_SESSION['message'] = 'Введите,пожалуйста,комментарий';
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }





    header("Location: " . $_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
}
