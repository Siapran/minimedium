<!doctype html>
<html>
<?php include("./view/head.php"); ?>
<body>
    <?php include("./view/nav.php"); ?>

    <div class="container">
        <div class="row">

            <?php
            include_once("./model/dao.php");
            $list = $dao->readArticleList();
            include("./view/article_list.php");
            ?>

        </div>
    </div>

    <?php include("./view/foot.php"); ?>
</body>
</html>
