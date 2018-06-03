<?php
  include("../../includes/connect_sql.php");
  foreach ($_POST as $key => $value) {
      echo "$key: $value\n";
  }
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['del']) && $_GET['del'] == 1) {
    sql_del_categorie($_GET['id']);
    header("Location: ../cat_list.php");
  }
  if (isset($_POST['name']) && isset($_POST['description'])) {
    sql_add_categorie($_POST['name'], $_POST['description']);
    header("Location: ../cat_list.php");

  }
  function sql_add_categorie($name, $description)
  {
  	$sql = db_connect();
  	$stmt = mysqli_stmt_init($sql);
  	if (!(mysqli_stmt_prepare($stmt, "INSERT INTO categories (name, description)
  	VALUES (?, ?)")))
  		die("Prepare failed");
  	if (!(mysqli_stmt_bind_param($stmt, "ss", $name, $description)))
  	    die("Binding parameters failed");
  	if (!(mysqli_stmt_execute($stmt)))
      	die("Execute failed");
  	mysqli_stmt_close($stmt);
  	mysqli_close($sql);
  	return (true);
  }

  function sql_del_categorie ($todel) {
    $sql = db_connect();
  	$stmt = mysqli_stmt_init($sql);
  	if (!(mysqli_stmt_prepare($stmt, "DELETE FROM categories WHERE id_category = ?")))
  		die("Prepare failed");
  	if (!(mysqli_stmt_bind_param($stmt, "i", $todel)))
  	    die("Binding parameters failed");
  	if (!(mysqli_stmt_execute($stmt)))
      	die("Execute failed");
  	mysqli_stmt_close($stmt);
  	mysqli_close($sql);
  	return (true);
  }

?>
