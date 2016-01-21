<?php
foreach ($list as $key => $article) {
    ?>
    <div class="col-md-4">
        <h1><a class="articleTitle" href=<?php echo 'article.php?id='.$article->art_id; ?>><?php echo $article->art_title; ?></a></h1>
        <p>
            <?php echo $article->art_content ?>
        </p>
    </div>
    <?php
}
?>
