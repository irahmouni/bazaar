<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'Commandes';
  protected $primaryKey = 'commandeID';
  public $timestamps = false;

  public function Commandes(){
    return $this->belongsTo('factcli\models\Commandes', 'commandeID');
  }
}


?>
