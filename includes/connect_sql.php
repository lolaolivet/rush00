<?php
include('settings.php');

function db_connect() {
    $sql = getInfoSql();
    $connection = mysqli_connect($sql['host'], $sql['user'], $sql['pw'], $sql['base']);

    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
            exit();
     }
    return $connection;
}
