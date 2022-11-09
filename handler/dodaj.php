<?php

require "../DBBroker.php";
require "../model/rezervacija.php";

if(isset($_POST['imeGosta']) && isset($_POST['datumOd']) && isset($_POST['datumDo']) && isset($_POST['brojSobe'])){
    $rezultat = Rezervacija::dodaj($_POST['imeGosta'], $_POST['datumOd'], $_POST['datumDo'], $_POST['brojSobe'], $conn);
    if($rezultat){
        echo "Uspesno dodavanje";
    }else{
        echo "Neuspesno dodavanje";
    }
}
?>