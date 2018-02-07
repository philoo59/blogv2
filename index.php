<?php
// index.php
require_once('modeles/base.php');
require_once('controllers/controllers.php');

$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
var_dump($uri);
if($uri === '/blogv2/index.php'){
    listAction();
} elseif ($uri === '/blogv2/index.php/detail.php' && isset($_GET['id'])){
    $id = intval($_GET['id']);
    detailAction($id);
} else {
    header ("HTTP/1.1 404 Not Found");
    echo 'La page n\'a pas été trouvé';
}

