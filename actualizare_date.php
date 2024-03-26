<?php
// Codul pentru conectarea la baza de date trebuie inclus aici
include_once 'header.php';
include 'p_con.php';
// Preia datele din formular
$utilizatorID = $_POST['UtilizatorID'];
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$email = $_POST['email'];
$parola = $_POST['parola']; // Nu este cea mai sigură metodă - trebuie să folosești tehnici de hashing pentru parole!
$domiciliu = $_POST['domiciliu'];

// Actualizare date în baza de date
$sql = "UPDATE utilizatori SET Nume='$nume', Prenume='$prenume', Email='$email', Parola='$parola', Domiciliu='$domiciliu' WHERE UtilizatorID=$utilizatorID";

if ($conn->query($sql) === TRUE) {
    echo "Date actualizate cu succes!";
    $_SESSION["Nume"]= $nume . $prenume;
} else {
    echo "Eroare la actualizare: " . $conn->error;
}
