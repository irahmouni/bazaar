<?php
  require_once "user.class.php"; 
  session_start();
  $error = false; 
  
  $isLogged = !empty($_SESSION["user"]);
  
  if ($isLogged){
    if ($_SESSION["user"]->update($_POST["name"], $_POST["surname"], $_POST["login"], $_POST["password"])){
      $_SESSION["success_message"] = "Account updated";
    }else{
      $error = "Login already exist"; 
    }
  }
  else{
    $error = "You are not logged yet";
  }
  
  if ($error){
    $_SESSION["error_message"] = $error;
  }
  
  header("location:index.php");
  die;