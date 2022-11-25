<?php
session_start();
include 'functionsApp/authByCookies.php';
include 'functionsApp/addComment.php';
include '../functionsApp/commentOut.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/post.css" rel="stylesheet">


    <title>Post</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body class="body">
<div id="masthead" class="site-header" role="banner" style="margin-bottom: 0;">

    <img alt="Cat's blogggg....." src="../images/header.jpg" class="responsive">

</div>
<div class="main" id="main">
    <!--верхнее меню-->
<?php include 'topMenu.php' ?>

    <div id="primary" class="site-content" style="padding-top: 50px">
        <div id="content">
            <header class="archive-header">
                <div class="archive-meta">
                    Пушистые и не очень, добро пожаловать в первый кошачий блог! Здесь мы будем делиться опытом,
                    искать решения и многое другое. Рыба сама себя не съест, поэтому доставайте свои когти и
                    бейте по клавишам. Блог ждет своего героя!
                </div>
            </header>
            <article id="post-1" class="post-1">
                <header class="entry header" style="margin: 20px 0 10px;">
                    <h2 class="entry-title">
                        <a href=""
                           title="Как нассать в тапок и получить курочку на ужин"
                           rel="bookmark">
                            Как нассать в тапок и получить курочку на ужин?</a>
                    </h2>
                    <div class="below-title-meta">
                        <div class="adt">Date: <?= date("d F Y") ?></div>
                        <div class="adt-comment"><a class="link-comments"
                                                    href="http://0.0.0.0:8000/html/post1.php#comments">
                                <?php echo getCountComments(1);
                                ?> комментариев </a></div>
                    </div>
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
                        <p class="text-article ">
                            Друзья, уверен, вы задавались вопросом, как же справиться с желанием, когда
                            запах тапка хозяина не отличить от запаха лотка. Ведь он так и манит...
                            Скажу вам следующее: "Ссыте в тапок! Да! Хозяйн это одобрит!". Теперь вам нечего бояться.
                            Вот три главных правила :
                            Друзья, уверен, вы задавались вопросом, как же справиться с желанием, когда
                            запах тапка хозяина не отличить от запаха лотка. Ведь он так и манит...
                            Скажу вам следующее: "Ссыте в тапок! Да! Хозяйн это одобрит!". Теперь вам нечего бояться.
                            Вот три главных правила :
                            Друзья, уверен, вы задавались вопросом, как же справиться с желанием, когда
                            запах тапка хозяина не отличить от запаха лотка. Ведь он так и манит...
                            Скажу вам следующее: "Ссыте в тапок! Да! Хозяйн это одобрит!". Теперь вам нечего бояться.
                            Вот три главных правила :

                        </p>
                    </div>

                </div>
            </article>
        </div>
        <hr class="hr-comments">
        <div id="comments" class="comments">
            <div class="comments-title">
                <span>Комментарии <small>(<?= getCountComments(1); ?>)</small></span>
            </div>
            <ol class="comments-list">
                <?php

                getCommentsByIdPage(1);
                ?>
            </ol>
            <?php if (!empty($_SESSION['user_id'])): ?>
                <!--форма для создания комментария-->
                <div class="create-comment">
                    <form name="create_comment" action="../functionsApp/addComment.php" method="post">
                        <p style="margin-bottom: 0">
                            <label>Имя:</label>

                            <input type="text" name="name" value="<?php echo $_SESSION['user_name']; ?>" readonly/>
                        </p>
                        <p style="margin-top: 10px;">
                            <label style="line-height: 2;">Комментарий:</label>
                            <br/>
                            <textarea name="text_comment" placeholder="Remember, be nice!"
                                      rows="30" cols="30"
                                      style="width: 600px; height: 108px;"></textarea>
                        </p>
                        <p>
                            <?php if ($_SESSION['message']) {
                                {
                                    echo '<p class="errorInfo">' . $_SESSION['message'] . '</p>';
                                }
                            }
                            unset($_SESSION['message']); ?>
                            <input type="hidden" name="page_id" value="1"/>
                            <input type="submit" class="submit" value="Отправить"/>

                        </p>
                    </form>
                </div>
            <?php endif; ?>
            <?php if (empty($_SESSION['user_id'])): ?>
                <div class="info-for-unauthorized">
                    <p>Для создания комментария необходимо авторизоваться</p>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div id="secondary" class="widget-area" role="complementary"
         style="height: auto !important;">
        <div class="category-wrap">
            <h3>Категории</h3>
            <ul>
                <li id="actual_category"><a  href="">Хозяин и я</a></li>
                <li><a href="">Лоток</a></li>
                <li><a href="">Еда</a></li>
                <li><a href="">Мухи</a></li>

            </ul>
        </div>
    </div>
</div>

<!--footer-->
<?php include 'footer.php' ?>

</body>
</html>
