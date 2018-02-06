<?php
// detail.php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $link = new PDO("mysql:host=localhost;dbname=blog_db;charset=utf8", 'philoo', 'gipa1961');
    $result = $link->query('SELECT id, title, detail FROM post where id=' . $id);

    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        header ("HTTP/1.1 404 Not Found");
        die;
    }

    $link=null;

    include ('templates/showDetail.php');

} else {
    header ("HTTP/1.1 404 Not Found");
    die;
}
