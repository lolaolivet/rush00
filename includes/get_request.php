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
        echo "coucou";
        print_r($data);
        return($data);
    }
    echo "NUL!";
    mysqli_close($connection);
}

/*
$conn = db_connect();
$stmt = mysqli_stmt_init($conn);
if (!(mysqli_stmt_prepare($stmt, "INSERT INTO cat(name, color, img)
	VALUES (?, ?, ?)")))
    die("Prepare failed: (".$conn->errno.") ".$conn->error);
$null = NULL;
if (!(mysqli_stmt_bind_param($stmt, "sib", $name, $color, $null)))
    die("Binding parameters failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
if (!(mysqli_stmt_send_long_data($stmt, 2, $img)))
    die("Fail sending image: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
if (!(mysqli_stmt_execute($stmt)))
    die("Execute failed: (".mysqli_stmt_errno($stmt).") ".mysqli_stmt_error($stmt));
$id = $conn->insert_id;
mysqli_stmt_close($stmt);
mysqli_close($conn);
return ($id);
*/
?>