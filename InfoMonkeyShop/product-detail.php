<?php
// Assicurati di gestire errori e sanitizzare i dati in ingresso
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID prodotto non fornito.");
}

// Recupera l'ID del prodotto dalla query string
$id_prodotto = $_GET['id'];

// Leggi il contenuto del file JSON
$json = file_get_contents('prodotti.json');

// Verifica se il file JSON è stato letto correttamente
if ($json === false) {
    die("Errore durante la lettura del file JSON.");
}

// Decodifica il contenuto JSON in un array PHP
$prodotti = json_decode($json, true);

// Verifica se il JSON è stato decodificato correttamente
if ($prodotti === null) {
    die("Errore nella decodifica del JSON: " . json_last_error_msg());
}

// Trova il prodotto con l'ID fornito
$prodotto_trovato = null;
foreach ($prodotti as $prodotto) {
    if ($prodotto['id'] == $id_prodotto) {
        $prodotto_trovato = $prodotto;
        break;
    }
}

if ($prodotto_trovato === null) {
    die("Prodotto non trovato.");
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli del Prodotto</title>
    <link rel="stylesheet" href="Prodotto.css">
</head>
<body>
  <header>
      <nav>
          <div class="logo">
              <img src="Scritta ML.png" alt="Logo" class="logo-image">
          </div>
          <ul class="nav-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Categorie</a></li>
              <li><a href="#">Offerte</a></li>
              <li><a href="#">Chi siamo</a></li>
              <li><a href="#">Contatti</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Supporto</a></li>
          </ul>
          <div class="nav-right">
              <div class="search-bar">
                  <input type="text" placeholder="Cerca...">
              </div>
              <div class="account-link">
                  <a href="Utente.html">Account</a>
              </div>
          </div>
      </nav>
  </header>
    <main>
        <section class="product-detail">
            <div class="product-images">
                <img src="<?php echo htmlspecialchars($prodotto_trovato['immagine']); ?>" alt="<?php echo htmlspecialchars($prodotto_trovato['nome']); ?>">
                <div class="thumbnails">
                    <!-- Aggiungi miniatura del prodotto se disponibili -->
                    <!-- Esempio statico, personalizza se necessario -->
                    <img src="product-thumb1.jpg" alt="Thumb 1">
                    <img src="product-thumb2.jpg" alt="Thumb 2">
                    <img src="product-thumb3.jpg" alt="Thumb 3">
                </div>
            </div>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($prodotto_trovato['nome']); ?></h1>
                <p class="price">€<?php echo htmlspecialchars($prodotto_trovato['prezzo']); ?></p>
                <p class="description"><?php echo htmlspecialchars($prodotto_trovato['descrizione']); ?></p>
                <div class="options">
                    <label for="size">Taglia:</label>
                    <select id="size" name="size">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                    </select>
                </div>
                <button class="add-to-cart">Aggiungi al Carrello</button>
            </div>
        </section>
        <section class="reviews">
            <h2>Recensioni dei clienti</h2>
            <!-- Aggiungi recensioni dinamiche se disponibili -->
            <div class="review-item">
                <p><strong>Cliente 1</strong></p>
                <p>"Ottimo prodotto, consegna veloce."</p>
            </div>
            <div class="review-item">
                <p><strong>Cliente 2</strong></p>
                <p>"Qualità eccellente, molto soddisfatto."</p>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Informazioni</h3>
                <p>Sito Shop Online - Via Roma 123, 00100 Roma (RM)</p>
                <p><strong>Email:</strong> info@sitoshoponline.it</p>
                <p><strong>Telefono:</strong> +39 0123 456789</p>
            </div>
            <div class="footer-section">
                <h3>Links Utili</h3>
                <ul>
                    <li><a href="#">Termini e condizioni</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Spedizioni</a></li>
                    <li><a href="#">Resi</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Seguici</h3>
                <div class="social-media">
                    <a href="#">Facebook</a>
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Sito Shop Online. Tutti i diritti riservati.</p>
        </div>
    </footer>
</body>
</html>
