<?php

include('connect_sql.php');

function get_articles()
{
    $data = [];
    $connection = db_connect();
    $res = mysqli_query($connection, 'SELECT * FROM products');
    while ($ret = mysqli_fetch_assoc($res))
    {
        $data [] = $ret;
    }
    mysqli_free_result($res);
    return ($data);
}

function get_categories()
{
    $data = [];
    $connection = db_connect();
    $res = mysqli_query($connection, 'SELECT * FROM categories');
    while ($ret = mysqli_fetch_assoc($res))
    {
        $data [] = $ret;
    }
    mysqli_free_result($res);
    return ($data);
}

function get_users()
{
    $data = [];
    $connection = db_connect();
    $res = mysqli_query($connection, 'SELECT * FROM users');
    while ($ret = mysqli_fetch_assoc($res))
    {
        $data [] = $ret;
    }
    mysqli_free_result($res);
    return ($data);
}

function get_one_article ($id)
{

    $connection = db_connect();
    $id = mysqli_real_escape_string($connection, $id);
    if ($res = mysqli_query($connection, "SELECT * FROM products WHERE id_product = ('$id')"))
    {
        $data = mysqli_fetch_assoc($res);
        return($data);
    }
    mysqli_close($connection);
}

function get_articles_category ($id)
{

    $connection = db_connect();
    $data = [];
    $id = mysqli_real_escape_string($connection, $id);
    if ($res = mysqli_query($connection, "SELECT * FROM products INNER JOIN product_has_categories
        ON products.id_product = product_has_categories.id_product WHERE product_has_categories.id_category = ('$id')"))
    {
        while ($ret = mysqli_fetch_assoc($res)) {
            $data [] = $ret;
        }
        return($data);
    }
    mysqli_close($connection);
}

function get_login ($login, $passwd)
{

    $connection = db_connect();
    $data = [];
    $login = mysqli_real_escape_string($connection, $login);
    $passwd = mysqli_real_escape_string($connection, $passwd);
    if ($res = mysqli_query($connection, "SELECT email, passwd, is_user, id_user FROM users WHERE email = ('$login') AND passwd = ('$passwd')"))
    {
        $data = mysqli_fetch_assoc($res);
        return($data);
    }
    mysqli_close($connection);
}

function get_comments_article ($id)
{

    $connection = db_connect();
    $data = [];
    $id = mysqli_real_escape_string($connection, $id);
    if ($res = mysqli_query($connection, "SELECT str, email FROM comments INNER JOIN users 
        ON comments.id_user = users.id_user WHERE comments.id_product = ('$id')"))
    {
        while ($ret = mysqli_fetch_assoc($res)) {
            $data [] = $ret;
        }
        return($data);
    }
    mysqli_close($connection);
}

function create_basket($id, $date_create, $is_bought, $total, $pdts)
{
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    $id = mysqli_real_escape_string($sql, $id);
    $date_create = mysqli_real_escape_string($sql, $date_create);
    $is_bought = mysqli_real_escape_string($sql, $is_bought);
    $total = mysqli_real_escape_string($sql, $total);
    if (!(mysqli_stmt_prepare($stmt, "INSERT INTO baskets (id_user, date_create, is_bought, total)
  	VALUES (?, ?, ?, ?)")))
        die("Prepare failed");
    if (!(mysqli_stmt_bind_param($stmt, "iiid", $id, $date_create, $is_bought, $total)))
        die("Binding parameters failed");
    if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
    $last_id = mysqli_insert_id($sql);
    link_basket_pdts($last_id, $pdts);
    mysqli_stmt_close($stmt);
    mysqli_close($sql);
    return (true);
}

function link_basket_pdts($id_basket, $pdts)
{
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    foreach ($pdts as $id_pdt) {
        if (!(mysqli_stmt_prepare($stmt, "INSERT INTO basket_has_products (id_basket, id_product)
      VALUES (?, ?)")))
            die("Prepare failed");
        if (!(mysqli_stmt_bind_param($stmt, "ii", $id_basket, $id_pdt)))
            die("Binding parameters failed");
        if (!(mysqli_stmt_execute($stmt)))
            die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
    mysqli_close($sql);
    return (true);
}

function update_passwd($id, $passwd)
{
    $sql = db_connect();
    print($id);
    print("<br/>");
    print($passwd);
    $stmt = mysqli_stmt_init($sql);
    $id = mysqli_real_escape_string($sql, $id);
    $passwd = mysqli_real_escape_string($sql, $passwd);
    if (!(mysqli_stmt_prepare($stmt, "UPDATE users SET passwd = ('$passwd') WHERE id_user = ('$id')")))
        die("Prepare failed");
    if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
    mysqli_stmt_close($stmt);
    mysqli_close($sql);
    return (true);
}

function create_user($passwd, $name, $firstname, $email, $street, $zipcode, $city, $country)
{
    $sql = db_connect();
    $stmt = mysqli_stmt_init($sql);
    $passwd = mysqli_real_escape_string($sql, $passwd);
    $name = mysqli_real_escape_string($sql, $name);
    $firstname = mysqli_real_escape_string($sql, $firstname);
    $email = mysqli_real_escape_string($sql, $email);
    $street = mysqli_real_escape_string($sql, $street);
    $zipcode = mysqli_real_escape_string($sql, $zipcode);
    $city = mysqli_real_escape_string($sql, $city);
    $country = mysqli_real_escape_string($sql, $country);
    $is_user = 1;
    if (!(mysqli_stmt_prepare($stmt, "INSERT INTO users (passwd, name, first_name, email, is_user, street, zipcode, city, country)
  	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)")))
        die("Prepare failed");
    if (!(mysqli_stmt_bind_param($stmt, "ssssissss", $passwd, $name, $firstname, $email, $is_user, $street, $zipcode, $city, $country)))
        die("Binding parameters failed");
    if (!(mysqli_stmt_execute($stmt)))
        die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
    mysqli_stmt_close($stmt);
    mysqli_close($sql);
    return (true);
}

?>