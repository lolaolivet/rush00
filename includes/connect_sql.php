<?php
 
require_once("./settings.php");

$connection = mysqli_connect($sql_host, $sql_user, $sql_pw, $sql_base);

if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
else {
	printf("Coucou petite base SQL");
}
