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
            <li><a href="basket.php">Panier</a></li>
            <li><a href="#">Connexion</a></li>
            <li><a href="create.php">Créer compte</a></li>
        </ul>
    </nav>
</div>
<div class="content">
    <div class="connect">
        <form method="post">
            <div class="row">
                <div class="col_left">
                    <label>Email: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="login"/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Mot de passe: </label>
                </div>
                <div class="col_right">
                    <input type="password" name="passwd"/>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Connection"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>
