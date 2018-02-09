<?php
// index.php
require_once('modeles/base.php');
require_once('controllers/controllers.php');
// Session
session_set_cookie_params(360);
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

if($uri === '/blogv2/') {
    // root default
    listAction();
} elseif($uri === '/blogv2/index.php'){
    // root default
    listAction();
} elseif ($uri === '/blogv2/index.php/detail.php' && isset($_GET['id'])){
    // root view detail
    $id = intval($_GET['id']);
    detailAction($id);
} elseif ($uri === '/blogv2/index.php/ajout.php'){
    // root view ajout
    ajoutAction(array());
} elseif ($uri === '/blogv2/index.php/ajoutValue.php'){
    // root view save ajout
    ajoutAction($_POST);
} elseif ($uri === '/blogv2/index.php/suppr.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    supprAction($id);
} elseif ($uri === '/blogv2/index.php/modif.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    modifAction($id);
} elseif ($uri === '/blogv2/index.php/modif.php'){
    modifAction($_POST);
} elseif ($uri === '/blogv2/index.php/export.php'){
    exportAction();
} elseif ($uri === '/blogv2/index.php/deconnexion.php'){
    deconnectAction();
} else {
    erreur();
}

