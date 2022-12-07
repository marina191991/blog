<nav id="site-navigation" class="themonic-nav" role="navigation">
    <div class="menu-container">
        <?php $url = $_SERVER["REQUEST_URI"]; ?>
        <ul class="menu-main">
            <?php if (empty($_SESSION['user_id']) && empty($_SESSION['admin_id']) && empty($_SESSION['moderator_id'])): ?>
                <li><a href="/pages/registration.php"> Войти</a></li>
            <?php endif; ?>
            <li><a href="" <?php if ($url == '/pages/aboutMe.php') echo 'class="current"' ?>>Обо мне</a></li>
            <li><a href="/index.php" <?php if ($url == "/index.php") echo 'class="current"' ?>>Главная</a></li>
            <?php if (!empty($_SESSION['user_id']) || !empty($_SESSION['admin_id']) || !empty($_SESSION['moderator_id'])): ?>
                <li><a href="/functionsApp/logOut.php">Выйти</a></li>
            <?php endif; ?>
        </ul>
        <ul class="menu-main-profile">
            <li style="float: right"><a style="color: #ee631e; padding-bottom: 1px;" <?php
                if (isset($_SESSION['user_name'])) {
                    echo 'href = "#"';
                }
                if (isset($_SESSION['admin_name'])) {
                    echo 'href="/admin/adminIndex.php"';
                }
                if (isset($_SESSION['moderator_name'])) {
                    echo 'href = "#"';
                }

                ?> >
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo $_SESSION['user_name'];

                    }
                    if (isset($_SESSION['admin_name'])) {
                        echo $_SESSION['admin_name'];
                    }
                    if (isset($_SESSION['moderator_name'])) {
                        echo $_SESSION['moderator_name'];
                    }
                    ?>


                </a></li>
        </ul>


    </div>
</nav>
