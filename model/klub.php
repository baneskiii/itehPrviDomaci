<?php

class Klub{

    public $klubID;
    public $nazivKluba;
    public $brojTitula;
    public $brojIgraca;
    public $gradID;

    public function __construct($klubID = null, $nazivKluba = null, $brojTitula = null, $brojIgraca = null, $gradID = null){
        $this->klubID = $klubID;
        $this->nazivKluba = $nazivKluba;
        $this->brojTitula = $brojTitula;
        $this->brojIgraca = $brojIgraca;
        $this->gradID = $gradID;
    }

    public static function dodaj($nazivKluba, $brojTitula, $brojIgraca, $gradID, mysqli $conn){
        $q = "INSERT INTO klub(nazivKluba,brojTitula,brojIgraca,gradID) VALUES('$nazivKluba', '$brojTitula', '$brojIgraca', '$gradID')";
        return $conn->query($q);
    }

    public static function obrisi($klubID, mysqli $conn){
        $q = "DELETE FROM klub WHERE klubID=$klubID";
        return $conn->query($q);
    }

    public static function promeni($klubID, $nazivKluba, $brojTitula, $brojIgraca, $gradID, mysqli $conn){
        $q = "UPDATE klub set nazivKluba='$nazivKluba', brojTitula='$brojTitula', brojIgraca='$brojIgraca', gradID='$gradID' where klubID=$klubID";
        return $conn->query($q);
    }

    public static function vratiSve(mysqli $conn){
        $q = "SELECT * FROM klub";
        return $conn->query($q);
    }

}




?>