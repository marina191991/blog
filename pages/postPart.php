<article id="post-<?php echo $id ?>" class="post-article" style="background-color: #fffbec";>
    <header class="entry header" style="margin: 20px 0 10px;">
        <h2 class="entry-title">
            <a href=""
               title=<?php echo getValueById("posts",$id,2) ?> rel="bookmark">
                <?php echo getValueById("posts",$id,2) ?></a>
        </h2>
        <div class="below-title-meta">
            <div class="adt">Дата публикации: <?php echo getValueById("posts",$id,1) ?></div>
            <div class="adt-comment"><a class="link-comments"
                                        href="/pages/post<?php echo $id ?>.php#comments">
                    <?php echo getCountComments($id);
                    ?> комментариев </a></div>
        </div>
    </header>
    <div class="entry-summary">
        <div class="excerpt-thumb">
            <a href="/images/<?php echo getValueById("posts",$id,3) ?>">
                <img width="250" height="298"
                     src="/images/<?php echo getValueById("posts",$id,3) ?>"
                     data-lazy-type="image"
                     data-src="images/<?php echo getValueById("posts",$id,3) ?>"
                     class="alignleft wp-post-image lazy-loaded" alt="opencart-vs-horoshop"
                     srcset="/images/<?php echo getValueById("posts",$id,3) ?>"
                     data-srcset=""
                     sizes="(max-width: 213px) 100vw, 213px">
            </a>
            <p class="text-article ">
                <?php echo getValueById("posts",$id,4) ?>

            </p>
        </div>

    </div>
</article>