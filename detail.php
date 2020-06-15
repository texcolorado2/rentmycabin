<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 29/05/2020
 * Time: 14:21
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="detail pagina met extra informatie over het geselecteerde huis">
    <meta name="keywords" content="vakantiehuis,ardennen,durbuy,vakantie">
    <meta name="author" content="Alexander Deelen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin | Detail</title>
    <?php
    include "includes\header.php";
    ?>
</head>
<body>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">details over binnenkant huis</h5>
                <p class="card-text">het huis heeft meerdere slaapkamers,woonkamer en keuken</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">details over buitenkant huis</h5>
                <p class="card-text">er is een barbeque aanwezig. verder is er een grasveld voor de kinderen of de hond</p>
            </div>
        </div>
    </div>
</div>
<div class="row" id="detailImages">
    <div class="col-sm-4">
        <div class="card">
            <div class="card">
                <img class="card-img-top" src="images\meer.jpg" alt="Card image cap">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card">
                <img class="card-img-top" src="images\speel.jpg" alt="Card image cap">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card">
                <img class="card-img-top" src="images\zwembad.jpg" alt="Card image cap">
            </div>
        </div>
    </div>
</div>


<?php include "includes\\footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>