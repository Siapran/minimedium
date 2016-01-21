<!doctype html>
<html>
<?php include("./view/head.php"); ?>
<body>
    <?php include("./view/nav.php"); ?>

    <?php
    require_once("model/dao.php");
    $article = new Article();
    $article->art_title = $_POST['title'];
    $article->art_content = $_POST['content'];

    $dao->createArticle($article);
    ?>

    <div class="container">

        <div class="alert alert-success">L'article '<?php echo $article->art_title ?>' a bien été ajouté.</div>

    </div>

    <?php include("./view/foot.php"); ?>
</body>
</html>
