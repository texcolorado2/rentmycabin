<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 09/06/2020
 * Time: 15:42
 */
session_start();
include "includes/sql.php";

if(isset($_POST['myLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "fill in a valid email";
    }else{
        if(isset($username)  && isset($password) && isset($email)){

            $password = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO inloggegevens (gebruikersnaam, wachtwoord, email) VALUES ('$username ','$password','$email')";

            if ($conn->query($sql) === TRUE) {
                echo "login created";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}else{
    echo "fill in the required fields indicated with a *";
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <legend>sign-up Form</legend>
    <fieldset>
        <label>*Username</label><br>
        <input type="text" name="username" placeholder="username"/><br>
        <label>*Password</label><br>
        <input type="password" name="password" placeholder="password"/><br>
        <label>*e-mail</label><br>
        <input type="text" name="email" placeholder="e-mail"/><br>
        <input type="submit" name="myLogin" value="Sign up!" />
    </fieldset>
</form>