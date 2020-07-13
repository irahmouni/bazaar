<?php 

try {
    $dsn= 'mysql:host=localhost;dbname=bazaar';
    $db = new PDO ($dsn, 'phpuser', 'php54', array( PDO::ATTR_PERSISTENT => true,
                                                    PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                                    PDO::ATTR_EMULATE_PREPARES => false,
                                                    PDO::ATTR_STRINGIFY_FETCHES => false));
    $db->prepare('SET NAMES \'UTF8\'')->execute();
} catch ( PDOException $e) {
    throw new DBException("connection: $dsn " . $e->getMessage() . '<br/>');

} 
/**
 * la partie exécutable
 */
/**
 * partie adresse
 */
$sql = 'SELECT * FROM Adresse';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'adresseID' ];
    print $row[ 'numero' ];
    print $row[ 'rue' ];
    print $row[ 'codePostale' ];
    print $row[ 'pays' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}

/**
 * partie Article
 */
$sql = 'SELECT * FROM Article';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'ArticleID' ];
    print $row[ 'nom' ];
    print $row[ 'descriptionCourte' ];
    print $row[ 'prix HT' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}

/**
 * partie commande
 */
$sql = 'SELECT * FROM Commande';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'commandeID' ];
    print $row[ 'reglee' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
   
/**
 * partie IllustrationArticle
 */
$sql = 'SELECT * FROM IllustrationArticle';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'ImageID' ];
    print $row[ 'articleID' ];
    print $row[ 'title' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
/**
 * partie IllustrationArticle
 */
$sql = 'SELECT * FROM Operation';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'operationID' ];
    print $row[ 'quantite' ];
    print $row[ 'date' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
   
/**
 * partie Prix
 */
$sql = 'SELECT * FROM Prix';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'articleID' ];
    print $row[ 'valeur' ];
    print $row[ 'article' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
   
/**
 * partie Utilisateur
 */
$sql = 'SELECT * FROM Utilisateur';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'id' ];
    print $row[ 'passwordHash' ];
    print $row[ 'pseudo' ];
    print $row[ 'prenom' ];
    print $row[ 'nom' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
   
?>