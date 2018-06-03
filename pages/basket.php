<?php

include('../includes/get_request.php');
session_start();

if (isset($_GET) && isset($_GET['article']))
{
    foreach ($_SESSION['panier'] as $key => $e)
    {
       // if ($e == $_GET['article'])
        if ($_SESSION['panier'][$key] == $_GET['article'])
        {
            unset($_SESSION['panier'][$key]);
        }
    }
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
                        echo "<li><a href='#' id='".$e['id_category']."'>".$e['name']."</a></li>";
                    }
                    ?>
                </ul>
            </li>
            <li><a href="#">Panier</a></li>
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
    <div class="panier">
        <form method="post" action="validate_basket.php">
        <?php
        $total = 0.0;
        if (isset($_SESSION) && isset($_SESSION['panier']))
            {
                foreach ($_SESSION['panier'] as $e)
                {
                    if (isset($e) && $e != 0){
                        $article = get_one_article($e);
                        $total += $article['price'];
                        echo "<div class='one_pdt'>
                                <p>".$article['name']."<span class='col_right'><a href=?article=".$article['id_product']."> - </a></span></p>
                                </div>";
                    }
                }
                $_SESSION['total'] = $total;
                echo "<p>Total: ".$total."</p>";
            }
            else
                echo "<p>Panier vide.</p>"
        ?>
        <input type="submit" value="Valider">
        </form>
    </div>
</div>
</body>
</html>
