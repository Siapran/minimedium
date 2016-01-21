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

            <h3>Commentaires</h3>

            <?php
            $list = $dao->readCommentList($article->art_id);
            include("view/comment_list.php"); ?>

            <h3>Ajouter un commentaire</h3>
            <form class="form-horizontal" role="form" action="add_comment.php" method="post">
                <input type="hidden" name="articleId" value="<?php echo $article->art_id ?>">
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="username" class="form-control" placeholder="Entrez votre nom" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <textarea name="content" class="form-control" placeholder="Entrez votre commentaire" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-edit"></span> Publier</button>
                    </div>
                </div>
            </form>

        </div>



    <?php else: ?>
        <div class="container">
            <h1 style="text-align: center;">404</h1>
        </div>
    <?php endif; ?>

    <?php include("./view/foot.php"); ?>
</body>
</html>
