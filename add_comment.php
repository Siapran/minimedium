<!doctype html>
<html>
<?php include("./view/head.php"); ?>
<body>
    <?php include("./view/nav.php"); ?>

    <?php
    require_once("model/dao.php");
    $comment = new Comment();
    $comment->com_content = $_POST['content'];
    $comment->art_id = $_POST['articleId'];
    $comment->username = $_POST['username'];

    $dao->createComment($comment);
    ?>

    <div class="container">

        <div class="alert alert-success">Votre commentaire a bien été ajouté à l'article.</div>

    </div>

    <?php include("./view/foot.php"); ?>
</body>
</html>

<!--
username
articleId
content -->
