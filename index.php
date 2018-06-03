<?php

include('includes/get_request.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<div class="header">

</div>
<div>
    <nav>
        <ul class="menu">
            <li><a href="#">Accueil</a></li>
            <li><a href="pages/articles.php" id="articles">Articles</a></li>
            <li><a href="#">Catégories</a>
                <ul>
                    <?php
                    $cat = get_categories();
                    foreach ($cat as $e)
                    {
                        echo "<li><a href='#' id='".$e['id_category']."'>".$e['name']."</a></li>";
                    }
                    ?>
                </ul>
            </li>
            <li><a href="pages/basket.php">Panier</a></li>
            <?php
            if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
                    echo "<li><a href='pages/logout.php'>Déconnexion</a></li>
                            <li><a href='pages/modif_passwd.php'>Modifier mot de passe</a></li>";
                else
                {
                    echo "<li><a href='pages/connection.php'>Connexion</a></li>
                          <li><a href='pages/create.php'>Créer compte</a></li>";
                }
            ?>
        </ul>
    </nav>
</div>
<div id="content">
    <div class="new_products">
        <?php
        $articles = get_articles();
        foreach ($articles as $e)
        {
            if ($e['stock'] != 0) {
                echo "<div class='one'>
                        <a href=?id=" . $e['id_product'] . ">
                        <h2>" . $e['name'] . "</h2>
                        <img src='../img/" . $e['image'] . "'/></a>
                        <a href=?article=".$e['id_product']." class='indabasket'><img class='buy' src='img/basket.png'></a>
                    </div>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
