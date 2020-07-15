<?php
  class Connexion {
    
    private static $db; 
    
    public static function get(){
      if (empty(self::$db)){
        self::$db = new PDO('mysql:dbname=dbname;host=localhost', "yourbdname", "youpassword");
      }
      // tout est static dans connection 
      return self::$db;
    }
    
  }