<?php
require_once '../../config/config.php';


if($session->isLoggedIn() == false)
{
	header('Location: ../login.php');
} 

use Classes\Article;

if(empty($_GET['id'])){
    header('Location: show.php');
}

$article = new Article();
$article->delete($_GET['id']);