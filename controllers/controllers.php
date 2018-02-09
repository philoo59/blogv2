<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 07/02/2018
 * Time: 11:47
 */
require_once('library/classPdf.php');

function listAction()
{
    $data = getAllPost();
    include('templates/viewPosts.php');
}

function detailAction($p_id)
{
    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = '';
    } else {
        $_SESSION['message'] = '';
    }
    $row = getPost($p_id);
    if (!$row) {
        header("HTTP/1.1 404 Not Found");
        echo 'La page n\'a pas été trouvé';
        die();
    } else {
        include('templates/viewDetailPost.php');
    }
}

function ajoutAction($p_data)
{
    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = '';
    } else {
        $_SESSION['message'] = '';
    }

    if (sizeof($p_data) === 0) {
        $erreur = '';
        include('templates/viewAjoutPost.php');
    } else {
        if ($p_data['title'] === '' || $p_data['detail'] === '') {
            $_SESSION['message'] = 'Vous devez renseigner tous les champs';
            $erreur = 'Vous devez renseigner tous les champs';
            include('templates/viewAjoutPost.php');
        } else {
            $retour = addPost($_POST);
            if ($retour) {
                $_SESSION['message'] = 'Article ajouté';
                header('Location: /blogv2/index.php');
            }
        }
    }
}

function supprAction($p_id)
{
    $_SESSION['message'] = '';
    $row = getPost($p_id);
    if (!$row) {
        erreur();
    } else {
        include('templates/viewSupprPost.php');
    }
}

function modifAction($p_id)
{
    $erreur = '';
    if (gettype($p_id) === 'array') {
        if ($p_id['title'] === '' || $p_id['detail'] === '') {
            $erreur = 'Vous devez renseigner tous les champs';
            $row = getPost($p_id['id']);
            include('templates/viewModifPost.php');
        } else {
            $retour = modifPost($p_id);
            if ($retour) {
                $_SESSION['message'] = 'Article modifié';
                header('Location: /blogv2/index.php');
            }
        }
    } else {
        $row = getPost($p_id);
        if (!$row) {
            erreur();
        } else {
            include('templates/viewModifPost.php');
        }
    }
}

function exportAction()
{
    $_SESSION['message'] = '';
    $data = getAllPost();
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);
    foreach ($data as $value) {
        $pdf->Cell(50, 10, 'Id de l\'article ' . $value['id'], 0, 0);
        $pdf->Cell(50, 10, 'Titre de l\'article ' . $value['title'], 0, 1);
    }
    $pdf->Output();
}

function erreur()
{
    $erreur = 'La page n\'a pas été trouvé';
    header("HTTP/1.1 404 Not Found");
    include('templates/viewError.php');
}

function deconnectAction()
{
    session_unset();
    include('templates/viewEnd.php');
}