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
    include('templates/viewPosts.php');
}

function detailAction($p_id)
{
    $row = getPost($p_id);
    if (!$row) {
        header("HTTP/1.1 404 Not Found");
        echo 'La page n\'a pas été trouvé';
        die();
    } else {
        include('templates/viewDetailPost.php');
    }
}

function ajoutAction() {
    include('templates/viewAjoutPost.php');
}

function supprAction($p_id) {
    $row = getPost($p_id);
    if (!$row) {
        header("HTTP/1.1 404 Not Found");
        echo 'La page n\'a pas été trouvé';
        die();
    } else {
        include('templates/viewSupprPost.php');
    }
}

function modifAction($p_id) {
    $row = getPost($p_id);
    if (!$row) {
        header("HTTP/1.1 404 Not Found");
        echo 'La page n\'a pas été trouvé';
        die();
    } else {
        include('templates/viewModifPost.php');
    }
}

function exportAction(){
    $data = getAllPost();
    $p = PDF_new();

    /*  ouvre un nouveau fichier PDF ; insère un nom de fichier pour créer le PDF sur le disque */
    if (PDF_begin_document($p, "", "") == 0) {
        die("Error: " . PDF_get_errmsg($p));
    }
    PDF_set_info($p, "Creator", "exportAction.php");
    PDF_set_info($p, "Author", "MAILLE Philippe");
    PDF_set_info($p, "Title", "Liste des articles");


}