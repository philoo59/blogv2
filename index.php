<?php
// index.php
$link = new PDO("mysql:host=localhost;dbname=blog_db;charset=utf8", 'philoo', 'gipa1961');
$result = $link->query('SELECT id, title, detail FROM post');

$post = array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
    $post[]= $row;
}

$link=null;

include ('templates/show.php');
