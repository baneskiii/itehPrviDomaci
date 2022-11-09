<?php

class Rezervacija{

    public $rezervacijaID;
    public $imeGosta;
    public $datumOd;
    public $datumDo;
    public $brojSobe;

    public function __construct($rezervacijaID = null, $imeGosta = null, $datumOd = null, $datumDo = null, $brojSobe = null){
        $this->rezervacijaID = $rezervacijaID;
        $this->imeGosta = $imeGosta;
        $this->datumOd = $datumOd;
        $this->datumDo = $datumDo;
        $this->brojSobe = $brojSobe;
    }

    public static function dodaj($imeGosta, $datumOd, $datumDo, $brojSobe, mysqli $conn){
        
        $upit = "INSERT INTO rezervacija(imeGosta,datumOd,datumDo,brojSobe) VALUES('$imeGosta', '$datumOd', '$datumDo', '$brojSobe')";
        return $conn->query($upit);
    }

    public static function obrisi($rezervacijaID, mysqli $conn){
        $upit = "DELETE FROM rezervacija WHERE rezervacijaID=$rezervacijaID";
        return $conn->query($upit);
    }

    public static function promeni($rezervacijaID, $imeGosta, $datumOd, $datumDo, $brojSobe, mysqli $conn){
        $upit = "UPDATE rezervacija set imeGosta='$imeGosta', datumOd='$datumOd', datumDo='$datumDo', brojSobe='$brojSobe' where rezervacijaID=$rezervacijaID";
        return $conn->query($upit);
    }

    public static function vratiSve(mysqli $conn){
        $upit = "SELECT * FROM rezervacija";
        return $conn->query($upit);
    }

    public static function vratiPoslednjeg(mysqli $conn){
        $upit = "SELECT * FROM rezervacija ORDER BY rezervacijaID DESC LIMIT 1";
        return $conn->query($upit);
    }

}




?>