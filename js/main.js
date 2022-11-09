$("#dodajForma").submit(function(){
    event.preventDefault(); //da se ne refreshuje stranica
    const $form = $(this);
    const $inputs = $form.find("input, select, button");
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    request = $.ajax({ //ajax prihvata json objekat
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
            console.log(""+response);
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

$("#izmeniForma").submit(function(){
    event.preventDefault(); //da se ne refreshuje stranica
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);


    
    request = $.ajax({ //ajax prihvata json objekat
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
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});

$("#obrisiForma").submit(function(){
    event.preventDefault(); //da se ne refreshuje stranica
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);


    
    request = $.ajax({ //ajax prihvata json objekat
        url: 'handler/obrisi.php',
        type: 'post',
        data: serijalizacija
    });

    request.done(function(response, txtStatus, jqXHR){
        if(response === "Uspesno brisanje"){
            alert("Rezervacija je obrisana");
            console.log("Uspesn brisanje rezervacije");
            location.reload();
        }else{
            console.log(""+response);
        }
        console.log(response);
    });

    request.fail(function(jqXHR, textStatus, errorThrown){
        console.error("Sledeca greska se desila: "+textStatus, errorThrown);
    });

});