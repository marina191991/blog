 <?php session_start();
include_once '../functionsDB/dbFunctions.php';
include_once '../functionsApp/commentOut.php';
 $id=3;
?>
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
            <!--header-->
            <?php include 'primaryHeaderPart.php' ?>
            <!--пост-->
            <?php include_once 'postPart.php'; ?>
        </div>
        <!--комментарии-->
        <?php include_once 'commentsPart.php'?>
    </div>

    <?php include_once 'secondaryPart.php' ?>
</div>
<!--footer-->
<?php include_once 'footer.php' ?>
</body>
</html>