<?php

require "DBBroker.php";
require "model/rezervacija.php";
$rs = Rezervacija::vratiSve($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reservaton.css">
    <title>Rezervacija</title>
    
</head>
<body>
    <div class="col-md-12">
        <h1 class="display-1" style="text-align:center; color:blue">Hotel</h1>
    </div>
    <br>
    <div class="col-md-4" style="display: block;">
        <div style="text-align:center;">
            <h2 style="color:lightblue">Dodaj rezervaciju</h2>
            <button id="dugme-dodaj" class="btn" data-toggle="modal" data-target="#dodajModal"><p style="color:green;">Dodaj</p></button>
        </div>
        <div style="text-align:center;">
            <h2 style="color:lightblue">Izmeni rezervaciju</h2>
            <button id="dugme-izmeni" class="btn" data-toggle="modal" data-target="#izmeniModal"><p style="color:green;">Izmeni</p></button>
            </div>        
        <div style="text-align:center;">
            <h2 style="color:lightblue">Obrisi rezervaciju</h2>
            <button id="dugme-obrisi" class="btn"><p style="color:green;">Obrisi</p></button>
            </div>        
        <div style="text-align:center;">
            <h2 style="color:lightblue">Pretrazi rezervacije</h2>
            <input type="text" id="input-pretrazi" class="btn" placeholder="Pretrazi rezervacije" onkeyup="">
            </div>

        <div style="text-align:center;">
            <h2 style="color:lightblue">Sortiraj po gostu</h2>
            <button id="dugme-sortiraj" class="btn" onlick=""><p style="color:green;">Sortiraj</p></button>
        </div>
    </div>

    <div class="col-md-8">
        <div id="sve-rezervacije">
            <table id="tabela" class="table sortable table-bordered table-hover">
                <thead>
                    <tr>
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

    <div class="modal" id="dodajModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <form action="#" method="post" id="dodajRezervaciju">
                            <h4 text-align="center">Dodavanje rezervacije</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid black" name="imeGosta" class="form-control" placeholder="Ime gosta" value="" /> 
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid black" name="datumOd" class="form-control" placeholder="Datum od" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid black" name="datumDo" class="form-control" placeholder="Datum do" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid black" name="brojSobe" class="form-control" placeholder="Broj sobe(1-6)" value="" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: lightblue; border: 1px solid black;" ><p style="color:green;">Dodaj tim</p></button>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="color: white; background-color: lightblue; border: 1px solid black" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>







</body>
</html>