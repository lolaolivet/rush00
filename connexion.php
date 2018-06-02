<?php

if ($bdd = mysqli_connect('localhost', 'root', 'rootroot', 'ecommerce'))
{
    echo "Bienvenue";
    $resultat = mysqli_query($bdd, 'SELECT * FROM `products`');
    while ($donnees = mysqli_fetch_assoc($resultat))
    {
        echo "</br>".$donnees['id_product']."</br>".$donnees['name']."</br>";
    }
    mysqli_free_result($resultat);
}
else
    echo "Connexion BDD failed";

?>