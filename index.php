<?php
// index.php
require_once('modeles/base.php');
require_once('controllers/controllers.php');
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if($uri === '/blogv2/') {
    listAction();
} elseif($uri === '/blogv2/index.php'){
    listAction();
} elseif ($uri === '/blogv2/index.php/detail.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    detailAction($id);
} elseif ($uri === '/blogv2/index.php/ajout.php'){
    ajoutAction();
} elseif ($uri === '/blogv2/index.php/suppr.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    supprAction($id);
} elseif ($uri === '/blogv2/index.php/modif.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    modifAction($id);
} elseif ($uri === '/blogv2/index.php/export.php'){
    exportAction();
} else {
    header ("HTTP/1.1 404 Not Found");
    echo 'La page n\'a pas été trouvé';
}

