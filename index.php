<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 28/05/2020
 * Time: 09:15
 */
//start sessie
session_start();
// check als sesie gezet is, wanneer dit niet is maak het false (word eenmalig uitgevoerd)
if(!isset($_SESSION['isLoggedIn']))
{
    $_SESSION['isLoggedIn'] = false;
}
//start database connectie
include "includes\sql.php";
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="home pagina">
    <meta name="keywords" content="vakantiehuis,ardennen,durbuy,vakantie">
    <meta name="author" content="Alexander Deelen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin | Home</title>
    <?php
    //zet de header op de pagina
    include "includes\header.php";
    ?>
</head>
<body>

    <div id="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images\huis1.jpg" class="img-fluid" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images\huis2.jpg" class="img-fluid" class="d-block w-100 " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images\huis3.jpg" class="img-fluid" class="d-block w-100 " alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="col-12" id="inleidingText">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum eros non ligula elementum dictum.
                Mauris sollicitudin dolor vitae sagittis aliquam. Cras dapibus sem vitae magna faucibus lacinia. Suspendisse vehicula
                efficitur risus sed iaculis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec eros ornare felis
                suscipit vestibulum id ut tellus. Integer quis laoreet massa. Nam laoreet sagittis lacus quis fermentum. Sed congue,
                ante eget egestas blandit, massa urna porta odio, laoreet vulputate nisl ligula a neque. Duis eu tortor a dui finibus
                aliquam. Donec in lectus dui. Phasellus commodo elit ac diam aliquet faucibus non non justo.</p>
        </div>
    </div>
    <?php
        //zet de footer op de pagina
        include "includes\\footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>

