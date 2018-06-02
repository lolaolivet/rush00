<?php

require_once("./settings.php");

function db_connect() {
  $connection = mysqli_connect($sql_host, $sql_user, $sql_pw, $sql_base);

  if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
		    exit();
      }
      return $connection;
}
