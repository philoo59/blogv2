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

function getPost($p_id)
{
    connexion($link);
    $result = $link->query('SELECT id, title, detail FROM post where id=' . $p_id);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    closeConnexion($link);
    return $row;
}

function addPost($p_data)
{
    connexion($link);

    $sql = 'INSERT INTO post VALUES (NULL ,:titre,:detail)';
    $statement = $link->prepare($sql);

    $statement->bindValue(':titre', $p_data['title'], PDO::PARAM_STR);
    $statement->bindValue(':detail', $p_data['detail'], PDO::PARAM_STR);

    $return = $statement->execute();
    closeConnexion($link);

    return $return;

}

function modifPost($p_data)
{
    connexion($link);

    $sql = 'UPDATE post SET title = :titre, detail = :detail WHERE id = :id';
    $statement = $link->prepare($sql);

    $statement->bindValue(':titre', $p_data['title'], PDO::PARAM_STR);
    $statement->bindValue(':detail', $p_data['detail'], PDO::PARAM_STR);
    $statement->bindValue(':id', $p_data['id'], PDO::PARAM_INT);

    $return = $statement->execute();
    closeConnexion($link);
    return $return;
}

function suppPost($p_id)
{
    connexion($link);

    $sql = 'DELETE FROM post WHERE id = :id';
    $statement = $link->prepare($sql);

    $statement->bindValue(':id', $p_id, PDO::PARAM_INT);

    $return = $statement->execute();
    closeConnexion($link);
    return $return;
}

