<?php
session_start();
include_once 'functionsApp/authByCookies.php';
include_once 'functionsApp/commentOut.php';
include_once 'functionsApp/postFunctions.php';
include_once 'functionsDB/dbFunctions.php';
?>

<?php include_once 'pages/docTypeHTML.php'?>
<head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">

    <title>Main</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
</head>
<body class="body">
<div id="masthead" class="site-header" role="banner" style="margin-bottom: 0;">

    <img alt="Cat's blogggg....." src="images/header.jpg" class="responsive">

</div>
<div class="main" id='main'>
    <!--верхнее меню-->
    <?php include 'pages/topMenu.php' ?>

    <div id="primary" class="site-content" style="padding-top: 50px">
        <div id="content">
            <!--header-->
            <?php include_once 'pages/primaryHeaderPart.php' ?>
            <!--posts-->
            <!--Здесь выводятся посты по фильтру поздних дат. То есть последние три созданных поста.-->
            <?php
            $text=file_get_contents('pages/postPartForGetShortPost.php');
            getNewPostsFromAllCategories("posts", 3,$text);
            ?>
        </div>
    </div>
    <?php include_once 'pages/secondaryPart.php' ?>
</div>
<!--footer-->
<?php include 'pages/footer.php' ?>
</body>
</html>