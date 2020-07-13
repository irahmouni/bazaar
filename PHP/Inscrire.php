<?php
 
require_once "SmartyIUT.class.php";
require_once "Utilisateur.class.php";

session_start();

$page = new SmartyIUT();

if (isset($_SESSION['login'])&&$_SESSION['login']=="admin") {
    $page->assign("login","Admin");
}
if (isset($_POST['nom'])&&isset($_POST['categorie'])) {
try {
$user = Utilisateur::creer($_POST['nom'], $_POST['categorie']);
}
}

$page->display('Utilisateur.tpl');
