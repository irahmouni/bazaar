<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'Prix';
  protected $primaryKey = 'articleID';
  public $timestamps = false;

  public function Article(){
    return $this->belongsTo('factcli\models\Article', 'articleID');
  }
}


?>
