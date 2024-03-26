<?php
include_once 'header.php';
include 'p_con.php';
?>
<h1>Formular Adaugare Promoție</h1>

<!-- Formular pentru adăugarea promoției -->
<form action="adaugare_promotie_process.php" method="post">
    <label for="data_start">Data Start:</label>
    <input type="text" name="data_start" required>

    <label for="data_terminare">Data Terminare:</label>
    <input type="text" name="data_terminare" required>

    <label for="procent_reducere">Procent Reducere:</label>
    <input type="text" name="procent_reducere" required>

    <button type="submit">Adaugă Promoție</button>
</form>