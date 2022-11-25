 <nav id="site-navigation" class="themonic-nav" role="navigation">
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
                <ul class="menu-main-profile" >
                    <li style="float: right"> <a style="color: #ee631e; padding-bottom: 1px;" href="" >
                            <?php
                            if (!empty($_SESSION['user_name'])) {
                                echo $_SESSION['user_name'];
                            }
                            ?></a> </li> </ul>


        </div>
    </nav>
