<!doctype html>
<html>
<?php include("./view/head.php"); ?>
<body>
    <?php include("./view/nav.php"); ?>

    <?php
    include_once("./model/dao.php");
    if (isset($_GET["id"]) && $dao->existsArticle((int) $_GET["id"])):
        $article = $dao->readArticle((int) $_GET["id"]);
        ?>
        <div class="container">


            <div class="col-md-4">
                <h1><a class="articleTitle" href=<?php echo 'article.php?id='.$article->art_id; ?>><?php echo $article->art_title; ?></a></h1>
                <p>
                    <?php echo $article->art_content ?>
                </p>
            </div>

        </div>

    <?php else: ?>
        <div class="container">
            <h1 style="text-align: center;">404</h1>
        </div>
    <?php endif; ?>

    <?php include("./view/foot.php"); ?>
</body>
</html>
