<?php
include_once 'header.php';
include 'p_con.php';
?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userID = $_GET['id'];
    $query = "DELETE FROM utilizatori WHERE UtilizatorID = ". $userID . ";";
    if ($conn->query($query) === TRUE) {
        session_unset();
        session_destroy();
        header("location: index.php?error=none");
        echo 'Cont șters cu succes!';
      } else {
        header("location: index.php?error=deletefailed");
        echo $conn->error;
      }

} else {
    // gestionare eroare sau redirecționare către altă pagină
    header("location: index.php?error=invalid_id");
    exit(); // asigură că scriptul se oprește aici
}
   
