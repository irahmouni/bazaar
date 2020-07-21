<?php
  require_once "./gestionBaseDonnee.php";
  
  session_start();
  
  $error = false; 
  if (!empty($_POST)){
  // si le la case est vide affichera une des message suivant
  
    $requireFields = array("name", "surname", "login", "password");
    foreach ($requireFields as $field){
      if (empty($_POST[$field])){
        $error .= "Field $field can't be empty <br />";
      }
    }
    
    if (!$error){
      if (!User::userExist($_POST["login"])){
        $user = new User($_POST["name"], $_POST["surname"], $_POST["login"], $_POST["password"]);
        $user->save();
        $_SESSION["success_message"] = "Account created";
        /*
        
          $poste out get emporte les donnée à l'interieur de cadre
          $ sassion c'est un tableau 
          $name = null,
          $surname = null,
          $login = null,
          $password = null
        */
      }else{
        $error = "User already exist"; 
      }
    }
    
  }else{
    $error = "Fields can't be empty";
  }
  
  if ($error){
    $_SESSION["error_message"] = $error;
  }
  
  header("location:index.php");
  // header rediriger l'etulisateur et executé
  die;
  // die arrete le traitement alors il n'exécute pas après
  ?>