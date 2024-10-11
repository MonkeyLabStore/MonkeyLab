<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash della password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepara e esegui la query
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        // Registrazione completata, reindirizza a utente.html
        header('Location: utente.html');
        exit();
    } else {
        echo "Errore nella registrazione: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
