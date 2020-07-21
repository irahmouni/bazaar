<?php
  class Connexion {
    
    private static $db; 
    
    public static function get(){
      if (empty(self::$db)){
        self::$db = new PDO('mysql:dbname=dbname;host=localhost', "phpuser", "php54");
      }
      // tout est static dans connection 
      return self::$db;
    }
    
  }