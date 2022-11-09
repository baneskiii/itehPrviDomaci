$("#dodajForma").submit(function(){
    event.preventDefault(); //da se ne refreshuje stranica
    console.log("Dodaj je pokrenuto");
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

