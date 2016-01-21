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

            <div class="row">
                <?php include("view/article.php") ?>
            </div>
            
            <h3>Commentaires:</h3>

            <?php
            $list = $dao->readCommentList($article->art_id);
            include("view/comment_list.php"); ?>
        </div>

    <?php else: ?>
        <div class="container">
            <h1 style="text-align: center;">404</h1>
        </div>
    <?php endif; ?>

    <?php include("./view/foot.php"); ?>
</body>
</html>
