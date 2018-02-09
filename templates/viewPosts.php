<?php
$title = 'BLOG V2';
$css = 'css/style.css';

ob_start();
?>

<nav>
    <ul>
        <li><a href="index.php/ajout.php">Ajouter un article</a></li>
        <li><a href="index.php/export.php">Exporter la liste des articles</a></li>
        <?php
        if(isset($_SESSION['message'])){?>
            <li><a href="index.php/deconnexion.php">Deconnexion</a></li>
            <?php
        }
        ?>
    </ul>
</nav>

<?php
if(isset($_SESSION['message'])){?>
    <h2><?=$_SESSION['message']?></h2>
<?php
}
?>

<h1>Liste des articles</h1>
<ul>
    <?php foreach ($data as $value) { ?>
        <li>
            <a href="index.php/detail.php?id=<?= $value['id'] ?>"><?= $value['title'] ?></a>
        </li>
        <?php
    } ?>
</ul>

<?php
$content = ob_get_clean();

include('layout.php')
?>
