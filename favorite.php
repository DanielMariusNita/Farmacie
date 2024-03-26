<?php

include_once 'header.php';
include 'p_con.php';
$utilizatorID = $_SESSION["UtilizatorID"];

$sql = "SELECT lf.NumeLista, m.Denumire, m.Imagine, m.Categorie, m.Forma, m.TipAdministrare, m.TipEliberare, m.Pret, m.Stoc, m.Distribuitor, m.Prospect, m.DataExpirare
        FROM listefavorite lf
        JOIN medicamentefavorite mf ON lf.ListaID = mf.ListaID
        JOIN medicamente m ON mf.MedicamentID = m.MedicamentID
        WHERE lf.UtilizatorID = $utilizatorID";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<b>Nume Lista: </b>" . $row["NumeLista"] . "<br>";
        echo "<b>Denumire: </b>" . $row["Denumire"] . "<br>";
        echo "<b>Imagine: </b>" . $row["Imagine"] . "<br>";
        echo "<b>Categorie: </b>" . $row["Categorie"] . "<br>";
        echo "<b>Forma: </b>" . $row["Forma"] . "<br>";
        echo "<b>Administrare: </b>" . $row["TipAdministrare"] . "<br>";
        echo "<b>Tip_Eliberare: </b>" . $row["TipEliberare"] . "<br>";
        echo "<b>Pret: </b>" . $row["Pret"] . "<br>";
        echo "<b>Stoc: </b>" . $row["Stoc"] . "<br>";
        echo "<b>Distribuitor: </b>" . $row["Distribuitor"] . "<br>";
        echo "<b>Prospect: </b>" . $row["Prospect"] . "<br>";
        echo "<b>Data_Epirare: </b>" . $row["DataExpirare"] . "<br><br>";
    }
} else {
    echo "0 results";
}
