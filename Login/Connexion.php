<?php


class ConnexionBdd
{
    private static $BDD;

    public static function getBdd() {
        if (empty(self::$BDD )) {
            try {
                self::$BDD = new PDO("mysql:host=infodb2;dbname=sfaxi1u_db", "sfaxi1u", "31621957", array(PDO::ATTR_PERSISTENT => true));
            } catch (PDOException $e) {
                echo "Problèmes de connection à la base de donnée : ".$e->getMessage();
                die;
            }
        }
        return self::$BDD;
    }
}