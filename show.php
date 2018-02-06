<?php
// index.php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $link = new PDO("mysql:host=localhost;dbname=blog_db;charset=utf8", 'philoo', 'gipa1961');
    $result = $link->query('SELECT id, title, detail FROM post where id =' . $id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        header ("HTTP/1.1 404 Not Found");
        die;
    }
} else {
    header ("HTTP/1.1 404 Not Found");
    die;
}
?>

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

<h1>Detail de l'article <?= $row['title'] ?></h1>
<p><?= $row['detail'] ?></p>

</body>
</html>