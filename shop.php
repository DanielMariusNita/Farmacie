<?php
include_once 'header.php';
include 'p_con.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Medicamente</title>
    <style>
        .medicament {
            display: inline-block;
            width: 30%;
            margin: 1%;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .medicament img {
            width: 80%;
            max-height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Medicamente</h1>
        <form action="shop.php" method="POST" class="search-form">
            <input type="text" id="cautare" name="cautare" class="search-input" placeholder="Caută...">
            <button type="submit" id="submit" name="submit" class="search-btn"><span class="icon-search"></span></button>
        </form>
        <?php
        $is_search = 0;
        if (isset($_POST["submit"])) {
            //Grabbing the data

            $cautare = $_POST["cautare"];
            $is_search=1;
        } ?>
        <?php
        if($is_search==0){
        // Interogare pentru a prelua datele din tabela "medicamente"
        $query = "SELECT medicamentID, imagine, denumire, pret FROM medicamente";
        $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT medicamentID, imagine, denumire, pret FROM medicamente WHERE denumire LIKE '%" . $cautare . "%';";
            $result = mysqli_query($conn, $query);
        }
        ?>
        <div class="row">
            <?php
            // Afisare fiecarui medicament in grid
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="medicament">';
                echo '<img src="' . $row['imagine'] . '" alt="' . $row['denumire'] . '">';
                echo '<p>' . $row['denumire'] . '</p>';
                echo '<p>Pret: ' . $row['pret'] . ' RON</p>';
                echo '<a href="produs.php?id=' . $row['medicamentID'] . '" class="btn btn-primary"><span class="text">Vezi Produs</span></a>';
                if (isset($_SESSION["Rol"])) {
                    if ($_SESSION["Rol"] == "Admin" || $_SESSION["Rol"] == "Manager") {
                        echo '<a href="delete_produs.php?id= '. $row['medicamentID'] . '" class="btn btn-danger"><span class="text">Șterge</span></a>';
                    }
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>

</body>

</html>

<?php
// Eliberare rezultat
mysqli_free_result($result);

// Inchidere conexiune
mysqli_close($conn);
?>