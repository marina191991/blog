<?php session_start();
include 'functionsApp/authByCookies.php';
include '../functionsApp/commentOut.php';
?>

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
    <!--верхнее меню-->
    <?php include 'topMenu.php' ?>
    <!---->
    <div id="primary" class="site-content" style="padding-top: 50px">
        <div id="content">
            <header class="archive-header">
                <div class="archive-meta">
                    Пушистые и не очень, добро пожаловать в первый кошачий блог! Здесь мы будем делиться опытом,
                    искать решения и многое другое. Рыба сама себя не съест, поэтому доставайте свои когти и
                    бейте по клавишам. Блог ждет своего героя!
                </div>
            </header>
           <!--post1-->
            <?php include 'postShort1.php' ?>
            <article id="post-3300" class="post">
                <header class="entry header" style="margin: 20px 0 10px;">
                    <h2 class="entry-title" style="margin-bottom: 10px;">
                        <a href=""
                           title="Как нассать в тапок и получить курочку на ужин"
                           rel="bookmark">
                            Сосиска на столе. Брать или нет?</a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <div class="excerpt-thumb">
                        <a href="../images/post_3300.png">
                            <img width="250" height="298"
                                 src="../images/post_3300.png"
                                 data-lazy-type="image"
                                 data-src="images/post_3300.png"
                                 class="alignleft wp-post-image lazy-loaded" alt="opencart-vs-horoshop"
                                 srcset="../images/post_3300.png"
                                 data-srcset=""
                                 sizes="(max-width: 213px) 100vw, 213px">
                        </a>
                    </div>
                    <p class="text-article ">
                        Сосиска, сосисулька и как мы только ее не называем. Великое наслаждение и
                        неизбежное наказание. Но! Как сделать так, что бы сосисон был похищен без следа?
                        Моя история покажется вам невероятной, мои дорогие, но все же дело было за поздним ужином
                        хозяина...
                    </p>
                </div>
            </article>

        </div>
    </div>
    <div id="secondary" class="widget-area" role="complementary"
         style="height: auto !important;">
        <div class="category-wrap">
            <h3>Категории</h3>
            <ul>
                <li><a href="peopleCategory.php">Хозяин и я</a></li>
                <li><a href="">Лоток</a></li>
                <li><a href="foodCategory.php">Еда</a></li>
                <li><a href="">Мухи</a></li>
            </ul>
        </div>
    </div>
</div>
<!--footer-->
<?php include 'footer.php' ?>

</body>
</html>