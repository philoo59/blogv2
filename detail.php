<?php
// detail.php
require_once ('modeles/base.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $row = getPost($id);

    if (!$row) {
        header ("HTTP/1.1 404 Not Found");
        die;
    }


    include ('templates/showDetail.php');

} else {
    header ("HTTP/1.1 404 Not Found");
    die;
}
