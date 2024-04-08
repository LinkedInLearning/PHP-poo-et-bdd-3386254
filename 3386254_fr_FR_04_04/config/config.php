<?php
/******************** les chemins des différents dossiers ****************************/
// le chemin d'accès au dossier du serveur
define('PROJET_ROOT', $_SERVER['DOCUMENT_ROOT'].'/blog');
// Le chemin daccès au dossier des classes
define('CLASSES_ROOT', PROJET_ROOT.'/classes');
// Le chemin d'accès au dossier admin
define('ADMIN_ROOT', PROJET_ROOT.'/admin');
// Le chemin d'accès au dossier includes
define('INCLUDES_ROOT', PROJET_ROOT.'/includes');
// Le chemin d'accès au dossier vendor
define('VENDOR_ROOT', PROJET_ROOT.'/vendor');

//inclusion de l'autoload

require_once(VENDOR_ROOT.'/autoload.php');

$session = new Classes\Session;

print_r(Classes\Db::connect());