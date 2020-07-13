<?php
 
require_once "SmartyIUT.class.php";
require_once "Depot.class.php";
require_once "Utilisateur.class.php";

session_start();

$page = new SmartyIUT();
if 
(isset($_SESSION['login'])&&$_SESSION['login']=="admin") {
 $page->assign("login","Admin");
}
if (isset($_POST['montant'])&&isset($_POST['carte'])) {

 $montant = $_POST['montant'];$carte = $_POST['carte'];$requete = Depot::ajouter($montant,$carte);$page->assign("message",$requete);
}
$user =Utilisateur::getUsagers();
$page->display('Depot.tpl');