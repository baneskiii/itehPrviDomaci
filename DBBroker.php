<?php

$host = "localhost";
$db = "euroleague";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno){
    exit("Konekcija neuspesna: " . $conn->connect_errno);
}

?>