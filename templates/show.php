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

<?php
foreach ($post as $value){
    echo '<li></li><a href="detail.php?id=' . $value['id'] . '">' . $value['title'] . '</a></br>';
}
?>
</ul>
</body>
</html>

