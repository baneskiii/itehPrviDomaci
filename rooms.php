<?php

require "DBBroker.php";
require "model/soba.php";
$rs = Soba::vratiSve($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Sobe</title>
    <link rel="icon" type="image/x-icon" href="img/room.png">
    <link rel="stylesheet" href="css/rooms.css">
</head>
<body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <div class="col-md-12">
        <h1 class="display-1" style="text-align:center; color:blue">Sobe</h1>
    </div>

    <div class="col-md-2">
        
    </div>

    <div class="col-md-8">
        <div id="sve-sobe">
            <table id="tabela" class="table sortable table-bordered table-hover" style="border-width: 0.5rem; border-color: blue;">
                <thead>
                    <tr>
                        <th>Broj sobe</th>
                        <th>Sprat</th>
                        <th>Povrsina u m^2</th>
                        <th>Broj kreveta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($red = $rs->fetch_array()):
                    ?>
                        <tr>
                            <td><?php echo $red["sobaID"]?></td>
                            <td><?php echo $red["sprat"]?></td>
                            <td><?php echo $red["povrsina"]?></td>
                            <td><?php echo $red["brojKreveta"]?></td>
                        </tr>
                    <?php
                    endwhile;    
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class = "row">
         <div class="col-md-2">
                <div class="col-md-1">
                <a href="reservation.php" class="btn btn-primary" style="height: 3.5rem;">Vrati se na rezervacije</a>
                </div>
        </div>   
    </div>


    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>