
<?php

//Check si l'user est bien un admin avant de lui laisser l'acces au panel.
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Admin Panel </title>
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                document.getElementById('list-cat').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="cat_list.php" ></object>';
                }, false);

                document.getElementById('add-cat').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="cat_add.php" ></object>';
                }, false);

                document.getElementById('list-pdt').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="pdt_list.php" ></object>';
                }, false);

                document.getElementById('add-pdt').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="pdt_add.php" ></object>';
                }, false);

                document.getElementById('list-usr').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="usr_list.php" ></object>';
                }, false);

                document.getElementById('add-usr').addEventListener('click', function (e){
                    e.preventDefault();
                    document.getElementById('gen-listing').innerHTML ='<object type="text/html" data="pages/usr_add.php" ></object>';
                }, false);

            }, false);
        </script>
    </head>
    <body>
      <div class="title-admin">Admin Panel</div>
      <div class="square-admin">
        <h2>Categories</h2>
        <ul class="list">
            <li><a id="list-cat" href="#">List categories</a></li>
            <li><a id="add-cat" href="#">Add category</a></li>
        </ul>
      </div>
      <div class="square-admin">
        <h2>Products</h2>
        <ul class="list">
            <li><a id="list-pdt"href="#">List products</a></li>
            <li><a id="add-pdt" href="#">Add product</a></li>
        </ul>
      </div>
      <div class="square-admin">
        <h2>Users</h2>
        <ul class="list">
            <li><a id="list-usr" href="#">List users</a></li>
            <li><a id="add-usr" href="#">Add user</a></li>
        </ul>
      </div>
      <div class="gen-listing" id="gen-listing">

      </div>
      </div>
    </body>
</html>
