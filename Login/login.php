<?php
  require_once "./gestionBaseDonnee.php";
  session_start();
  
  $error = false; 
  
  if (!empty($_POST)){
    if (!empty($_POST["login"]) && !empty($_POST["password"])){
      if (User::userExist($_POST["login"])){
        if ($user = User::load($_POST["login"], $_POST["password"])){
          $_SESSION["success_message"] = "Success login process";
          $_SESSION["user"] = $user;
        }
      }else{
        $error = "Cette connexion n'existe pas";
      }
    }else{
      $error = "Le mot de passe et la connexion ne peuvent pas être vides";
    }
  }else{
    $error = "Impossible d'enregistrer cet utilisateur, le champ ne peut pas être vide";  
  }
  
  
  
  if ($error){
    $_SESSION["error_message"] = $error;
  }
  
  header("location:index.php");
  die;
  