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
<script type="text/javascript" src="script.js">
function achat(btn){
    $("#article").text('ok');
    var id=$(btn).attr('id');
    var x="#"+id;
    var descr=$(x).siblings("h5").text();
    var prix=$(x).siblings("p").text();
    var quantiteMax=10;

    if(btn.classList.contains('btn-success')){
        btn.className='btn btn-danger ';
        btn.innerHTML='Retirer du panier';
        $("tbody").append("<tr class="+id+"><td><img  class=\"corbeille\" onclick=\"supprimer(this)\" src=\"img/corbeille.jpg\">"+"      "+descr+"</td><td><input class=\"quantite\" type=\"number\" value='1' onchange=\"ajoutQte(this), total()\" onkeyup=\"ajoutQte(this), total()\" type=\"number\"  min=\"1\" max=\""+quantiteMax+"\">\n</td><td class='prix'>"+prix+"</td><td class='total'>"+prix+"</td></tr>");

    }
    else{

        $("#panier span:eq("+x+")").css("display","none");
        btn.className='btn btn-success';
        btn.innerHTML='Ajouter au panier';
        $("."+id).empty();

    }


}

function supprimer(btn) {
    var id=$(btn).parent().parent().attr('class');
    var el = document.getElementById(id);

    el.className='btn btn-success';
    el.textContent='Ajouter au panier';
    $(btn).parent().parent().empty();
    total();
}

function ajoutQte(btn) {

    var x = btn.value;



        var prix = parseFloat($(btn).parent().siblings(".prix").text());
        var tot = prix * x;
        $(btn).parent().siblings(".total").text((prix * x).toString() + "€");



}

function total() {

    var sum = 0;
    $('.total').each(function (k, v) {
        sum += parseFloat($(this).text());

    });
    $("#tot").text("Total du panier : "+sum + "€ TTC");
    if(sum>0) {

        var tva = sum - sum / 1.2;
        $("#tva").text("dont TVA : "+tva.toFixed(2) + "€ ");
    }
    else
        $("#tva").text("");


    var nbArt = 0;
   

    $('.quantite').each(function (k, v) {
        nbArt += parseInt($(this).val());
        

    });
    if(nbArt==0)
        $("#article").text("panier vide");
    else if(nbArt==1)
        $("#article").text("1 article");
    else
        $("#article").text(nbArt+" articles");

}

</script>

</body>
</html>

