<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 08/02/2018
 * Time: 09:42
 */

$title = 'BLOG V2';
$css = '../css/style.css';

if (sizeof($_POST) === 0) {
    ob_start();
    ?>
    <h1>Suppression d'un article</h1>
    <form method="post">
        <label for="title">TITRE : </label>
        <input id="title" type="text" name="title" value="<?= $row['title'] ?>" disabled><br>
        <label for="detail">DETAIL : </label>
        <textarea name="detail" id="detail" cols="30" rows="10"><?= $row['detail']?></textarea>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="bouton">
            <input type="submit" value="Supprimer">
            <input type="button" onclick="javascript:location.href = '/blogv2/index.php';" value="Annuler">
        </div>
    </form>

    <?php
    $content = ob_get_clean();

    include('layout.php');
} else {
    $retour = suppPost($_POST['id']);

    if ($retour) {
        header('Location: /blogv2/index.php');
    }
}
?>