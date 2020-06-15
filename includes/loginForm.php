<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 11/06/2020
 * Time: 11:27
 */

if(isset($_POST['submit'])){

    //die("boooooo");
    // inputs
    $user = $_POST['gebruikersnaam'];
    $pass = $_POST['wachtwoord'];
    // checks of the input field are empty
    if (empty($user) || empty($pass)) {
        header("location: login.php?error=emptyfields1");
        if (isset($_GET["emptyfields1"])) {
            echo "Wrong Username / Password";
        }
        exit();
    } else {
        $sql = "SELECT * FROM inloggegevens WHERE gebruikersnaam=?;";
        $stmt = $conn->prepare($sql);
        //gives users input to the database
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //checks if there is a match
        $row = mysqli_fetch_assoc($result);
        $passwordcheck = password_verify($pass, $row['wachtwoord']);

        if ($passwordcheck == false) {
            header("Location: login.php?error=Wronginput");
            exit();
        } else if ($passwordcheck == true) {
            //zijn gegevens goed stuur dan naar adminpanel toe
            $_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];
            $_SESSION['medewerkerId'] = $row['medewerkerId'];
            $_SESSION['isLoggedIn'] = true;

            header("Location: adminPanel.php");
            exit();
        } else {
            header("Location: login.php?error=wrongpassword");
            if (isset($_GET["errorwrongpassword"])) {
                echo "Wrong Username / Password";
            }
            exit();
        }
    }
}

?>