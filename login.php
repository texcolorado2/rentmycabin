<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 29/05/2020
 * Time: 11:31
 */
session_start();
require 'includes/sql.php';

if(isset($_POST['submit'])){

    //die("boooooo");
    // inputs
    $user = $_POST['gebruikersnaam'];
    $pass = $_POST['wachtwoord'];
    // checks of the input field are empty
    if (empty($user) || empty($pass)) {
        header("location: index.php?error=emptyfields1");
        exit();
    } else {
        $sql = "SELECT * FROM inloggegevens WHERE ggebruikersnaam=?;";
        $stmt = $conn->prepare($sql);
        //gives users input to the database
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //checks if there is a match
        $row = mysqli_fetch_assoc($result);
        $passwordcheck = password_verify($pass, $row['wachtwoord']);

        if ($passwordcheck == false) {
            header("Location: index.php?error=Wronginput");
            exit();
        } else if ($passwordcheck == true) {
            $_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];
            $_SESSION['medewerkerId'] = $row['medewerkerId'];
            $_SESSION['isLoggedIn'] = true;

           // var_dump($_SESSION);
         //   die("I wanna die!");
            header("Location: index.php");
            exit();
        } else {
            header("Location: index.php?errorwrongpassword");
            exit();
        }
    }
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

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
        <label for="gebruikersnaam">Gebruikernaam:</label><br>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" value="John"><br>

        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="password" id="wachtwoord" name="wachtwoord" value=""><br><br>

        <input type="submit" name="submit" value="Login">
    </form>
</head>
<body>


<?php




include "includes\\footer.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
