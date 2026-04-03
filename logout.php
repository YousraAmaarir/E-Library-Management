<?php
session_start();
session_destroy(); // Kat-msah l'session dyalk
header("Location: index.php"); // Kat-rjj3ek l'accueil
exit();
?>