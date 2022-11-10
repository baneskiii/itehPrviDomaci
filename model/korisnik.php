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
    
public static function prijava($username, $password, mysqli $conn){
    $q = "select * from korisnik where username= '".$username."' and password ='".$password."' limit 1;";
    
    return $conn->query($q);
}

}

?>