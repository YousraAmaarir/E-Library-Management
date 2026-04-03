<?php
$conn = mysqli_connect(
"localhost", 
"root", 
"", 
"db_ista_library"
);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>