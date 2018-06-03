<?php
  include("../../includes/connect_sql.php");
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['del']) && $_GET['del'] == 1) {
    sql_del_categorie($_GET['id']);
    header("Location: ../cat_list.php");
    exit ;
  }
  if (isset($_POST['name']) && strlen($_POST['name']) > 0 && isset($_POST['description'])) {
    if (isset($_POST['add']) && $_POST['add'] == 1)
      sql_add_categorie($_POST['name'], $_POST['description']);
    if (isset($_POST['modif']))
        sql_update_categorie($_POST['name'], $_POST['description'], $_POST['modif']);
    header("Location: ../cat_list.php");
    exit ;
  }
  else
  {
    header("Location: ../cat_add.php?error=1");
    exit;
  }

  function sql_add_categorie($name, $description)
  {
  	$sql = db_connect();
  	$stmt = mysqli_stmt_init($sql);
    $name = mysqli_real_escape_string($sql, $name);
    $description = mysqli_real_escape_string($sql, $description);
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

  function sql_update_categorie($name, $description, $id)
  {
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    $name = mysqli_real_escape_string($sql, $name);
    $description = mysqli_real_escape_string($sql, $description);
    if (!(mysqli_stmt_prepare($stmt, "UPDATE categories SET name = '$name', description = '$description' WHERE id_category = '$id'")))
      die("Prepare failed");
    if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed");
    mysqli_stmt_close($stmt);
    mysqli_close($sql);
    return (true);
  }


  function sql_update_pdt($v, $image, $id)
  {
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    $name = mysqli_real_escape_string($sql, $v['name']);
    $description = mysqli_real_escape_string($sql, $v['description']);
    $price = mysqli_real_escape_string($sql, $v['price']);
    $stock= mysqli_real_escape_string($sql, $v['stock']);
    $id = mysqli_real_escape_string($sql, $id);
    if (!(mysqli_stmt_prepare($stmt, "UPDATE products SET name = '$name', description = '$description', price = '$price', stock = '$stock' WHERE id_product =".$id)))
      die("Prepare failed");
    if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed");
    relink_cat_pdt($id, $v['cat']);
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
