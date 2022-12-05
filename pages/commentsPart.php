<hr class="hr-comments">
<div id="comments" class="comments">
    <div class="comments-title">
        <span>Комментарии <small>(<?php echo getCountComments($id); ?>)</small></span>
    </div>
    <ol class="comments-list">
        <?php
        getCommentsByIdPage($id);
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
                    <input type="hidden" name="page_id" value="<?php echo $id ?>"/>
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