<?php

include('../includes/get_request.php');
session_start();

if (isset($_POST) && isset($_POST['passwd']) && isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email'])
    && isset($_POST['street']) && isset($_POST['zipcode']) && isset($_POST['city']) && isset($_POST['country']))
{
    $passwd = hash('sha512', $_POST['passwd']);
    create_user($passwd, $_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['street'], $_POST['zipcode'],
        $_POST['city'], $_POST['country']);
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
            <li><a href="basket.php">Panier</a></li>
            <?php
            if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
                echo "<li><a href='logout.php'>Déconnection</a></li>
                        <li><a href='modif_passwd.php'>Modifier mot de passe</a></li>";
            else
            {
                echo "<li><a href='connection.php'>Connexion</a></li>
                          <li><a href='#'>Créer compte</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>
<div class="content">
    <div class="connect">
        <form method="post" action="create.php">
            <div class="row">
                <div class="col_left">
                    <label>Nom: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="name" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Prénom: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="firstname" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Email: </label>
                </div>
                <div class="col_right">
                    <input type="email" name="email" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Rue: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="street" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Code postal: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="zipcode" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Ville: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="city" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Pays: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="country" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Mot de passe: </label>
                </div>
                <div class="col_right">
                    <input type="password" name="passwd" required/>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="S'inscrire"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>
