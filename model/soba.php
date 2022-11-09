<?php

class Soba{

    public $sobaID;
    public $sprat;
    public $povrsina;
    public $brojKreveta;

    public function __contruct($sobaID = null, $sprat = null, $povrsina = null, $brojKreveta = null){
        $this->sobaID = $sobaID;
        $this->sprat = $sprat;
        $this->povrsina = $povrsina;
        $this->brojKreveta = $brojKreveta;
    }

    public static function vratiSve(mysqli $conn){
        $upit = "SELECT * FROM soba";
        return $conn->query($upit);
    }

}
?>