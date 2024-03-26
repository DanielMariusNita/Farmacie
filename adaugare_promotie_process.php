<?php
include_once 'header.php';
include 'p_con.php';


$data_start = $_POST["data_start"];
$data_terminare = $_POST["data_terminare"];
$procent_reducere = $_POST["procent_reducere"];

$query = "INSERT INTO `promotii` (`DataStart`, `DataTerminare`, `ProcentReducere`)
VALUES ('$data_start', '$data_terminare', $procent_reducere)";

// Execută interogarea și verifică rezultatul
$result = mysqli_query($conn, $query);

if ($result) {
echo "Promoția a fost adăugată cu succes.";
} else {
echo "Eroare la adăugarea promoției: " . mysqli_error($conn);
}
