<?php
if(isset($_POST['myLogout']))
{
    // gebruiker is uitgelogd
    // vernietig de sessie
    session_destroy();
    // herlaad het script
    unset($_SESSION['isLoggedIn']);
}
?>
<div class=".container-fluid" id="header">
    <div class="row">
        <div class="col-1">
            <a href="index.php"><img src="images\logo.png" class="card-img" alt="..." width="50" height="50"></a>
        </div>
        <div class="col" >
            <h1>Rent My Cabin</h1>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col" >
            <nav class="navbar navbar-expand-lg navbar-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <?php
                if($_SESSION['isLoggedIn'] == true)
                {
                    ?>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="reserveren.php">Reserveren </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="galerij.php">Galerij</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="adminPanel.php" >Admin panel</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php" name="myLogout">logout</a>
                        </li>
                    </ul>
                    <?php
                }
                else{
                    ?>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="reserveren.php">Reserveren </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="galerij.php">Galerij</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php" >Login</a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                </div>
            </nav>
        </div>
    </div>
</div>