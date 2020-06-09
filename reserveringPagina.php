<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 29/05/2020
 * Time: 15:32
 */
    include 'includes\sql.php';

    //check als de huisid gezet is
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

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
    <div class="container text-align-center" id="formContainer">
        <form action="#" method="post" id="form">
            <div class="form-row col-12 ">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <label for="fName">Voornaam:</label>
                    <input type="text" class="form-control" id="fName" name="fName" value="John">

                    <label for="email">Email adres:</label>
                    <input type="email" class="form-control" id="email" name="email" value="Doe@hotmail.com">

                    <label for="adres">Adres:</label>
                    <input type="text" class="form-control" id="adres" name="adres" value="koningsweg 12">

                    <label for="plaats">Plaats:</label>
                    <input type="text" class="form-control" id="plaats" name="plaats" value="Durbuy">
                    <div class="form-row">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="man" name="gender">
                            <label class="custom-control-label" for="man">Man</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="vrouw" name="gender">
                            <label class="custom-control-label" for="vrouw">Vrouw</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="contant" onclick="javascript:overschrijvenInput();" name="betaalmethode" value="contant">
                            <label class="custom-control-label" for="contant">Contant</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="overschrijven" onclick="javascript:overschrijvenInput();" name="betaalmethode" value="overschrijven">
                            <label class="custom-control-label" for="overschrijven">Overschrijven</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div id="ifYes" style="visibility:hidden">
                            <input type='text' class="form-control" id='bankRekeningNummer' name='bankRekeningNummer'>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="aantalMensen">Aantal mensen: &nbsp;</label>
                        <select id="aantalMensen" name="aantalMensen">
                            <?php
                                $sql = "SELECT * FROM huizen where huisId=$id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $total = $row['aantalMensen'];
                                        if ($total == 2){
                                            echo "<option value=\"aantalMensen\">1</option>";
                                            echo "<option value=\"aantalMensen\">2</option>";
                                        }
                                        if ($total == 4){
                                            echo "<option value=\"aantalMensen\">1</option>";
                                            echo "<option value=\"aantalMensen\">2</option>";
                                            echo "<option value=\"aantalMensen\">3</option>";
                                            echo "<option value=\"aantalMensen\">4</option>";
                                        }
                                        if ($total == 6){
                                            echo "<option value=\"aantalMensen\">1</option>";
                                            echo "<option value=\"aantalMensen\">2</option>";
                                            echo "<option value=\"aantalMensen\">3</option>";
                                            echo "<option value=\"aantalMensen\">4</option>";
                                            echo "<option value=\"aantalMensen\">5</option>";
                                            echo "<option value=\"aantalMensen\">6</option>";
                                        }
                                    }
                                }
                            ?>
                        </select>
                        <input type="submit" class="form-control" name="submit" value="Reserveer">
                    </div>


                </div>
                <div class="col-md-5">
                    <label for="lName">Achternaam:</label>
                    <input type="text" class="form-control" id="lName" name="lName" value="Doe">

                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="0614322591">

                    <label for="postcode">Postcode:</label><br>
                    <input type="text" class="form-control" id="postcode" name="postcode" value="1234 AB">

                    <label for="land">Land:</label>
                    <input type="text" class="form-control" id="land" name="land" value="Belgie">

                    <div class="form-row">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="ontbijt" name="ontbijt" value="1">
                            <label class="custom-control-label" for="ontbijt">Ontbijt</label<br>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="2nachten" name="nachten" value="2nachten">
                            <label class="custom-control-label" for="2nachten">2 nachten</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="5nachten" name="nachten" value="5nachten">
                            <label class="custom-control-label" for="5nachten">5 nachten</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="7nachten" name="nachten" value="7nachten">
                            <label class="custom-control-label" for="7nachten">7 nachten</label>
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="sDate">Begin datum: (voegt automatisch geselecteerd aantal nachten toe)</label>
                        <input type="date" class="form-control" id="sDate" name="sDate" >
                        <?php
                            $sql = "SELECT * FROM huizen where huisId=$id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $total = $row['aantalMensen'];
                                    if($total == 2){
                                        echo "<label for=\"extraPersoon1\">Naam 1ste huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon1\" name=\"extraPersoon1\" value=\"extraPersoon1\">";
                                    }
                                    if($total == 4){
                                        echo "<label for=\"extraPersoon1\">Naam 1ste huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon1\" name=\"extraPersoon1\" value=\"extraPersoon1\">";
                                        echo "<label for=\"extraPersoon2\">Naam 2de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon2\" name=\"extraPersoon2\" value=\"extraPersoon2\">";
                                        echo "<label for=\"extraPersoon3\">Naam 3de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon3\" name=\"extraPersoon3\" value=\"extraPersoon3\">";
                                    }
                                    if($total == 6){
                                        echo "<label for=\"extraPersoon1\">Naam 1ste huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon1\" name=\"extraPersoon1\" value=\"extraPersoon1\">";
                                        echo "<label for=\"extraPersoon2\">Naam 2de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon2\" name=\"extraPersoon2\" value=\"extraPersoon2\">";
                                        echo "<label for=\"extraPersoon3\">Naam 3de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon3\" name=\"extraPersoon3\" value=\"extraPersoon3\">";
                                        echo "<label for=\"extraPersoon4\">Naam 4de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon4\" name=\"extraPersoon4\" value=\"extraPersoon4\">";
                                        echo "<label for=\"extraPersoon5\">Naam 5de huisgenoot:</label>";
                                        echo "<input type=\"text\" class=\"form-control\" id=\"extraPersoon5\" name=\"extraPersoon5\" value=\"extraPersoon5\">";
                                    }

                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

                <script>
                    function overschrijvenInput() {
                        if (document.getElementById('overschrijven').checked) {
                            document.getElementById('bankRekeningNummer').style.visibility = 'visible';
                        }
                        else document.getElementById('bankRekeningNummer').style.visibility = 'hidden';
                    }
                </script>
            </div>
        </form>
    </div>

    <?php
        include "includes\\reserveringsForm.php";

    ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>