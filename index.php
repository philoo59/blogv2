<?php
// index.php
$link = new PDO("mysql:host=localhost;dbname=blog_db;charset=utf8", 'philoo', 'gipa1961');
$result = $link->query('SELECT id, title FROM post');
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog v2</title>
</head>
<body>

<h1>Liste des articles</h1>
<ul>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) : ?>
    <li>
        <a href="show.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a>
    </li>
    <?php endwhile ?>
</ul>
</body>
</html>
