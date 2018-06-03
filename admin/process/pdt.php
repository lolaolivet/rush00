<?php
  include("../../includes/connect_sql.php");
  $sql = db_connect();
  foreach ($_POST as $key => $value) {
      echo "$key: $value\n";
  }
?>
