<?php
$title = 'BLOG V2';

ob_start();
?>

<h1>Liste des articles</h1>
<ul>
    <?php foreach ($data as $value) { ?>
        <li>
            <a href="detail.php?id=<?= $value['id'] ?>"><?= $value['title'] ?></a>
        </li>

        <?php
    } ?>
</ul>

<?php
$content = ob_get_clean();

include('layout.php')
?>
