<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 09/06/2020
 * Time: 10:25
 */

//is de reserverings form ingevuld en op reserveren gedrukt
if(isset($_POST["submit"])){
    //zijn alle velden die verplicht zijn ingevuld
    if (isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["adres"])
        && isset($_POST["postcode"]) && isset($_POST["plaats"]) && isset($_POST["land"])){

        //variables van ingevulde gegevens die te maken hebben met de klant
        $fname = $_POST["fName"];
        $lname = $_POST["lName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $adres = $_POST["adres"];
        $postcode = $_POST["postcode"];
        $plaats = $_POST["plaats"];
        $land = $_POST["land"];
        $sDate = $_POST["sDate"];
        if($_POST["betaalmethode"] == 'contant'){
            $contant = $_POST["betaalmethode"];
            $overschrijving = '';
        }
        if($_POST["betaalmethode"] == 'overschrijven'){
            $overschrijving = $_POST["betaalmethode"];
            $contant = '';
        }

        $bankRekeningNummer = $_POST['bankRekeningNummer'];

        //variables van ingevulde gegevens die te maken hebben met de reservering
        $ontbijt = $_POST["ontbijt"];
        $beginDatum = $_POST["sDate"];
        $eindDatum = '';

        //variable voor aantal nachten
        if($_POST['nachten'] == '2nachten'){
            $tweeNachten = $_POST['nachten'];
        }

        if ($_POST['nachten'] == '5nachten'){
            $vijfNachten = $_POST['nachten'];
        }

        if ($_POST['nachten'] == '7nachten'){
            $zevenNachten = $_POST['nachten'];
        }

        if($tweeNachten){
            $eindDatum = date('Y-m-d', strtotime($beginDatum. ' + 2 days'));
        }elseif($vijfNachten){
            $eindDatum = date('Y-m-d', strtotime($beginDatum. ' + 5 days'));
        }elseif($zevenNachten){
            $eindDatum = date('Y-m-d', strtotime($beginDatum. ' + 7 days'));
        }else{
            echo "geen nachten geselecteerd";
        }

        //zet de klant gegevens in de database tabel van klant
        $sqlKlant = "INSERT INTO klant (voornaam,achternaam,email,telefoonnumer,adres,poscode,plaats,land,bankrekeningnummer,contant) VALUES 
            ('$fname','$lname','$email','$phone','$adres','$postcode','$plaats','$land','$bankRekeningNummer','$contant')";

        //voer de database query uit
        $conn->query($sqlKlant);

        //selecteer alles uit de klant tabel
        $sql = "SELECT * FROM klant";

        $result= $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $klantId = $row['klantid'];
        }

        //zet de reserverings gegevens in de database tabel van reservering
        $sqlReservering = "INSERT INTO reservering (beginDatum,eindDatum,aantalMensen,ontbijt,klantId,huisId,naamHoofdHuurder) VALUES 
                ('$beginDatum','$eindDatum','2','$ontbijt','$klantId','$id','$fname')";
        //voer de database query uit
        $conn->query($sqlReservering);
    }
}