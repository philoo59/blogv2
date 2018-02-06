<?php
/**
 * Created by PhpStorm.
 * User: Philippe
 * Date: 06/02/2018
 * Time: 15:16
 */

function connexion(&$link)
{
    $link = new PDO("mysql:host=localhost;dbname=blog_db;charset=utf8", 'philoo', 'gipa1961');
}

function closeConnexion(&$link)
{
    $link = null;
}


function getAllPost()
{
    connexion($link);
    $result = $link->query('SELECT id, title, detail FROM post');
    $post = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $post[] = $row;
    }
    closeConnexion($link);
    return $post;
}

function getPost ($p_id) {
    connexion($link);
    $result = $link->query('SELECT id, title, detail FROM post where id=' . $p_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    closeConnexion($link);
    return $row;
}