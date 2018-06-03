<?php
include("../includes/connect_sql.php");
foreach ($_POST as $key => $value) {
    echo "$key: $value\n";
}

function get_users()
{
   $users = [];
   $connection = db_connect();
   $res = mysqli_query($connection, 'SELECT * FROM users');
   while ($data = mysqli_fetch_assoc($res))
   {
       $users [] = $data;
   }
   mysqli_free_result($res);
   return ($users);
}

function get_categories()
{
   $categories = [];
   $connection = db_connect();
   $res = mysqli_query($connection, 'SELECT * FROM categories');
   while ($data = mysqli_fetch_assoc($res))
   {
       $categories [] = $data;
   }
   mysqli_free_result($res);
   return ($categories);
}

function get_products()
{
   $pdts= [];
   $connection = db_connect();
   $res = mysqli_query($connection, 'SELECT * FROM products');
   while ($data = mysqli_fetch_assoc($res))
   {
       $pdts [] = $data;
   }
   mysqli_free_result($res);
   return ($pdts);
}
?>
