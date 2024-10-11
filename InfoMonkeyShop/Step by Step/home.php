<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="Utente.css">
</head>
<body>
    <header>
        <!-- Inserisci qui il codice dell'intestazione -->
    </header>
    <main>
        <section class="user-account">
            <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Questa è la tua area personale.</p>
            <!-- Aggiungi qui ulteriori informazioni o opzioni per l'utente -->
        </section>
    </main>
    <footer>
        <!-- Inserisci qui il codice del footer -->
    </footer>
</body>
</html>
