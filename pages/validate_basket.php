<?php

include('../includes/get_request.php');
session_start();
if (!(isset($_SESSION['loggued_on_user'])))
    header('Location: connection.php');
if (!(isset($_SESSION['panier'])))
    echo "Vide";

create_basket($_SESSION['id_user'], time(), 1, $_SESSION['total'], $_SESSION['panier']);

foreach ($_SESSION['panier'] as $key => $e)
{
    unset($_SESSION['panier'][$key]);
}
header('Location: basket.php')

?>