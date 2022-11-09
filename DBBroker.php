<?php

$host = "localhost";
$db = "hotel";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno){
    exit("Nije uspela konekcija: " . $conn->connect_errno);
}

?>