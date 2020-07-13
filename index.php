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
$sql = 'SELECT * FROM item';
try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ){
    print $row[ 'nom' ];
    print $row[ 'descr' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
    
?>