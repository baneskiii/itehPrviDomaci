<?php

require "../dbBroker.php";
require "../model/rezervacija.php";

if(isset($_POST['rezervacijaID'])) {
    $myArray = Rezervacija::vratiPoID($_POST['rezervacijaID'], $conn);
    echo json_encode($myArray);
}