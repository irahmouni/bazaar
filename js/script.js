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
