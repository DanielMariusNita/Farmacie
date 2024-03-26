<?php
// Codul pentru conectarea la baza de date trebuie inclus aici
include_once 'header.php';
include 'p_con.php';

if (!isset($_SESSION['UtilizatorID'])) {
    // Redirecționează către pagina de autentificare sau afișează un mesaj de eroare
    exit("Trebuie să fii autentificat pentru a accesa această pagină.");
}

$utilizatorID = $_SESSION['UtilizatorID'];

// Obține datele utilizatorului din baza de date
$sql = "SELECT * FROM utilizatori WHERE UtilizatorID = $utilizatorID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Afiseaza formularul pentru editarea datelor
    echo "<form method='post' action='actualizare_date.php'>";
    echo "<input type='hidden' name='UtilizatorID' value='" . $row['UtilizatorID'] . "'>";
    echo "<label for='nume'>Nume:</label><br>";
    echo "<input type='text' id='nume' name='nume' value='" . $row['Nume'] . "'><br>";
    echo "<label for='prenume'>Prenume:</label><br>";
    echo "<input type='text' id='prenume' name='prenume' value='" . $row['Prenume'] . "'><br>";
    echo "<label for='email'>Email:</label><br>";
    echo "<input type='email' id='email' name='email' value='" . $row['Email'] . "'><br>";
    echo "<label for='parola'>Parola:</label><br>";
    echo "<input type='password' id='parola' name='parola' value='" . $row['Parola'] . "'><br>";
    echo "<label for='domiciliu'>Domiciliu:</label><br>";
    echo "<input type='text' id='domiciliu' name='domiciliu' value='" . $row['Domiciliu'] . "'><br>";
    echo "<input type='submit' value='Actualizează'>";
    echo "</form>";
}
?>
