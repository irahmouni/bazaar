<?php
 
require_once "Connexion.php";
class Utilisateur
{
    private $nom;
    private $num_carte;
    private $lib_categ;
    private $date_carte;
    private $mt_caution;

    public function __construct($nom, $num_carte, $lib_categ, $date_carte, $mt_caution)
    {
        $this->nom = $nom;
        $this->num_carte = $num_carte;
        $this->lib_categ = $lib_categ;
        $this->date_carte = $date_carte;
        $this->mt_caution = $mt_caution;
    }
		
    public static function getUsagers() {

        $bdd = ConnexionBdd::getBdd();

        $requete = $bdd->query("SELECT num_carte FROM usager");

        $utilisateurs = [];

        while ($row = $requete->fetch()) {
            $utilisateurs[] = self::get($row["num_carte"])->toArray();
        }
        return $utilisateurs;
    }

    public function toArray() {
        return ["nom"=>$this->nom,
            "num_carte"=>$this->num_carte,
            "lib_categ"=>$this->lib_categ,
            "date_carte"=>$this->date_carte,
            "mt_caution"=>$this->mt_caution];
    }
	
 public static function get($numero_carte) {

        $bdd = ConnexionBdd::getBdd();

        $requete = $bdd->query("SELECT usager.num_carte as num, nom, lib_categ, date_carte, mt_caution FROM usager, categorie WHERE usager.num_categ=categorie.num_categ AND num_carte='".$numero_carte."'");

        if($utilisateur = $requete->fetch()) {
            return new Utilisateur($utilisateur['nom'],$utilisateur['num'],$utilisateur['lib_categ'],$utilisateur['date_carte'],$utilisateur['mt_caution']);
        }
    }
	

    public function getNom()
    {
        return $this->nom;
    }

    public function getNumCarte()
    {
        return $this->num_carte;
    }

    public function getLibCateg()
    {
        return $this->lib_categ;
    }

    public function getDateCarte()
    {
        return $this->date_carte;
    }

    public function getMtCaution()
    {
        return $this->mt_caution;
    }

    public static function creer($nom_utilisateur, $categorie) {

        $bdd = ConnexionBdd::getBdd();

        $requete = $bdd->query("SELECT COUNT(*) as nombre FROM usager");

        if($nombre = $requete->fetch()) {
            $numero = $nombre["nombre"];
            $numero=$numero+1;
            $numero='C'.$numero;
            $requete=$bdd->query("INSERT INTO usager VALUE('".$numero."','".$nom_utilisateur."','".$categorie."','5','".date('Y-d-m')."')");
            return true;
        }
    }

   

}