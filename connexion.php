<?php

if ($bdd = mysqli_connect('localhost', 'root', 'rootroot', 'ecommerce'))
{
    echo "Bienvenue";
    $resultat = mysqli_query($bdd, 'SELECT * FROM `products`');
    while ($donnees = mysqli_fetch_assioc($resultat))
    {
        echo $donnees['id_product']."\n".$donnees['name'];
    }
    mysqli_free_result($resultat);
}
else
    echo "Connexion BDD failed";

?>