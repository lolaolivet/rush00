<?php

include('../includes/get_request.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div class="header">
    <h1>E-commerce</h1>
</div>
<div>
    <nav>
        <ul class="menu">
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="#" id="articles">Articles</a></li>
            <li><a href="#">Catégories</a>
                <ul>
                    <?php
                    $cat = get_categories();
                    foreach ($cat as $e)
                    {
                        echo "<li><a href=?category=".$e['id_category'].">".$e['name']."</a></li>";
                    }
                    ?>
                </ul>
            </li>
            <li><a href="basket.php">Panier</a></li>
            <li><a href="connection.php">Connexion</a></li>
            <li><a href="create.php">Créer compte</a></li>
        </ul>
    </nav>
</div>
<div class="content">
    <?php if (!(isset($_GET['id']) && $_GET['id'] > 0)) {

        ?>
    <div class="articles">
        <?php
            $articles = [];
            if (!(isset($_GET['category']) && $_GET['category'] > 0)) {
                echo "Pas de category";
                $articles = get_articles();
            }
            else {
                echo "Owi des categories !";
                $articles = get_articles_category($_GET['category']);
                echo "Et la ?";
            }

            foreach ($articles as $e)
            {
                print_r($e);
                echo "<a href=?id=".$e['id_product']."><h2>".$e['name']."</h2></a>";
            }
        ?>
    </div>
    <?php }
        else { ?>
            <div class="one_article"><?php
                    $art = get_one_article($_GET['id']);
                    echo "<h2>".$art['name']."</h2><br/><p>".$art['description']."</p>";
                ?></div>

      <?php  }?>
</div>
</body>
</html>
