<?php
require "DBBroker.php";
require "model/korisnik.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $rezultat = Korisnik::login($username, $password, $conn);

    if($rezultat->num_rows == 1){
        echo "Uspesno logovanje";
        header('Location: reservation.php');
        exit();
    }else{
        echo "<script>
        alert('Neuspesna prijava! Proverite unete podatke!');
        window.location.href='';  
        </script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-card">
      <h2>Dobrodosli na stranicu hotela</h2>
      <h3>Unesite podatke</h3>
      <form class="login-form" method = "POST">
        <input type="text" placeholder="Korisnicko ime" name="username" required/>
        <input type="password" placeholder="Lozinka" name="password" required/>
        <button type="submit">PRIJAVA</button>
      </form>
    </div>
  </body>
</html>