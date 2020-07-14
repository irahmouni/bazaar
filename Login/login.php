<?php
  require_once "./user.class.php";
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
        $error = "This login doesn't exist";
      }
    }else{
      $error = "Password and login can't be empty";
    }
  }else{
    $error = "Impossible to log this user, field can't be empty";  
  }
  
  
  
  if ($error){
    $_SESSION["error_message"] = $error;
  }
  
  header("location:index.php");
  die;
  