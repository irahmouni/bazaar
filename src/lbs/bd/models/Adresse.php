<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'Adresse';
  protected $primaryKey = 'numero';
  public $timestamps = false;

  public function  Utilisateur(){
    return $this->belongsTo('factcli\models\Utilisateur', 'id');
  }
}


?>
