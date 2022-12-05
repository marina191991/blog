<?php
session_start();
include_once '../functionsDB/dbFunctions.php';
include_once '../functionsApp/commentOut.php';
include_once '../functionsApp/postFunctions.php'?>
<?php include_once 'docTypeHTML.php' ?>
<?php include_once 'headPartForPostPage.php' ?>
<body class="body">
<div id="masthead" class="site-header" role="banner" style="margin-bottom: 0;">
    <img alt="Cat's blogggg....." src="/images/header.jpg" class="responsive">
</div>
<div class="main" id="main">
    <?php include_once 'topMenu.php'; ?>
    <div id="primary" class="site-content" style="padding-top: 50px">
        <div id="content">
            <header id="archive_header" class="archive-header">
                <div class="archive-meta">
                    Пушистые и не очень, добро пожаловать в первый кошачий блог! Здесь мы будем делиться опытом,
                    искать решения и многое другое. Рыба сама себя не съест, поэтому доставайте свои когти и
                    бейте по клавишам. Блог ждет своего героя!
                </div>
            </header>
            <?php

            $text=file_get_contents('postPartForGetShortPost.php');
            if (!(getNewPostsFromCategory("posts","People",$text))) {
                echo '<div   style="display: flex;" >
 <img src="/images/142109670_SAD_CAT_400.gif" ><p>Пока нет постов :(</p></div> ';
            }; ?>
        </div>
    </div>
    <?php include_once 'secondaryPart.php' ?>
</div>
<!--footer-->
<?php include_once 'footer.php' ?>
</body>
</html>

