<?php

include('../includes/get_request.php');
session_start();

if (isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['submit']))
{
    $newpw = hash('sha512', $_POST['passwd']);
    $login = $_SESSION['id_user'];
    update_passwd($login, $newpw);
    header('Location: basket.php');
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
    <h1>E-commerce</h1>
</div>
<div>
    <nav>
        <ul class="menu">
            <li><a href="#">Accueil</a></li>
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
                echo "<li><a href='logout.php'>Déconnexion</a></li>";
            else
            {
                echo "<li><a href='connection.php'>Connexion</a></li>
                          <li><a href='create.php'>Créer compte</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>
<div id="content">
    <div class="connect">
        <form method="post" action="modif_passwd.php">
            <div class="row">
                <div class="col_left">
                    <label>Email: </label>
                </div>
                <div class="col_right">
                    <input type="text" name="login" required/>
                </div>
            </div>
            <div class="row">
                <div class="col_left">
                    <label>Nouveau mot de passe: </label>
                </div>
                <div class="col_right">
                    <input type="password" name="passwd" required/>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Modifier"/>
            </div>
        </form>
    </div>
</div>
</body>
</html>