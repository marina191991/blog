<?php session_start();
include 'functionsApp/authByCookies.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/style.css" rel="stylesheet">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body class="body">
<div id="masthead" class="site-header" role="banner" style="margin-bottom: 0;">

    <img alt="Cat's blogggg....." src="../images/header.jpg" class="responsive">

</div>
<div class="main" id="main">
    <nav id="site-navigation" class="themonic-nav" role="navigation" style="padding-bottom: 70px;">
        <div class="menu-container">
            <ul class="menu-main">
                <?php if (empty($_SESSION['user_id'])): ?>
                    <li><a href="registration.php" class="current"> Войти</a></li>
                <?php endif; ?>
                <li><a href="">Обо мне</a></li>
                <li><a href="index.php">Главная</a></li>
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <li><a href="../functionsApp/logOut.php">Выйти</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div id="primary" class="site-content" style="padding-top: 50px">
        <div id="content">
            <header id="archive_header" class="archive-header">
                <div class="archive-meta">
                    Пушистые и не очень, добро пожаловать в первый кошачий блог! Здесь мы будем делиться опытом,
                    искать решения и многое другое. Рыба сама себя не съест, поэтому доставайте свои когти и
                    бейте по клавишам. Блог ждет своего героя!
                </div>
            </header>
            <article id="post-1" class="post">
                <header class="entry header" style="margin: 20px 0 10px;">
                    <h2 class="entry-title" style="margin-bottom: 10px;">
                        <a href="post1.php"
                           title="Как нассать в тапок и получить курочку на ужин"
                           rel="bookmark">
                            Как нассать в тапок и получить курочку на ужин?</a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <div class="excerpt-thumb">
                        <a href="../images/tricky.png">
                            <img width="250" height="298"
                                 src="../images/tricky.png"
                                 data-lazy-type="image"
                                 data-src="images/tricky.png"
                                 class="alignleft wp-post-image lazy-loaded" alt="opencart-vs-horoshop"
                                 srcset="../images/tricky.png"
                                 data-srcset=""
                                 sizes="(max-width: 213px) 100vw, 213px">
                        </a>
                    </div>
                    <p class="text-article ">
                        Друзья, уверен, вы задавались вопросом, как же справиться с желанием, когда
                        запах тапка хозяина не отличить от запаха лотка. Ведь он так и манит...
                        Скажу вам следующее: "Ссыте в тапок! Да! Хозяйн это одобрит!". Теперь вам нечего бояться.
                        Вот три главных правила : "....
                    </p>
                </div>
            </article>
        </div>
    </div>
    <div id="secondary" class="widget-area" role="complementary">
        <div class="category-wrap">
            <h3>Категории</h3>
            <ul>
                <li><a id="actual_category"  href="peopleCategory.php"><b>Хозяин и я</b></a></li>
                <li><a href="">Лоток</a></li>
                <li><a href="foodCategory.php">Еда</a></li>
                <li><a href="">Мухи</a></li>
            </ul>
        </div>
        <div id="whitespace_in_middle"></div>
        <div class="category-wrap">
            <h3>Новые посты</h3>
            <ul>
                <li><a id="actual_category"  href="peopleCategory.php"><b>Хозяин и я</b></a></li>
                <li><a href="">Лоток</a></li>
                <li><a href="foodCategory.php">Еда</a></li>
                <li><a href="">Мухи</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="footer">

    <img class="img-footer image-second" src="../images/footer.png">

</div>

</body>
</html>
