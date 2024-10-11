<?php
$servername = "localhost";
$username = "root"; // Nome utente di XAMPP per MySQL
$password = ""; // Password di XAMPP per MySQL
$dbname = "user_db";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
