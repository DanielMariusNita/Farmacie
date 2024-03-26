<?php

include_once 'header.php';
include 'p_con.php';

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

$query = "INSERT INTO `medicamente` (`Denumire`, `Imagine`, `Categorie`, `Forma`, `TipAdministrare`, `TipEliberare`, `Pret`, `Stoc`, `Distribuitor`, `Prospect`, `DataExpirare`)
              VALUES ('$denumire', '$imagine', '$categorie', '$forma', '$tip_administrare', '$tip_eliberare', $pret, $stoc, '$distribuitor', '$prospect', '$data_expirare')";

    // Execută interogarea și verifică rezultatul
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Produsul a fost adăugat cu succes.";
    } else {
        echo "Eroare la adăugarea produsului: " . mysqli_error($conn);
    }