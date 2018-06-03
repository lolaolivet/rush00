<?php
  include("../../includes/connect_sql.php");
  $sql = db_connect();
   foreach ($_POST as $key => $miaou) {
    echo ("$key :");
     print_r ($miaou);
   }

  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['del']) && $_GET['del'] == 1) {
    sql_del_pdt($_GET['id']);
    header("Location: ../pdt_list.php");
    exit;
  }
  if (isset($_POST['name']) && isset($_POST['description'])
    && isset($_POST['price'])  && isset($_POST['stock'])
    && isset($_FILES['image'])) {
    if (strlen($_POST['name']) > 0) {
      if (isset($_POST['add'])) {
          $image = files_to_base64($_FILES['image']['tmp_name']);
          sql_add_pdt($_POST, $image);
          header("Location: ../pdt_list.php");
          exit ;
        }
        elseif (isset($_POST['modif']))
        {
          sql_update_pdt($_POST, files_to_base64($_FILES['image']['tmp_name']), $_POST['modif']);
          header("Location: ../pdt_list.php");
          exit ;
        }
      }
      else {
        if (isset($_POST['modif']))
          header("Location: ../pdt_modif.php?id=".$_POST['modif']."&error=1");
        else
          header("Location: ../pdt_add.php?error=1");
        exit;
      }
    }
    else {
      if (isset($_POST['modif']))
        header("Location: ../pdt_modif.php?id=".$_POST['modif']."&error=2");
      else
        header("Location: ../pdt_add.php?error=2");
      exit;
    }

    function files_to_base64($path) {
      $img = file_get_contents($path);
      $img64 =  base64_encode($img);
      return "data:image/png;base64,".$img64;
    }

    function sql_add_pdt($v, $image)
    {
      $sql = db_connect();
      $stmt = mysqli_stmt_init($sql);
      $name = mysqli_real_escape_string($sql, $v['name']);
      $description = mysqli_real_escape_string($sql, $v['description']);
      if (!(mysqli_stmt_prepare($stmt, "INSERT INTO products (name, description, price, stock, image)
      VALUES (?, ?, ?, ?, ?)")))
        die("Prepare failed");
      if (!(mysqli_stmt_bind_param($stmt, "ssdis", $name, $description, $v['price'], $v['stock'], $image)))
          die("Binding parameters failed");
      if (!(mysqli_stmt_execute($stmt)))
          die("Execute failed");
      $last_id = mysqli_insert_id($sql);
      link_cat_pdt($last_id, $v['cat']);
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

    function relink_cat_pdt($id_pdt, $cat){
      $sql = db_connect();
      $stmt = mysqli_stmt_init($sql);
      if (!(mysqli_stmt_prepare($stmt, "DELETE FROM product_has_categories WHERE id_product = '$id_pdt'")))
        die("Prepare failed");
      if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed");
      foreach ($cat as $id_cat) {
        if (!(mysqli_stmt_prepare($stmt, "INSERT INTO product_has_categories (id_product, id_category)
          VALUES (?, ?)")))
            die("Prepare failed");
          if (!(mysqli_stmt_bind_param($stmt, "ii", $id_pdt, $id_cat)))
              die("Binding parameters failed");
          if (!(mysqli_stmt_execute($stmt)))
              die("Execute failed");
          }
      mysqli_stmt_close($stmt);
      mysqli_close($sql);
      return (true);
    }


    function link_cat_pdt($id_pdt, $cat){
      $sql = db_connect();
      $stmt = mysqli_stmt_init($sql);
      foreach ($cat as $id_cat) {
      if (!(mysqli_stmt_prepare($stmt, "INSERT INTO product_has_categories (id_product, id_category)
      VALUES (?, ?)")))
        die("Prepare failed");
      if (!(mysqli_stmt_bind_param($stmt, "ii", $id_pdt, $id_cat)))
          die("Binding parameters failed");
      if (!(mysqli_stmt_execute($stmt)))
          die("Execute failed");
      }
      mysqli_stmt_close($stmt);
      mysqli_close($sql);
      return (true);
    }


    function sql_del_pdt($todel) {
      echo "$todel";
      $sql = db_connect();
      $stmt = mysqli_stmt_init($sql);
      $id = mysqli_real_escape_string($sql, $todel);
      if (!(mysqli_stmt_prepare($stmt, "DELETE FROM `products` WHERE id_product = '$id'")))
        die("Prepare failed");
      if (!(mysqli_stmt_execute($stmt)))
          die("Execute failed");
      if (!(mysqli_stmt_prepare($stmt, "DELETE FROM product_has_categories WHERE id_product = '$id'")))
          die("Prepare failed");
      if (!(mysqli_stmt_execute($stmt)))
          die("Execute failed");
      mysqli_stmt_close($stmt);
      mysqli_close($sql);
      return (true);
    }
?>
