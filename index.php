<?php
// index.php
require_once ('modeles/base.php');

$data = getAllPost();

include ('templates/show.php');
