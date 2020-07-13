<?php

require_once "Utilisateur.class.php";
require_once "Connexion.php";

class Depot
{
    public static function ajouter($montant, $carte) {

        $bdd = ConnexionBdd::getBdd();

        $requete=$bdd->query("INSERT INTO depot VALUE('".$carte."','".date('Y-d-m')."','".$montant."')");

        return "Depot effectuer"

    }

}