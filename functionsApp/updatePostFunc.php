<?php
session_start();
include_once '../functionsDB/dbFunctions.php';
include_once 'check.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**Если отправлена форма для поиска*/
    if (isset($_POST['submitFind'])) {
        $title = clean($_POST['title']);
        $categoryNumber = $_POST['category'];
        $date = $_POST['date'];
        /*Сделаем пока поиск по имени и категории. Дата пока не обязательно. Мы с ней доработаем поиск позже*/
        /**Если название и категория есть, а дата отсутствует*/
        if (!empty($title) && !empty($categoryNumber) && empty($date)) {
            $arrayResultTitleCategory = [];
            /**Поиск текстового названия категории. так как в БД поста категория имеет полное название, а не число*/
            $category = getValueById("category", $categoryNumber, 1);
            $arrayResultTitleCategory = selectWhereFieldsEqual("posts", 2, $title, 5, $category);
            if (!empty($arrayResultTitleCategory)) {
                $id = $arrayResultTitleCategory[0][0];
                $text = $arrayResultTitleCategory[0][4];
                $date = $arrayResultTitleCategory[0][1];
                $public = $arrayResultTitleCategory[0][6];
                $category = getValueById("category", $categoryNumber, 1);
                $_SESSION['id'] = $id;
                //$_SESSION['category'] = $category;
                $_SESSION['title'] = $title;
                $_SESSION['text'] = $text;
                $_SESSION['date'] = $date;
                $_SESSION['category_num'] = $categoryNumber;
                $_SESSION['public'] = $public;
            }
            if (empty($arrayResultTitleCategory)) {
                /*добавить информацию об отсутствии результата поиска*/
                $_SESSION['message_info'] = "Пост не найден";
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
        /**Если название и дата имеется*/
        if (!empty($title) && !empty($date) && empty($category)) {
            $arrayResultTitleDate = [];
            $arrayResultTitleDate = selectWhereFieldsEqual("posts", 2, $title, 1, $date);
            /**Если найдет пост*/
            if (!empty($arrayResultTitleDate)) {
                $id = $arrayResultTitleDate[0][0];
                $text = $arrayResultTitleDate[0][4];
                $date = $arrayResultTitleDate[0][1];
                // $category = getValueById("category", $categoryNumber, 1);
                $_SESSION['id'] = $id;
                //$_SESSION['category'] = $category;
                $_SESSION['title'] = $title;
                $_SESSION['text'] = $text;
                $_SESSION['date'] = $date;
                $_SESSION['category_num'] = $categoryNumber;
            }
            if (empty($arrayResultTitleDate)) {
                /*добавить информацию об отсутствии результата поиска*/
                $_SESSION['message_info'] = "Пост не найден";
            }
            /*TODO дописать*/
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }

}
