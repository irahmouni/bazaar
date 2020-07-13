<?php
namespace factcli\models;
require 'vendor/autoload.php';

class Facture extends \Illuminate\Database\Eloquent\Model{
  protected $table = 'IllustrationArticle';
  protected $primaryKey = 'ImageID';
  public $timestamps = false;

  public function  Article(){
    return $this->belongsTo('factcli\models\Article', 'ArticleID');
  }
}


?>
