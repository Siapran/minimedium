<!doctype html>
<html>
<?php include("./view/head.php"); ?>
<body>
    <?php include("./view/nav.php"); ?>

    <div class="container">
        <h2 class="text-center">Ajout d'un nouvel article</h2>
        <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="add_article.php" method="post">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Titre</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" value="" class="form-control" placeholder="Entrez le titre de l'article" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Contenu</label>
                    <div class="col-sm-6">
                        <textarea name="content" class="form-control" placeholder="Entrez son contenu" rows="6" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include("./view/foot.php"); ?>
</body>
</html>
