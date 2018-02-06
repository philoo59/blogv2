<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show detail article</title>
</head>
<body>

<nav></nav>
<ul>
    <li><a href="index.php">accueil</a></li>
</ul>
</nav>

<?php
 echo '<h1>Detail de l\'article ' . $row['title'] . '</h1>';
 echo '<p>' . $row['detail'] . '</p>';
?>

</body>
</html>


