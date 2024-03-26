<?php
include_once 'header.php';
include 'p_con.php';
$medicamentID = $_GET['id']; // Sanitize and validate this value before using it in a database query
// Use $medicamentID in your database query to fetch and display the specific product details
echo $medicamentID;

    // Interogare pentru a prelua detaliile produsului
    $query = "SELECT * FROM medicamente WHERE MedicamentID = ". $medicamentID . ";";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Afișare detaliilor produsului
        while ($row = $result->fetch_assoc()) {
            echo "<center>";
            echo '<h2>' . $row["Denumire"] . '</h2>';
            if (isset($_SESSION["Rol"])) {
                if ($_SESSION["Rol"] == "Admin" || $_SESSION["Rol"] == "Manager") {
            echo '<a href="modifica_produs.php?id='. $row["MedicamentID"].'" class="btn btn-warning ml-2">Modifica</a><br>';
                }}
            echo "<img src='" . $row["Imagine"] . "' alt='" . $row["Denumire"] . "' style='width: 200px; height: auto;'><br>";
            echo "<p>Categorie: " . $row["Categorie"] . "</p>";
            echo "<p>Forma: " . $row["Forma"] . "</p>";
            echo "<p>Tip Administrare: " . $row["TipAdministrare"] . "</p>";
            echo "<p>Tip Eliberare: " . $row["TipEliberare"] . "</p>";
            echo "<p>Pret: " . $row["Pret"] . " lei</p>";
            echo "<p>Stoc disponibil: " . $row["Stoc"] . "</p>";
            echo "<p>Distribuitor: " . $row["Distribuitor"] . "</p>";
            echo "<p>Data Expirare: " . $row["DataExpirare"] . "</p>";
            echo "<p>Prospect: <a href='" . $row["Prospect"] . "' target='_blank'>Link</a></p>";
        }

        // Afisare recenzii
        echo "<h3>Recenzii:</h3>";
        $sql_recenzii = "SELECT recenzii.NumarStele, recenzii.Comentariu, utilizatori.Nume, utilizatori.Prenume
                         FROM recenzii
                         INNER JOIN utilizatori ON recenzii.UtilizatorID = utilizatori.UtilizatorID
                         WHERE recenzii.MedicamentID = $medicamentID";
        $result_recenzii = $conn->query($sql_recenzii);

        if ($result_recenzii->num_rows > 0) {
            while ($row_recenzie = $result_recenzii->fetch_assoc()) {
                echo "<p><strong>" . $row_recenzie["Nume"] . " " . $row_recenzie["Prenume"] . "</strong> - ";
                echo "Rating: " . $row_recenzie["NumarStele"] . "/5 - ";
                echo "Comentariu: " . $row_recenzie["Comentariu"] . "</p>";

            }
        }
    }
    echo "</center>";