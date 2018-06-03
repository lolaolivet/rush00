<?php
  include("../../includes/connect_sql.php");
  foreach ($_POST as $key => $value) {
      echo "$key: $value\n";
  }
  if (isset($_POST['name']) && isset($_POST['description'])) {
    sql_add_categorie($_POST['name'], $_POST['description']);
  }
  function sql_add_categorie($name, $description)
  {
  	$sql = db_connect();
  	$stmt = mysqli_stmt_init($sql);
  	if (!(mysqli_stmt_prepare($stmt, "INSERT INTO categories(name, description)
  	VALUES (?, ?)")))
  		die("Prepare failed: (".$conn->errno.") ".$conn->error);
  	$null = NULL;
  	if (!(mysqli_stmt_bind_param($stmt, "s", $name, $color, $null)))
  	    die("Binding parameters failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
  	if (!(mysqli_stmt_execute($stmt)))
      	die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
  	mysqli_stmt_close($stmt);
  	mysqli_close($conn);
  	return (true);
  }
?>
