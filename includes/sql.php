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

function select($tableValue,$tableName){
    $sql = "SELECT $tableValue FROM $tableName";
}

function insert($tableName, $columName,$values){
    $sql = "INSER INTO `" . $tableName . "` (" . $columName . ") VALUES (" . $values . ")";
}

function update(){

}

function delete(){

}

function query($sql){
    global $conn;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

