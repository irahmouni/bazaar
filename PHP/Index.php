<?php
 require_once "SmartyIUT.class.php";
 
session_start();

if (isset($_SESSION['login'])&&$_SESSION['login']=="admin") {
$page->assign("login","Admin");
}elseif(isset($_POST['login'])&&isset($_POST['mdp'])) 
{
if($_POST['login']=="admin"&&$_POST['mdp']=="password") {
$_SESSION["login"] = "admin";
header("Location: index.php");

}else {
        $page->assign("message","Vous avez tromper dans login ou mot de passe");
}
}
$page->display("index.tpl");
