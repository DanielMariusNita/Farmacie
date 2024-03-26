<?php
include_once 'header.php';
include 'p_con.php';
echo '<h2>1. Numar Bucăți Vândute Pentru fiecare Categorie</h2>';
// Construiește query-ul
$query = "SELECT m.Categorie, SUM(mc.NumarBucati) AS TotalBucatiVandute
          FROM medicamente m
          JOIN medicamentecomenzi mc ON m.MedicamentID = mc.MedicamentID
          JOIN comenzi co ON mc.ComandaID = co.ComandaID
          GROUP BY m.Categorie";

// Execută query-ul
$result = mysqli_query($conn, $query);

// Verifică dacă există rezultate
if ($result) {
    // Afisează rezultatele sub forma de tabel HTML
    echo "<table border='1'>
            <tr>
                <th>Categorie</th>
                <th>Total Bucăți Vandute</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['Categorie']}</td>
                <td>{$row['TotalBucatiVandute']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

echo '<h2>2. Utilizatori cu Mai Multe Liste Favorite și Numărul de Medicamente în Fiecare Listă</h2>';

// Construiește query-ul pentru al doilea query
$query2 = "SELECT u.Nume, u.Prenume, lf.NumeLista, COUNT(mf.MedicamentID) AS NumMedicinesInList
           FROM utilizatori u
           JOIN listefavorite lf ON u.UtilizatorID = lf.UtilizatorID
           LEFT JOIN medicamentefavorite mf ON lf.ListaID = mf.ListaID
           GROUP BY u.UtilizatorID, lf.ListaID
           HAVING COUNT(lf.ListaID) > 1";

// Execută query-ul pentru al doilea query
$result2 = mysqli_query($conn, $query2);

// Verifică dacă există rezultate
if ($result2) {
    // Afisează rezultatele sub forma de tabel HTML
    echo "<table border='1'>
            <tr>
                <th>Nume Utilizator</th>
                <th>Prenume Utilizator</th>
                <th>Nume Lista Favorite</th>
                <th>Număr Medicamente în Listă</th>
            </tr>";

    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo "<tr>
                <td>{$row2['Nume']}</td>
                <td>{$row2['Prenume']}</td>
                <td>{$row2['NumeLista']}</td>
                <td>{$row2['NumMedicinesInList']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

// Nu este necesar să închideți conexiunea aici, deoarece aceasta va fi închisă automat la sfârșitul scriptului.
?>


<?php
include 'p_con.php';

echo '<h2>3. Cele Mai Bine Vândute 2 Produse Aflate la Reducere</h2>';

// Construiește query-ul pentru al treilea query
$query3 = "SELECT m.Denumire, m.Pret, p.ProcentReducere,
                 m.Pret - (m.Pret * p.ProcentReducere / 100) AS PretRedus,
                 COALESCE(SUM(mc.NumarBucati), 0) AS TotalBucatiVandute
          FROM medicamente m
          JOIN promotii p ON m.PromotieID = p.PromotieID
          LEFT JOIN medicamentecomenzi mc ON m.MedicamentID = mc.MedicamentID
          LEFT JOIN recenzii r ON m.MedicamentID = r.MedicamentID
          GROUP BY m.MedicamentID
          ORDER BY TotalBucatiVandute DESC
          LIMIT 2";

// Execută query-ul pentru al treilea query
$result3 = mysqli_query($conn, $query3);

// Verifică dacă există rezultate
if ($result3) {
    // Afisează rezultatele sub forma de tabel HTML
    echo "<table border='1'>
            <tr>
                <th>Denumire</th>
                <th>Pret</th>
                <th>Procent Reducere</th>
                <th>Pret Redus</th>
                <th>Total Bucăți Vandute</th>
            </tr>";

    while ($row3 = mysqli_fetch_assoc($result3)) {
        echo "<tr>
                <td>{$row3['Denumire']}</td>
                <td>{$row3['Pret']}</td>
                <td>{$row3['ProcentReducere']}</td>
                <td>{$row3['PretRedus']}</td>
                <td>{$row3['TotalBucatiVandute']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

// Nu este necesar să închideți conexiunea aici, deoarece aceasta va fi închisă automat la sfârșitul scriptului.




// Construiește query-ul
$query4 = "SELECT u.Nume, u.Prenume, COUNT(mc.MedicamentID) AS NumarProduseComandate
          FROM utilizatori u
          JOIN listefavorite lf ON u.UtilizatorID = lf.UtilizatorID
          JOIN medicamentefavorite mf ON lf.ListaID = mf.ListaID
          JOIN medicamentecomenzi mc ON mf.MedicamentID = mc.MedicamentID
          GROUP BY u.UtilizatorID, u.Nume, u.Prenume";

// Execută query-ul
$result4 = mysqli_query($conn, $query4);

// Verifică dacă există rezultate
if ($result4) {
    // Afisează rezultatele sub forma de tabel HTML
    echo "<h2>4. Numărul de Produse Comandate din Medicamentele Favorite ale Fiecarui Utilizator</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Număr Produse Comandate</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result4)) {
        echo "<tr>
                <td>{$row['Nume']}</td>
                <td>{$row['Prenume']}</td>
                <td>{$row['NumarProduseComandate']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Eroare la interogare: " . mysqli_error($conn);
}

// Nu este necesar să închideți conexiunea aici, deoarece aceasta va fi închisă automat la sfârșitul scriptului.


if (isset($_GET['serie']) && isset($_GET['numar'])) {
    $serieFactura = $_GET['serie'];
    $numarFactura = $_GET['numar'];

    // Construiește query-ul
    $query5 = "SELECT m.Denumire, m.Categorie, m.Forma, m.Pret
              FROM medicamente m
              JOIN medicamentecomenzi mc ON m.MedicamentID = mc.MedicamentID
              JOIN comenzi c ON c.ComandaID = mc.ComandaID
              JOIN facturi f ON f.ComandaID = c.ComandaID
              WHERE f.Serie = ? AND f.Numar = ?
              GROUP BY m.Denumire";
              $stmt = mysqli_prepare($conn, $query5);

              // Verifică dacă declarația a fost pregătită corect
              if ($stmt) {
                  // Leagă parametrii
                  mysqli_stmt_bind_param($stmt, "si", $serieFactura, $numarFactura);
          
                  // Execută query-ul
                  mysqli_stmt_execute($stmt);
          
                  // Obține rezultatele
                  $result = mysqli_stmt_get_result($stmt);
          
                  // Verifică dacă există rezultate
                  if ($result) {
                      // Afisează rezultatele sub forma de tabel HTML
                      echo "<h2>5. Medicamente din Comanda cu Seria $serieFactura și Numărul $numarFactura</h2>";
                      echo "<table border='1'>
                              <tr>
                                  <th>Denumire</th>
                                  <th>Categorie</th>
                                  <th>Forma</th>
                                  <th>Pret</th>
                              </tr>";
          
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<tr>
                                  <td>{$row['Denumire']}</td>
                                  <td>{$row['Categorie']}</td>
                                  <td>{$row['Forma']}</td>
                                  <td>{$row['Pret']}</td>
                                </tr>";
                      }
          
                      echo "</table>";
                  } else {
                      echo "Eroare la obținerea rezultatelor: " . mysqli_error($conn);
                  }
          
                  // Eliberează rezultatele
                  mysqli_stmt_close($stmt);
              } else {
                  echo "Eroare la pregătirea declarației: " . mysqli_error($conn);
              }
          } else {
              echo "<h2>5. Seria și numărul facturii nu au fost specificate.</h2>";
          
}
?>
