<?php

include_once 'header.php';
include 'p_con.php';

$medicamentID = $_POST["medicamentID"];
$denumire = $_POST["denumire"];
$imagine = $_POST["imagine"];
$categorie = $_POST["categorie"];
$forma=$_POST["forma"];
$tip_administrare=$_POST["tip_administrare"];
$tip_eliberare = $_POST["tip_eliberare"];
$pret = $_POST["pret"];
$stoc = $_POST["stoc"];
$distribuitor = $_POST["distribuitor"];
$prospect = $_POST["prospect"];
$data_expirare = $_POST["data_expirare"];
$query = "UPDATE `medicamente` SET
`Denumire` = '$denumire',
`Imagine` = '$imagine',
`Categorie` = '$categorie',
`Forma` = '$forma',
`TipAdministrare` = '$tip_administrare',
`TipEliberare` = '$tip_eliberare',
`Pret` = $pret,
`Stoc` = $stoc,
`Distribuitor` = '$distribuitor',
`Prospect` = '$prospect',
`DataExpirare` = '$data_expirare'
WHERE `MedicamentID` = $medicamentID";

// Execută interogarea și verifică rezultatul
$result = mysqli_query($conn, $query);

if ($result) {
echo "Produsul a fost actualizat cu succes.";
} else {
echo "Eroare la actualizarea produsului: " . mysqli_error($conn);
}