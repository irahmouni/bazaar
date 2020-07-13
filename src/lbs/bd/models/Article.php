<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'Article';
  protected $primaryKey = ' ArticleID';
  public $timestamps = false;

  public function Operation(){
    return $this->belongsTo('factcli\models\Operation', 'opperationID');
  }
}


?>
