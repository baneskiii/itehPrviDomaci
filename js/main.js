$("#dodajForma").submit(function(){
    event.preventDefault();
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    request = $.ajax({
        url: 'handler/dodaj.php',
        type: 'post',
        data: serijalizacija
    });

    request.done(function(response, txtStatus, jqXHR){
        if(response === "Uspesno dodavanje"){
            alert("Rezervacija je dodata");
            console.log("Uspesno dodavanje rezervacije");
            location.reload();
        }else{
            console.log("Neuspesno dodavanje rezervacije"+response);
            alert("Rezervacija nije dodata");
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

$("#izmeniForma").submit(function(){
    event.preventDefault();
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);


    
    request = $.ajax({ 
        url: 'handler/promeni.php',
        type: 'post',
        data: serijalizacija
    });

    request.done(function(response, txtStatus, jqXHR){
        if(response === "Uspesna promena"){
            alert("Rezervacija je promenjena");
            console.log("Uspesna promena rezervacije");
            location.reload();
        }else{
            console.log(""+response);
            alert("Rezervacija nije promenjena");
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

$("#obrisiForma").submit(function(){
    event.preventDefault();
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);


    
    request = $.ajax({
        url: 'handler/obrisi.php',
        type: 'post',
        data: serijalizacija
    });

    request.done(function(response, txtStatus, jqXHR){
        if(response === "Uspesno brisanje"){
            alert("Rezervacija je obrisana");
            console.log("Uspesno brisanje rezervacije");
            location.reload();
        }else{
            console.log(""+response);
            alert("Rezervacija nije obrisana");
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

$('th').click(function(){
    var tabela = $(this).parents('table').eq(0)
    var redovi = tabela.find('tr:gt(0)').toArray().sort(uporedjivac($(this).index()))
    this.asc = !this.asc
    if (!this.asc){redovi = redovi.reverse()}
    for (var i = 0; i < redovi.length; i++){tabela.append(redovi[i])}
})

function uporedjivac(index) {
    return function(x, y) {
        var a = dajVrednostCelije(x, index), b = dajVrednostCelije(y, index)
        return $.isNumeric(a) && $.isNumeric(b) ? a - b : a.toString().localeCompare(b)
    }
}

function dajVrednostCelije(red, index){ 
    return $(red).children('td').eq(index).text() 
}