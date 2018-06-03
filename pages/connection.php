<?php

include('../includes/get_request.php');

session_start();

function auth($login, $passwd)
{
    $passwd_hash = hash('sha512', $passwd);
    $data = get_login($login, $passwd_hash);
    if ($data['email'] === $login && $data['passwd'] === $passwd_hash) {
        return ($data);
    }
    else
    {
        header('Location: connection.php');
        return (NULL);
    }
}

if (isset($_POST['submit']))
{
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];
    if (!(isset($login)) || !(isset($passwd)))
    {
        $_SESSION['loggued_on_user'] = "";
        return (1);
    }
    else
    {
        if ($data = auth($login, $passwd)) {
            $_SESSION['loggued_on_user'] = $login;
            $_SESSION['id_user'] = $data['id_user'];
            if ($data['is_user'] == 0)
                header('Location: ../admin/index.php');
            else
                header('Location: ../index.php');
            return (1);
        }
        else {
            echo "ERROR - 2\n";
            return (1);
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
            <li><a href="basket.php">Panier</a></li>
            <?php
            if (isset($_SESSION) && isset($_SESSION['loggued_on_user']))
                echo "<li><a href='logout.php'>Déconnection</a></li>
                    <li><a href='modif_passwd.php'>Modifier mot de passe</a></li>";
            else
            {
                echo "<li><a href='#'>Connexion</a></li>
                          <li><a href='create.php'>Créer compte</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>
<div class="content">
    <div class="connect">
        <form method="post" action="connection.php">
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
                    <label>Mot de passe: </label>
                </div>
                <div class="col_right">
                    <input type="password" name="passwd" required/>
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
