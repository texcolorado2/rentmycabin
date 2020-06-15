<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 29/05/2020
 * Time: 11:31
 */
session_start();
require 'includes/sql.php';

include "includes/loginForm.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="login pagina">
    <meta name="keywords" content="vakantiehuis,ardennen,durbuy,vakantie">
    <meta name="author" content="Alexander Deelen">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>Rent My Cabin | Login</title>
    <?php
    include "includes\header.php";
    ?>


</head>
<body>
<div class="container text-align-center" id="formContainer">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
        <div class="form-row col-12 ">
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <label for="gebruikersnaam">Gebruikernaam:</label><br>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="John"><br>

                <label for="wachtwoord">Wachtwoord:</label><br>
                <input type="password" id="wachtwoord" name="wachtwoord" placeholder="password"><br><br>

                <input type="submit" name="submit" value="Login">
                <?php
                if (isset($_GET["error"]) && $_GET["error"] == 'Wronginput') {
                    echo "<label>Wrong Username or Password</label><br>";
                }
                if (isset($_GET["error"]) && $_GET["error"] == 'wrongpassword') {
                    echo "<label>Wrong Username or Password</label><br>";
                }
                if (isset($_GET["error"])&& $_GET["error"] == 'emptyfields1') {
                    echo "<label>Wrong Username or Password</label><br>";
                }
                ?>
            </div>
            <div class="col-md-5"></div>
        </div>
</form>
<?php
include "includes\\footer.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
