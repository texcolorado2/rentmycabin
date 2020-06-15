<?php
if(isset($_POST['logout'])) {

}
?>
<div class=".container-fluid" id="header">
    <div class="row">
        <div class="col-4">
            <a href="index.php"><img src="images\logo.png" class="img-fluid" alt="..." width="84" height="104"></a>
        </div>
        <div class="col-4" >
            <h1>Rent My Cabin</h1>
            <nav class="navbar navbar-expand-lg navbar-light ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
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
                                <a id="navAdminPanel" class="nav-link" href="adminPanel.php" >Admin panel</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="logout.php" name="logout" value="logout">logout</a>
                            </li>
                        </ul>
                        <?php
                    }
                    else{
                        ?>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a id="navHome" class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a id="navReserveren" class="nav-link" href="reserveren.php">Reserveren </a>
                            </li>
                            <li class="nav-item active">
                                <a id="navGalerij" class="nav-link" href="galerij.php">Galerij</a>
                            </li>
                            <li class="nav-item active">
                                <a id="navContact" class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item active">
                                <a id="navLogin" class="nav-link" href="login.php" >Login</a>
                            </li>
                        </ul>
                        <?php
                    }
                    //check welke pagina het is en maak de nav knop blauw
                    if(basename($_SERVER['PHP_SELF']) == 'index.php') {
                        ?>
                        <style>
                            #navHome {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }
                    if(basename($_SERVER['PHP_SELF']) == 'reserveren.php') {
                        ?>
                        <style>
                            #navReserveren {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }

                    if(basename($_SERVER['PHP_SELF']) == 'galerij.php') {
                        ?>
                        <style>
                            #navGalerij {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }
                    if(basename($_SERVER['PHP_SELF']) == 'reserveringPagina.php') {
                        ?>
                        <style>
                            #navReserveren {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }
                    if(basename($_SERVER['PHP_SELF']) == 'detail.php') {
                        ?>
                        <style>
                            #navReserveren {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }
                    if(basename($_SERVER['PHP_SELF']) == 'contact.php') {
                        ?>
                        <style>
                            #navContact {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }
                    if(basename($_SERVER['PHP_SELF']) == 'login.php') {
                        ?>
                        <style>
                            #navLogin {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }

                    if(basename($_SERVER['PHP_SELF']) == 'adminPanel.php') {
                        ?>
                        <style>
                            #navAdminPanel {
                                background-color: blue;
                            }
                        </style>
                        <?php
                    }

                    ?>
                </div>
            </nav>
        </div>
    </div>
</div>