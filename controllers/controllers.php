<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 07/02/2018
 * Time: 11:47
 */

function listAction()
{
    $data = getAllPost();
    include('templates/show.php');
}

function detailAction($p_id)
{

    $row = getPost($p_id);
    if (!$row) {
        header("HTTP/1.1 404 Not Found");
        echo 'La page n\'a pas été trouvé';
        die();
    } else {
        include('templates/showDetail.php');
    }


}