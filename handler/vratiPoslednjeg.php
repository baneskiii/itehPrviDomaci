<?php

require "../DBBroker.php";
require "../model/rezervacija.php";

$rezultat = Rezervacija::vratiPoslednjeg($conn);
if($rezultat){
    echo "Uspesno";
}else{
    echo "Neuspesno";
}


?>