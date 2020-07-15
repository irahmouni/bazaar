
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
    print $row[ 'comp1' ];
    print $row[ 'ville' ];
    print $row[ 'codePostal' ];
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
    print $row[ 'prix HT' ];
    print $row[ 'qantite' ];
    print $row[ 'descriptionCourte' ];
   
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
    print $row[ 'adresseID' ];
    print $row[ 'reglee' ];
    print $row[ 'date' ];
    
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
    print $row[ 'alt' ];
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
    print $row[ 'utilisateurID' ];
    print $row[ 'passwordHash' ];
    print $row[ 'pseudo' ];
    print $row[ 'prenom' ];
    print $row[ 'administrateur' ];
    //print $row[ 'url' ];
    }
}catch (PDOException $e){
        print $e->getMessage(); 
}
   
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bazaar</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<br>
<div class="container-fluid bandeau">
    <div class="row">
        <h1 class="col-8">bazaar</h1>
        <div class="col-2">
            <p id="article">panier vide</p>
        </div>
        <div class="col-2">
            <img  id=panier src="img/panier.jpg">
        </div>

    </div>
</div>
<div class="container">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img1" src="img/adidas_predator.jpg">
            <h5>Adidas Predator Mania</h5>
            <button id="0" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>155.25€ TTC</p>
        </article>

        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img2" src="img/adidas_pure.jpg">
            <h5>Adidas Ace PureControl</h5>
            <button id="1" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>175.25€ TTC</p>
        </article>

        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img3" src="img/adidas_purechaos.jpg">
            <h5>Adidas X16 Purechaos</h5>
            <button id="2" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>125.25€ TTC</p>
        </article>

        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img4" src="img/nike_hyperv.jpg">
            <h5>Nike Hypervenom Phantom III</h5>
            <button id="3" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>145.25€ TTC</p>
        </article>


        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img5" src="img/nike_tiempo.jpg">
            <h5>Nike Tiempo Ligeria</h5>
            <button id="4" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>165.25€ TTC</p>
        </article>

        <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <img id="img6" src="img/nike_mercu.jpg">
            <h5>Nike Mercurial Superfly</h5>
            <button id="5" class="btn btn-success" onclick="achat(this), total()">Ajouter au panier</button>
            <p>105.25€ TTC</p>
        </article>

    </div>

</br>
</br>

    <div class="row">
        <div class="col-12">
            <h5 id="tot" >Total du panier : 0€ </h5>
        </div>
        </br>
        <div class="col-12">
            <h8 id="tva" ></h8>
        </div>
    </div>
    </br>
    <table class="table">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>P.U</th>
            <th>Total</th>
        </tr>

        </thead>
        <tbody>
        </tbody>
    </table>





</div>
<script src="jquery.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>