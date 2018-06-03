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
            <li><a href="#">Panier</a></li>
            <li><a href="connection.php">Connexion</a></li>
            <li><a href="create.php">Créer compte</a></li>
        </ul>
    </nav>
</div>
<div class="content">
    <div class="panier">
        <h2>PANIER</h2>
    </div>
</div>
</body>
</html>
