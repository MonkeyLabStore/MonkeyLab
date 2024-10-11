<?php
include 'db_connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara e esegui la query
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verifica la password
    if (password_verify($password, $hashed_password)) {
        // Login riuscito, memorizza la sessione e reindirizza a utente.html
        $_SESSION['username'] = $username;
        header('Location: utente.html');
        exit();
    } else {
        echo "Nome utente o password non validi.";
    }

    $conn->close();
}
?>
