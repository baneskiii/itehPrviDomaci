<?php

class Grad{

    public $gradID;
    public $nazivGrada;
    public $drzava;
    public $brojStanovnika;

    public function __contruct($gradID = null, $nazivGrada = null, $drzava = null, $brojStanovnika = null){
        $this->gradID = $gradID;
        $this->nazivGrada = $nazivGrada;
        $this->drzava = $drzava;
        $this->brojStanovnika = $brojStanovnika;
    }
}
?>