<?php
include_once 'header.php';
include 'p_con.php';
?>
<h1>Formular Adaugare Medicament</h1>
<form action="adaugare_medicament_process.php" method="post">
            <label for="denumire">Denumire:</label>
            <input type="text" id="denumire" name="denumire" required><br>

            <label for="imagine">Imagine:</label>
            <input type="text" id="imagine" name="imagine" required><br>

            <label for="categorie">Categorie:</label>
            <input type="text" id="categorie" name="categorie" required><br>

            <label for="forma">Forma:</label>
            <input type="text" id="forma" name="forma" required><br>

            <label for="tip_administrare">Tip Administrare:</label>
            <input type="text" id="tip_administrare"name="tip_administrare" required><br>

            <label for="tip_eliberare">Tip Eliberare:</label>
            <input type="text" id="tip_eliberare" name="tip_eliberare" required><br>

            <label for="pret">Pret:</label>
            <input type="text" id="pret" name="pret" required><br>

            <label for="stoc">Stoc:</label>
            <input type="text" id="stoc" name="stoc" required><br>

            <label for="distribuitor">Distribuitor:</label>
            <input type="text" id="distribuitor" name="distribuitor" required><br>

            <label for="prospect">Prospect:</label>
            <textarea id="prospect" name="prospect" required></textarea><br>

            <label for="data_expirare">Data Expirare:</label>
            <input type="text" id="data_expirare" name="data_expirare" required><br>

            <input type="submit" id="submit" value="Adauga Medicament">
        </form>