<?php

class Korisnik{
    public $id;
    public $username;
    public $password;

    public function __construct($id = null, $username = null, $password = null){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    
    public static function login($username, $password, mysqli $conn){
        $query = "select * from korisnik where name='".$username."' and password='".$password."' limit 1;";
        return $conn->query($query);
    }

}

?>