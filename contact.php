<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 28/05/2020
 * Time: 09:39
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
    <meta name="description" content="contact pagina waar je een mail kan sturen">
    <meta name="keywords" content="vakantiehuis,ardennen,durbuy,vakantie">
    <meta name="author" content="Alexander Deelen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin | Contact</title>
    <?php
    include "includes\sql.php";
    include "includes\header.php";
    ?>
</head>
<body>
<div class="container text-align-center" id="formContainer">
    <form action="#" method="post" id="form">
        <div class="form-row col-12 ">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label>*voornaam: </label><br>
                <input type="text" class="form-control" name="firstname" class="form" placeholder="John"> </input>
                <label>*achternaam: </label><br>
                <input type="text" class="form-control" name="lastname" class="form" placeholder="Doe"> </input>
                <label>*email address: </label><br>
                <input type="email" class="form-control" name="email" class="form"
                       placeholder="john.doe@hotmail.com">  </input>
                <label>*telefoonnummer: </label><br>
                <input type="text" class="form-control" name="tel" class="form" placeholder="0614322591">  </input>
                <label>*message: </label><br>
                <input type="text" class="form-control" name="message" class="form" placeholder="php is awesome">  </input><br>
                <input type="submit" class="form-control" name="submit" value="versturen"> </input><br>
                <input type="reset" class="form-control" value="velden leegmaken"> </input><br>
                <label>velden met * zijn verplicht</label><br>

                <?php
                //kijk als het gesubmit is
                if (isset($_POST["submit"])) {
                    //check dat alles ingevuld is
                    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message']) || isset($_POST['tel'])) {
                        //variable maken
                        $voornaam = trim($_POST['firstname']);
                        $achternaam = trim($_POST['lastname']);
                        $email = $_POST['email'];
                        $bericht = $_POST['message'];
                        $tel = $_POST['tel'];

                        //insert variablen
                        $contactSQL = "INSERT INTO contact(voornaam,achternaam,email,bericht,telefoonnummer) VALUES ('$voornaam','$achternaam','$email','$bericht','$tel')";

                        //voer sql statement uit
                        $conn->query($contactSQL);

                        //variable voor mail te kunnen sturen
                        $naar = "test@localhost"; // mail waar naar verstuurt wordt
                        $van = $_POST['email']; // mail waar vandaan komt
                        $onderwerp = "Vraag/Opmerking Rent my Cabin"; //onderwerp
                        $opener = "Geachte Heer/Mevrouw, \nHierbij uw vraag/opmerking.\n\n";
                        $bericht = $_POST['message']; //bericht
                        $afsluiting = "\n\nMet vriendelijke groeten, \nTeam Rent my Cabin.";

                        $headers = "Van:" . $van;
                        //mail functie
                        mail($naar, $onderwerp, $opener .$bericht. $afsluiting, $headers);

                        $opener = "Geachte Heer/Mevrouw, \nHierbij de vraag/opmerking van de klant.\n\n";
                        mail($van,$onderwerp,$opener .$bericht. $afsluiting,$headers);
                    }
                }
                ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>


<?php include "includes\\footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>
