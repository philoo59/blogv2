<?php
$title = 'BLOG V2';
$css = '../css/style.css';

ob_start();

if(isset($_SESSION['message'])){?>
    <h2><?=$_SESSION['message']?></h2>
<?php
}
?>

<h1><?=$erreur?></h1>

<a href="/blogv2/index.php">Retour</a>



<?php
$content = ob_get_clean();

include('layout.php')
?>
