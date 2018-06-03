<?php
  include("../../includes/connect_sql.php");
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && isset($_GET['del']) && $_GET['del'] == 1) {
    sql_del_user($_GET['id']);
    header("Location: ../usr_list.php");
    exit;
  }
  if (isset($_POST['first_name']) && isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['street'])  && isset($_POST['zipcode'])  && isset($_POST['city'])
    && isset($_POST['country'])  && isset($_POST['password']) && isset($_POST['add'])) {
    if (strlen($_POST['email']) > 0 && strlen($_POST['password'])) {
      if (sql_check_email_exist($_POST['email']) == NULL) {
        sql_add_users($_POST);
        header("Location: ../usr_list.php");
        exit;
      }
      else {
        header("Location: ../usr_add.php?error=2");
        exit;
      }
    }
    else {
      header("Location: ../usr_add.php?error=1");
      exit;
    }
  }

  function sql_add_users($v)
  {
  	$sql = db_connect();
  	$stmt = mysqli_stmt_init($sql);
    $first_name = mysqli_real_escape_string($sql, $_POST['first_name']);
    $name = mysqli_real_escape_string($sql, $_POST['name']);
    $email = mysqli_real_escape_string($sql, $_POST['email']);
    $street = mysqli_real_escape_string($sql, $_POST['street']);
    $zipcode = mysqli_real_escape_string($sql, $_POST['zipcode']);
    $city = mysqli_real_escape_string($sql, $_POST['city']);
    $country = mysqli_real_escape_string($sql, $_POST['country']);
    $passwd_nosecure = mysqli_real_escape_string($sql, $_POST['password']);
    $passwd = hash('sha512', $passwd_nosecure);
    if ($_POST['is_root']) { $is_user = 0; } else { $is_user = 1; }
  	if (!(mysqli_stmt_prepare($stmt, "INSERT INTO users (first_name, name, email, street, zipcode, city, country, passwd, is_user)
  	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")))
  		die("Prepare failed");
  	if (!(mysqli_stmt_bind_param($stmt, "ssssssssi", $first_name, $name, $email, $street, $zipcode, $city, $country, $passwd, $is_user)))
  	    die("Binding parameters failed");
  	if (!(mysqli_stmt_execute($stmt)))
      	die("Execute failed");
  	mysqli_stmt_close($stmt);
  	mysqli_close($sql);
  	return (true);
  }

  function sql_check_email_exist($email)
  {

    $sql = db_connect();
    $email = mysqli_real_escape_string($sql, $email);
    if ($res = mysqli_query($sql, "SELECT * FROM users WHERE email = ('$email')"))
    {
        $data = mysqli_fetch_assoc($res);
        return($data);
    }
    mysqli_close($connection);
    return NULL;
  }

  function sql_del_user($todel) {
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    if (!(mysqli_stmt_prepare($stmt, "DELETE FROM users WHERE id_user = ?")))
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
