<?php
include_once 'header.php';
include 'p_con.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $medicamentID = $_GET['id'];

    // Obține datele produsului din baza de date
    $query = "SELECT * FROM `medicamente` WHERE `MedicamentID` = $medicamentID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <form action="actualizare_produs.php" method="post">
            <input type="hidden" id="medicamentID" name="medicamentID" value="<?php echo $row['MedicamentID']; ?>">

            <label for="denumire">Denumire:</label>
            <input type="text" id="denumire" name="denumire" value="<?php echo $row['Denumire']; ?>" required><br>

            <label for="imagine">Imagine:</label>
            <input type="text" id="imagine" name="imagine" value="<?php echo $row['Imagine']; ?>" required><br>

            <label for="categorie">Categorie:</label>
            <input type="text" id="categorie" name="categorie" value="<?php echo $row['Categorie']; ?>" required><br>

            <label for="forma">Forma:</label>
            <input type="text" id="forma" name="forma" value="<?php echo $row['Forma']; ?>" required><br>

            <label for="tip_administrare">Tip Administrare:</label>
            <input type="text" id="tip_administrare"name="tip_administrare" value="<?php echo $row['TipAdministrare']; ?>" required><br>

            <label for="tip_eliberare">Tip Eliberare:</label>
            <input type="text" id="tip_eliberare" name="tip_eliberare" value="<?php echo $row['TipEliberare']; ?>" required><br>

            <label for="pret">Pret:</label>
            <input type="text" id="pret" name="pret" value="<?php echo $row['Pret']; ?>" required><br>

            <label for="stoc">Stoc:</label>
            <input type="text" id="stoc" name="stoc" value="<?php echo $row['Stoc']; ?>" required><br>

            <label for="distribuitor">Distribuitor:</label>
            <input type="text" id="distribuitor" name="distribuitor" value="<?php echo $row['Distribuitor']; ?>" required><br>

            <label for="prospect">Prospect:</label>
            <textarea id="prospect" name="prospect" required><?php echo $row['Prospect']; ?></textarea><br>

            <label for="data_expirare">Data Expirare:</label>
            <input type="text" id="data_expirare" name="data_expirare" value="<?php echo $row['DataExpirare']; ?>" required><br>

            <input type="submit" id="submit" value="Actualizează">
        </form>
        <?php
    } else {
        echo "Eroare la interogare: " . mysqli_error($connection);
    }

    // Eliberează rezultatul interogării
    mysqli_free_result($result);

}
?>
