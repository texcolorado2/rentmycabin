<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 10/06/2020
 * Time: 14:15
 */
session_start();
session_destroy();
unset($_SESSION['isLoggedIn']);
header('location:index.php');
?>