<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 02/06/2020
 * Time: 11:40
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentmycabin";

// Create connection
$conn = new mysqli($servername,$username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

