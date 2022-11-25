<?php
include '../functionsDB/dbFunctions.php';

//получить список комментариев по id страницы
 function getCommentsByIdPage(int $idPage) {
    foreach (selectWhereFieldEqual("comments",1,$idPage) as $item) {
        echo "<li>"."<article>"."<header class='header-one-comment'>"."<cite class='name-comment'>".$item[0]."</cite>"."<small class='data_comment'>".$item[3]
            ."</small>"."</header>"."<section class='text-comment'>".$item[2]
            ."</section>"."</article>"."</li>";
    }
 }
 //посчитать количество комментариев к статье
 function getCountComments($idPage): ?int {
   return  count(selectWhereFieldEqual("comments",1,$idPage));
 }





