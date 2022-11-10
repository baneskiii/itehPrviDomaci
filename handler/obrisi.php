<?php
require "../DBBroker.php";
require  "../model/rezervacija.php";

if(isset($_POST['rezervacijaID'])){
    
    $rezultat = Rezervacija::obrisi($_POST['rezervacijaID'], $conn);
    if($rezultat){
        echo "Uspesno brisanje";
    }else{
        echo 'Neuspesno brisanje';
    }
}

?>