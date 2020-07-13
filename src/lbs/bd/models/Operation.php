<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'Operation';
  protected $primaryKey = ' opperationID';
  public $timestamps = false;

  public function Operation(){
    return $this->belongsTo('factcli\models\Operation', ' opperationID');
  }
}


?>
