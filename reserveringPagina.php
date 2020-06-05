<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 29/05/2020
 * Time: 15:32
 */
    include 'includes\sql.php';
    //select("*","klant");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin</title>
    <?php
    include "includes\header.php";
    ?>
</head>
<body>
    <form action="#" method="post" id="form">
        <label for="fName">Voornaam:</label><br>
        <input type="text" id="fName" name="fName" value="John"><br>

        <label for="lName">Achternaam:</label><br>
        <input type="text" id="lName" name="lName" value="Doe"><br>

        <label for="email">Email adres:</label><br>
        <input type="email" id="email" name="email" value="Doe@hotmail.com"><br>

        <label for="phone">Telefoonnummer:</label><br>
        <input type="tel" id="phone" name="phone" value="06123456789"><br>

        <label for="adres">Adres:</label><br>
        <input type="text" id="adres" name="adres" value="koningsweg 12"><br>

        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode" value="1234 AB"><br>

        <label for="plaats">Plaats:</label><br>
        <input type="text" id="plaats" name="plaats" value="Durbuy"><br>

        <label for="land">Land:</label><br>
        <input type="text" id="land" name="land" value="Belgie"><br>

        <input type="checkbox" id="man" name="man">
        <label for="man">Man</label>
        <input type="checkbox" id="vrouw" name="vrouw">
        <label for="vrouw">Vrouw</label><br>

        <input type="checkbox" id="ontbijt" name="ontbijt">
        <label for="ontbijt">Ontbijt</label><br>

        <input type="checkbox" id="contant" name="contant" value="1">
        <label for="contant">Contant</label>
        <input type="checkbox" id="overschrijven" name="overschrijven" value="overschrijven">
        <label for="overschrijven">Overschrijven</label><br>
        <input type="text" id="bankRekeningNummer" name="bankRekeningNummer"><br>

        <br><label for="sDate">Begin datum:</label>
        <input type="date" id="sDate" name="sDate"><br>
        <label for="eDate">End datum:</label>
        <input type="date" id="eDate" name="eDate"><br>
        <input type="submit" name="submit" value="Reserveer">
    </form>

    <script>
        var bankRekening = document.querySelector('input[value="overschrijven"]');
        var bankRekeningNummer = document.querySelector('input[id="bankRekeningNummer"]');
        bankRekeningNummer.style.visibility = 'hidden';

        bankRekening.addEventListener('change', () => {
            if(bankRekening.checked) {
                bankRekeningNummer.style.visibility = 'visible';
                bankRekeningNummer.value = '';
            } else {
                bankRekeningNummer.style.visibility = 'hidden';
            }
        });
    </script>
    <?php
    $sqlKlant = "INSERT INTO klant (voornaam,achternaam,email,telefoonnummer,adres,postcode,plaats,land,bankrekeningnummer,contant) VALUES (,)";
    $sqlReservering = "INSERT INTO reservering (beginDatum,eindDatum,aantalMensen,ontbijt,prijs,klantId,huisId,naamHoofdHuurder,naamExtraPersoon1,naamExtraPersoon2,naamExtraPersoon3,naamExtraPersoon4,naamExtraPersoon5) VALUES (,)";
    $sqlHuis = "INSERT INTO huizen (aantalMensen,plaats,prijs)";
    //$conn->query($sql);



    if(isset($_POST["submit"])){
        if (isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["adres"])
            && isset($_POST["postcode"]) && isset($_POST["plaats"]) && isset($_POST["land"])){

            $fname = $_POST["fName"];
            $lname = $_POST["lName"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $adres = $_POST["adres"];
            $postcode = $_POST["postcode"];
            $plaats = $_POST["plaats"];
            $land = $_POST["land"];
            //$man = $_POST["man"];
            //$vrouw = $_POST["vrouw"];
            //$ontbijt = $_POST["ontbijt"];
            //$contant = $_POST["contant"];
            //$overschrijving = $_POST["overschrijving"];
            $sDate = $_POST["sDate"];
            $eDate = $_POST["eDate"];
            $overschrijving = $_POST["bankRekeningNummer"];
            $contant = $_POST["contant"];;
            echo "true";

            $sqlKlant = "INSERT INTO klant (voornaam,achternaam,email,telefoonnumer,adres,poscode,plaats,land,bankrekeningnummer,contant) VALUES 
            ('$fname','$lname','$email','$phone','$adres','$postcode','$plaats','$land','$overschrijving','$contant')";

            $conn->query($sqlKlant);
        }
    }


    ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>