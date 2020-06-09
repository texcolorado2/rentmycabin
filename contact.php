<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 28/05/2020
 * Time: 09:39
 */
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
    include "includes\sql.php";
    include "includes\header.php";
    ?>
</head>
<body>
<form action="#" method="post" id="form">
    <label>voornaam: </label><br>
    <input type="text" name="firstname" class="form" placeholder="John"> </input><br>
    <label>achternaam: </label><br>
    <input type="text" name="lastname" class="form" placeholder="Doe"> </input><br>
    <label>email address: </label><br>
    <input type="email" name="email" class="form" placeholder="john.doe@hotmail.com">  </input><br>
    <label>telefoonnummer: </label><br>
    <input type="text" name="tel" class="form" placeholder="0614322591">  </input><br>
    <label>message: </label><br>
    <input type="text" name="message" class="form" placeholder="php is awesome">  </input><br>
    <input type="submit" name="submit" value="send"> </input>
    <input type="reset" value="reset"> </input>

    <?php
    if (isset($_POST["submit"])) {
        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['message']) || isset($_POST['tel'])) {
            $voornaam = trim($_POST['firstname']);
            $achternaam = trim($_POST['lastname']);
            $email = $_POST['email'];
            $bericht = $_POST['message'];
            $tel = $_POST['tel'];

            $contactSQL = "INSERT INTO contact(voornaam,achternaam,email,bericht,telefoonnummer) VALUES ('$voornaam','$achternaam','$email','$bericht','$tel')";

            $conn->query($contactSQL);

            $naar = "test@localhost"; // mail waar naar verstuurt wordt
            $van = $_POST['email']; // mail waar vandaan komt
            $onderwerp = "Form submission"; //onderwerp
            $bericht =  $_POST['message']; //bericht

            $headers = "Van:" . $van; //niet zeker
            mail($naar,$onderwerp,$bericht,$headers);
        }
    }
    ?>
</form>


<?php include "includes\\footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
