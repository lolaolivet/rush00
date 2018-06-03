<?php
include("../includes/connect_sql.php");

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
   $category = [];
   $connection = db_connect();
   $res = mysqli_query($connection, 'SELECT * FROM categories');
   while ($data = mysqli_fetch_assoc($res))
   {
       $users [] = $data;
   }
   mysqli_free_result($res);
   return ($users);
}

function get_products()
{
   $users= [];
   $connection = db_connect();
   $res = mysqli_query($connection, 'SELECT * FROM products');
   while ($data = mysqli_fetch_assoc($res))
   {
       $users [] = $data;
   }
   mysqli_free_result($res);
   return ($users);
}
?>
