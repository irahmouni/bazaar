<?php

  require_once "gestionBaseDonnee.class.php"; 
  session_start();
  

  $isLogged = !empty($_SESSION["user"]);
  if ($isLogged){
    $user = $_SESSION["user"]->toArray();
  }
  
  $classError = !empty($_SESSION["error_message"]) ? "show" : "hide"; 
  $errorMessage = !empty($_SESSION["error_message"]) ? $_SESSION["error_message"] : false;
  
    
  $classSuccess = !empty($_SESSION["success_message"]) ? "show" : "hide"; 
  $successMessage = !empty($_SESSION["success_message"]) ? $_SESSION["success_message"] : false;
  
  
  if ($errorMessage){ unset($_SESSION["error_message"]); }
  if ($successMessage){ unset($_SESSION["success_message"]); }
  
?>
