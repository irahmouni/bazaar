<?php

require_once "SmartyIUT.class.php";
require_once "Utilisateur.class.php";
 
session_start();

$page = new SmartyIUT();

if (isset($_SESSION['login'])&&$_SESSION['login']=="admin") {
    $page->assign("login","Admin");
}
$usager = Utilisateur::getUsagers();
$page->assign("utilisateur",$usager);
$page->display('liste.tpl');