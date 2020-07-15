<?php
  class Connexion {
    
    private static $db; 
    //  le moule c'est le moule de gateau s'il prend une bosse tout les gateeau prendron un cout
    
    public static function get(){
      if (empty(self::$db)){
        self::$db = new PDO('mysql:dbname=dbname;host=localhost', "yourbdname", "youpassword");
      }
      // tout est static dans connection 
      return self::$db;
    }
    
  }