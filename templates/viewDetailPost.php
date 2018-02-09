<?php
$title = 'BLOG V2';
$css = '../css/style.css';

ob_start();
?>
<nav>
    <ul>
        <li><a href="/blogv2/index.php">accueil</a></li>
        <li><a href="/blogv2/index.php/modif.php?id=<?= $row['id'] ?>">modifier</a></li>
        <li><a href="/blogv2/index.php/suppr.php?id=<?= $row['id'] ?>">supprimer</a></li>
    </ul>
</nav>


<h1> <?= $row['title'] ?></h1>
<p><?= $row['detail'] ?></p>

<?php
$content = ob_get_clean();

include('layout.php');
?>
