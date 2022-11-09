<?php
require "../DBBroker.php";
require  "../model/rezervacija.php";

if(isset($_POST['rezervacijaID'])){
    
    $status = Rezervacija::obrisi($_POST['rezervacijaID'], $conn);
    if($status){
        echo "Uspesno brisanje";
    }else{
        echo 'Neuspesno brisanje';
    }
}

?>