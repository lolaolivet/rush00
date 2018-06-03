<?php

include('../includes/get_request.php');
session_start();
if (!isset($_SESSION['panier']) || !isset($_GET['article'])) {
    $_SESSION['panier'] = array();
}
else
{
    $_SESSION['panier'][] = $_GET['article'];
}
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
</div>
<div>
    <nav>
        <ul class="menu">
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="articles.php" id="articles">Articles</a></li>
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
            <?php
            if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
                echo "<li><a href='logout.php'>Déconnection</a></li>
                        <li><a href='modif_passwd.php'>Modifier mot de passe</a></li>";
            else
            {
                echo "<li><a href='connection.php'>Connexion</a></li>
                          <li><a href='create.php'>Créer compte</a></li>";
            }
            ?>
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
                $articles = get_articles();
            }
            else {
                $articles = get_articles_category($_GET['category']);
            }

            foreach ($articles as $e)
            {
                if ($e['stock'] != 0) {
                    echo "<div class='one'>
                        <a href=?id=" . $e['id_product'] . ">
                        <h2>" . $e['name'] . "</h2>
                        <img src='../img/" . $e['image'] . "'/></a>
                        <a href=?article=".$e['id_product']." class='indabasket'><img class='buy' src='../img/basket.png'></a>
                    </div>";
                }
            }
        ?>
    </div>
    <?php }
        else { ?>
            <div class="one_article"><?php
                    $comment = get_comments_article($_GET['id']);
                    $art = get_one_article($_GET['id']);
                    echo "<h2>".$art['name']."</h2>
                            <p>".$art['description']."</p>
                            <a href=?article=".$art['id_product']." class='indabasket'><img class='buy' src='../img/basket.png'></a>
                            <div class='comments'>";
                    foreach ($comment as $e)
                    {
                        echo "<div class='one_comment'>
                                <p>".$e['str']."</p>
                                <span><i>".$e['email']."</i></span>
                                </div>";
                    }
                    echo"</div>";
                ?></div>

      <?php  }?>
</div>
</body>
</html>
