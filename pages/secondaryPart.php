<div id="secondary" class="widget-area" role="complementary">
    <div class="category-wrap">
        <h3>Категории</h3>
        <?php $url = $_SERVER["REQUEST_URI"]; ?>
        <ul>
            <li><a href="/pages/categoryPeople.php" <?php if ($url == "/pages/categoryPeople.php") {
                    echo 'id="actual_category"';
                } ?> >Человеки</a></li>
            <li><a href="/pages/categoryTray.php" <?php if ($url == "/pages/categoryTray.php") {
                    echo 'id="actual_category"';
                } ?>>Лоток</a></li>
            <li><a href="/pages/categoryFood.php" <?php if ($url == "/pages/categoryFood.php") {
                    echo 'id="actual_category"';
                } ?>>Еда</a></li>
            <li><a href="/pages/categoryFlies.php" <?php if ($url == "/pages/categoryFlies.php") {
                    echo 'id="actual_category"';
                } ?>>Мухи</a></li>
        </ul>
    </div>
    <div id="whitespace_in_middle"></div>
    <div class="category-wrap">
        <h3>Новые посты</h3>
        <ul>
            <li><a href="categoryPeople.php" <?php if ($url == "categoryPeople.php") {
                    echo 'id="actual_category"';
                } ?> >Человеки</a></li>
            <li><a href="categoryTray.php" <?php if ($url == "categoryTray.php") {
                    echo 'id="actual_category"';
                } ?>>Лоток</a></li>
            <li><a href="categoryFood.php" <?php if ($url == "categoryFood.php") {
                    echo 'id="actual_category"';
                } ?>>Еда</a></li>
            <li><a href="categoryFlies.php" <?php if ($url == "categoryFlies.php") {
                    echo 'id="actual_category"';
                } ?>>Мухи</a></li>
        </ul>
    </div>
</div>
