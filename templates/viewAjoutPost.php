<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 07/02/2018
 * Time: 15:46
 */

$title = 'BLOG V2';
$css = '../css/style.css';

ob_start();
?>
    <h1>Ajouter un article</h1>
    <h2><?= $erreur ?></h2>
    <form method="post" action="/blogv2/index.php/ajoutValue.php">
        <label for="title">TITRE : </label>
        <input id="title" type="text" name="title" placeholder="Saisissez le titre"><br>
        <label for="detail">DETAIL : </label>
        <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
        <div class="bouton">
            <input type="submit" value="Ajouter">
            <input type="button" onclick="javascript:location.href = '/blogv2/index.php';" value="Annuler">
        </div>
    </form>

<?php
$content = ob_get_clean();
include('layout.php');

?>