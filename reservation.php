<?php

require "DBBroker.php";
require "model/rezervacija.php";
$rs = Rezervacija::vratiSve($conn);

?>
<?php
 
$zaDvaMeseca = 60 * 60 * 24 * 60 + time();
setcookie('poslednjaPoseta', date("G:i - d/m/y"), $zaDvaMeseca);
if(isset($_COOKIE['poslednjaPoseta'])){
    $poseta = $_COOKIE['poslednjaPoseta'];
    echo "Vasa poslednja poseta je bila u ". $poseta;
} else {
    echo "Prva poseta";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Rezervacija</title>
    <link rel="icon" type="image/x-icon" href="img/hotel.png">
    <link rel="stylesheet" href="css/reservation.css">
    
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <div class="col-md-12">
        <h1 class="display-1" style="text-align:center; color:blue">Hotel</h1>
    </div>
    <br>
    <div class="col-md-4" style="display: block;">
        <div style="text-align:center;">
            <h2 style="color:lightblue">Dodaj rezervaciju</h2>
            <button id="dugme-dodaj" class="btn" data-toggle="modal" data-target="#dodajModal" style="height: 3.5rem;"><p style="color:green;">Dodaj</p></button>
        </div>
        
        <div style="text-align:center;">
            <h2 style="color:lightblue">Izmeni rezervaciju</h2>
            <button id="dugme-izmeni" class="btn" data-toggle="modal" data-target="#izmeniModal" style="height: 3.5rem;"><p style="color:green;">Izmeni</p></button>
            </div>        
        <div style="text-align:center;">
            <h2 style="color:lightblue">Obrisi rezervaciju</h2>
            <button id="dugme-obrisi" class="btn" data-toggle="modal" data-target="#obrisiModal" style="height: 3.5rem;"><p style="color:green;">Obrisi</p></button>
            </div>        
        <div style="text-align:center;">
            <h2 style="color:lightblue">Pretrazi rezervacije</h2>
            <input type="text" id="input-pretrazi" class="btn" placeholder="Pretrazi rezervacije" >
            <button id="dugme-sortiraj" class="btn" onclick="pretraziTabelu()" style="height: 3.5rem;"><p style="color:green;">Pretrazi</p></button>
            </div>
        <div style="text-align:center;">
            <h2 style="color:lightblue">Sobe u ponudi</h2>
            <a href="rooms.php" class="btn btn-primary" style="height: 3.5rem;">Vidi</a>
        </div>

    </div>

    <div class="modal fade" id="dodajModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 3px solid blue;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="#" method="post" id="dodajForma">
                            <h3 id="naslov" style="color: black" text-align="center">Dodavanje rezervacije</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="imeGosta" class="form-control" placeholder="Ime gosta" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="datumOd" class="form-control" placeholder="Datum od" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="datumDo" class="form-control" placeholder="Datum do" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid white" name="brojSobe" class="form-control" placeholder="Broj sobe" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: lightblue; border: 1px solid white;"><i class="glyphicon glyphicon-plus"></i> Dodaj rezervaciju
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: lightblue; border: 1px solid white" data-dismiss="modal">Zatvori</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="izmeniModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 3px solid blue;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="#" method="post" id="izmeniForma">
                            <h3 id="naslov" style="color: black" text-align="center">Izmena rezervacije</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid white" name="rezervacijaID" class="form-control" placeholder="ID rezervacije" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="imeGosta" class="form-control" placeholder="Ime gosta" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="datumOd" class="form-control" placeholder="Datum od" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid white" name="datumDo" class="form-control" placeholder="Datum do" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid white" name="brojSobe" class="form-control" placeholder="Broj sobe" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <button  id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="background-color: lightblue; border: 1px solid white;"><i class="glyphicon glyphicon-plus"></i> Izmeni rezervaciju
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: lightblue; border: 1px solid white" data-dismiss="modal">Zatvori</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="obrisiModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border: 3px solid blue;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="#" method="post" id="obrisiForma">
                            <h3 id="naslov" style="color: black" text-align="center">Brisanje rezervacije</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid white" name="rezervacijaID" class="form-control" placeholder="ID rezervacije" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <button  id="btnObrisi" type="submit" class="btn btn-success btn-block" style="background-color: lightblue; border: 1px solid white;"><i class="glyphicon glyphicon-plus"></i> Obrisi rezervaciju
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: lightblue; border: 1px solid white" data-dismiss="modal">Zatvori</button>
                </div>
            </div>

        </div>
    </div>


    <div class="col-md-8">
        <div id="sve-rezervacije">
            <table id="tabelaRezervacija" class="table sortable table-bordered table-hover">
                <thead>
                    <tr id="hederTabele">
                        <th>ID</th>
                        <th>Ime gosta</th>
                        <th>Datum od</th>
                        <th>Datum do</th>
                        <th>Broj sobe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($red = $rs->fetch_array()):
                    ?>
                        <tr>
                            <td><?php echo $red["rezervacijaID"]?></td>
                            <td><?php echo $red["imeGosta"]?></td>
                            <td><?php echo $red["datumOd"]?></td>
                            <td><?php echo $red["datumDo"]?></td>
                            <td><?php echo $red["brojSobe"]?></td>
                        </tr>
                    <?php
                    endwhile;    
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    
    
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        function pretraziTabelu(){
            var x, y, red, tabela, podatak, unos, filter, pronadjen;
            unos = document.getElementById("input-pretrazi");
            tabela = document.getElementById("tabelaRezervacija");
            red = tabela.getElementsByTagName("tr");
            filter = unos.value.toLowerCase();
            for(x = 0; x < red.length; x++){
                podatak = red[x].getElementsByTagName("td");
                for(y = 0; y< podatak.length; y++){
                    if(podatak[y].innerHTML.toLowerCase().indexOf(filter) > -1){
                        pronadjen = true;
                    }
                }
                if(pronadjen){
                    red[x].style.display = "";
                    pronadjen = false;
                } else {
                    if(red[x].id != "hederTabele"){
                        red[x].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>
</html>