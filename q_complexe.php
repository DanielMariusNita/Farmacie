<?php
include_once 'header.php';
include 'p_con.php';
$query = "SELECT m.Categorie, m.Denumire, MAX(AverageRating) AS HighestAverageRating
          FROM medicamente m
          LEFT JOIN (
              SELECT MedicamentID, AVG(NumarStele) AS AverageRating
              FROM recenzii
              GROUP BY MedicamentID
          ) AS subquery ON m.MedicamentID = subquery.MedicamentID
          GROUP BY m.Categorie, m.Denumire";

// Execută query-ul
$result = mysqli_query($conn, $query);

// Verifică dacă există rezultate
if ($result) {
    // Afisează rezultatele sub forma de tabel HTML sau în alt mod dorit
    echo "<h2>1. Produsul cu Cel Mai Mare Rating per Categorie</h2>";
    echo "<table border='1'>
            <tr>
                <th>Categorie</th>
                <th>Denumire Produs</th>
                <th>Cel Mai Mare Rating Mediu</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Categorie']}</td>
                <td>{$row['Denumire']}</td>
                <td>{$row['HighestAverageRating']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

$query2 = "SELECT r.MedicamentID, u.Nume, u.Prenume, SUM(r.NumarStele) AS TotalStele
          FROM recenzii r
          JOIN utilizatori u ON r.UtilizatorID = u.UtilizatorID
          WHERE r.NumarStele = (SELECT MAX(NumarStele) FROM recenzii WHERE MedicamentID = r.MedicamentID)
          GROUP BY r.MedicamentID, u.UtilizatorID";

// Execută query-ul
$result2 = mysqli_query($conn, $query2);

// Verifică dacă există rezultate
if ($result2) {
    // Afisează rezultatele sub forma de tabel HTML sau în alt mod dorit
    echo "<h2>2. Utilizatori cu Cel Mai Mare Număr Total de Stele pentru Fiecare Medicament</h2>";
    echo "<table border='1'>
            <tr>
                <th>MedicamentID</th>
                <th>Nume Utilizator</th>
                <th>Prenume Utilizator</th>
                <th>Total Stele</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>
                <td>{$row['MedicamentID']}</td>
                <td>{$row['Nume']}</td>
                <td>{$row['Prenume']}</td>
                <td>{$row['TotalStele']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

$query3 = "SELECT f.FacturaID, c.UtilizatorID, c.DataComanda, m.Denumire AS MedicamentCumparat
FROM facturi f
JOIN comenzi c ON f.ComandaID = c.ComandaID
JOIN medicamentecomenzi mc ON c.ComandaID = mc.ComandaID
JOIN medicamente m ON mc.MedicamentID = m.MedicamentID
WHERE c.DataComanda >= NOW() - INTERVAL 1 YEAR
AND mc.MedicamentID = (
    SELECT MedicamentID
    FROM (
        SELECT MedicamentID, SUM(NumarBucati) AS TotalBucatiVandute
        FROM medicamentecomenzi
        GROUP BY MedicamentID
        ORDER BY TotalBucatiVandute DESC
        LIMIT 1
    ) AS subquery
)
ORDER BY c.DataComanda DESC;
";

// Execută query-ul
$result3 = mysqli_query($conn, $query3);

// Verifică dacă există rezultate
if ($result3) {
    // Afisează rezultatele sub forma de tabel HTML
    echo "<h2>3. Facturile pentru Produsul Cel Mai Cumpărat din Ultimul An</h2>";
    echo "<table border='1'>
            <tr>
                <th>FacturaID</th>
                <th>UtilizatorID</th>
                <th>Data Comenzii</th>
                <th>Medicament Cumpărat</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result3)) {
        echo "<tr>
                <td>{$row['FacturaID']}</td>
                <td>{$row['UtilizatorID']}</td>
                <td>{$row['DataComanda']}</td>
                <td>{$row['MedicamentCumparat']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}
