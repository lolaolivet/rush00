<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('articles').addEventListener('click', function (e){
                e.preventDefault();

                document.getElementById('content').innerHTML ='<object type="text/html" data="pages/article.php" ></object>';

            }, false);
        }, false);
    </script>
</head>
<body>
<div class="header">
    <h1>E-commerce</h1>
</div>
<div>
    <nav>
        <ul class="menu">
            <li><a href="#" id="articles">Articles</a></li>
            <li><a href="#">Catégories</a></li>
            <li><a href="#">Panier</a></li>
            <li><a href="#">Connexion</a></li>
            <li><a href="#">Créer compte</a></li>
        </ul>
    </nav>
</div>
<div id="content">

</div>
</body>
</html>