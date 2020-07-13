<?php 
require_once "Connexion.php";

class Tarif
{
   
	private $prix;
    private $prestation;
     private $categorie;

    public function __construct($categorie, $prestation, $prix)
    {       
        $this->prix = $prix;
		 $this->prestation = $prestation;
		 $this->categorie = $categorie;
    }
	
	public static function get() {

        $bdd = ConnexionBdd::getBdd();

        $requete = $bdd->query("SELECT lib_categ, type_prest, prix FROM tarif, prestation, categorie WHERE tarif.num_prest=prestation.num_prest AND tarif.num_categ=categorie.num_categ ORDER BY prix");

        $tarifs = [];

        while ($ligne = $requete->fetch()) {
            $tarif = new Tarif($ligne['lib_categ'],$ligne['type_prest'], $ligne['prix']);
            $tarifs[] = $tarif;
        }
        return $tarifs;

    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getPrestation()
    {
        return $this->prestation;
    }

}