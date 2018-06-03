<?php
include("get_request.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Admin Panel </title>
    </head>
    <body>
      <div class="square-div">
        <div class="title-admin">Admin Panel</div>
        <div class="square-admin">
          <h2>Categories</h2>
          <ul class="list">
            <li><a id="list-cat" href="cat_list.php">List categories</a></li>
            <li><a id="add-cat" href="cat_add.php">Add category</a></li>
          </ul>
        </div>
        <div class="square-admin">
          <h2>Products</h2>
          <ul class="list">
            <li><a id="list-pdt"href="pdt_list.php">List products</a></li>
            <li><a id="add-pdt" href="pdt_add.php">Add product</a></li>
          </ul>
        </div>
        <div class="square-admin">
          <h2>Users</h2>
          <ul class="list">
            <li><a id="list-usr" href="usr_list.php">List users</a></li>
            <li><a id="add-usr" href="usr_add.php">Add user</a></li>
          </ul>
        </div>
      </div>
    </div>
