<?php
$title = 'BLOG V2';

ob_start();
?>
<ul>
    <li><a href="/blogv2/index.php">accueil</a></li>
</ul>
</nav>


 <h1>Detail de l\'article <?= $row['title']?></h1>'
 <p><?=$row['detail']?></p>

<?php
$content = ob_get_clean();

include('layout.php')
?>
