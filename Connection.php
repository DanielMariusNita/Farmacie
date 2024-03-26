<?php
$serverName = "%";
$dBUsername = "sa";
$dBPassword = "proiect@BD";
$dbName = "Farmacie";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dbName);
if(!$conn)
    die("Connection failed: ". mysqli_connect_error());
?>