<?php
include_once 'header.php';
include 'p_con.php';
?>

<div class="container">
<!-- Buton pentru deschiderea paginii cu formularul -->
    <button onclick="openForm()">Adaugă Promoție</button>

<!-- Script JavaScript pentru a deschide pagina cu formularul -->
<script>
    function openForm() {
        window.location.href = 'adaugare_promotie.php';
    }
</script>
<!-- Buton pentru deschiderea paginii cu formularul -->
<button onclick="openForm()">Adaugă Medicament</button>

<!-- Script JavaScript pentru a deschide pagina cu formularul -->
<script>
    function openForm() {
        window.location.href = 'adaugare_medicament.php';
    }
</script>
<h2>Selectați Comanda</h2>

    <form action="q_simple.php" method="GET">
        <label for="serie">Serie Factură:</label>
        <input type="text" id="serie" name="serie" required>
        <br>

        <label for="numar">Număr Factură:</label>
        <input type="number" id="numar" name="numar" required>
        <br>

        <button type="submit">Afișează Medicamente</button>
    </form>
