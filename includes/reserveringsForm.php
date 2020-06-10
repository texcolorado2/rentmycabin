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

        $aantalMensen = $_POST['aantalMensen'];

        echo $aantalMensen;

        $naamExtraPersoon1 = $_POST['extraPersoon1'];
        $naamExtraPersoon2 = $_POST['extraPersoon2'];
        $naamExtraPersoon3 = $_POST['extraPersoon3'];
        $naamExtraPersoon4 = $_POST['extraPersoon4'];
        $naamExtraPersoon5 = $_POST['extraPersoon5'];

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
            if ($aantalMensen == 2){
                $prijs = "280";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 2 * 2;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 4){
                $prijs = "480";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 4 * 2;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 6){
                $prijs = "640";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 6 * 2;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
        }elseif($vijfNachten){
            $eindDatum = date('Y-m-d', strtotime($beginDatum. ' + 5 days'));
            if ($aantalMensen == 2){
                $prijs = "580";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 2 * 5;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 4){
                $prijs = "1080";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 4 * 5;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 6){
                $prijs = "1440";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 6 * 5;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
        }elseif($zevenNachten){
            $eindDatum = date('Y-m-d', strtotime($beginDatum. ' + 7 days'));
            if ($aantalMensen == 2){
                $prijs = "720";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 2 * 7;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 4){
                $prijs = "1350";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 4 * 7;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
            if ($aantalMensen == 6){
                $prijs = "1950";
                if(isset($ontbijt)){
                    $prijsontbijt = 9.80 * 6 * 7;

                    $prijs = $prijs + $prijsontbijt;
                }
            }
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
        $sqlReservering = "INSERT INTO reservering (beginDatum,eindDatum,aantalMensen,ontbijt,prijs,klantId,huisId,naamHoofdHuurder,naamExtraPersoon1,naamExtraPersoon2,naamExtraPersoon3,naamExtraPersoon4,naamExtraPersoon5) VALUES 
                ('$beginDatum','$eindDatum','$aantalMensen','$ontbijt','$prijs','$klantId','$id','$fname','$naamExtraPersoon1','$naamExtraPersoon2','$naamExtraPersoon3','$naamExtraPersoon4','$naamExtraPersoon5')";
        //voer de database query uit
        $conn->query($sqlReservering);
    }
}