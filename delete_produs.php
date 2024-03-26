<?php
include_once 'header.php';
include 'p_con.php';
?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $medicamentID = $_GET['id'];
    echo $medicamentID;
    $query = "DELETE FROM medicamente WHERE MedicamentID = ". $medicamentID . ";";
    if ($conn->query($query) === TRUE) {
        header("location: shop.php?error=none");
      } else {
        header("location: shop.php?error=deletefailed");
        echo $conn->error;
      }

} else {
    // gestionare eroare sau redirecționare către altă pagină
    header("location: shop.php?error=invalid_id");
    exit(); // asigură că scriptul se oprește aici
}
