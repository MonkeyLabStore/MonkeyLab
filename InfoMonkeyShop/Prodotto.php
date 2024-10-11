<?php
// Verifica se l'ID del prodotto è passato nella query string
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID prodotto mancante.");
}

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

// Recupera l'ID del prodotto dalla query string
$id = $_GET['id'];

// Trova il prodotto con l'ID specificato
$prodottoTrovato = null;
foreach ($prodotti as $prodotto) {
    if (isset($prodotto['id']) && $prodotto['id'] === $id) {
        $prodottoTrovato = $prodotto;
        break;
    }
}

// Verifica se il prodotto è stato trovato
if ($prodottoTrovato === null) {
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .product-detail {
            display: flex;
            height: 100%;
            gap: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .product-images {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        #main-image {
            width: 100%;
            height: auto;
            max-width: 400px;
            max-height: 400px;
        }

        .product-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .product-thumbnails img {
            width: 80px;
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .product-thumbnails img:hover {
            border-color: #000;
        }

        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
        }

        h1 {
            font-size: 2em;
            margin: 0 0 20px 0;
        }

        .price {
            font-size: 1.5em;
            color: #555;
            margin-bottom: 20px;
        }

        .description {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 20px;
        }

        .add-to-cart {
            padding: 10px 20px;
            background-color: #f04e23;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }

        .add-to-cart img {
            width: 24px;
            vertical-align: middle;
            margin-right: 8px;
        }

        .product-info {
            overflow-y: auto;
        }
    </style>
</head>
<body>
  <header>
      <nav>
          <div class="logo">
              <img src="Scritta ML.png" alt="Logo" class="logo-image">
          </div>
          <ul class="nav-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Contatti</a></li>
              <li><a href="Blog.html">Blog</a></li>
              <li><a href="assistenza.html">Supporto</a></li>
          </ul>
          <div class="nav-right">
              <div class="account-link">
              </div>
          </div>
      </nav>
  </header>
  <main>
    <section class="product-detail">
        <div class="product-images">
            <!-- Mostra l'immagine principale se il prodotto è trovato -->
            <?php if ($prodottoTrovato): ?>
                <img id="main-image" src="<?php echo htmlspecialchars($prodottoTrovato['immagine']); ?>" alt="<?php echo htmlspecialchars($prodottoTrovato['nome']); ?>">

                <!-- Immagini più piccole (miniature) -->
                <div class="product-thumbnails">
                    <img class="thumbnail" src="<?php echo htmlspecialchars($prodottoTrovato['1immagine']); ?>" alt="<?php echo htmlspecialchars($prodottoTrovato['nome']); ?>">
                    <img class="thumbnail" src="<?php echo htmlspecialchars($prodottoTrovato['2immagine']); ?>" alt="<?php echo htmlspecialchars($prodottoTrovato['nome']); ?>">
                    <img class="thumbnail" src="<?php echo htmlspecialchars($prodottoTrovato['3immagine']); ?>" alt="<?php echo htmlspecialchars($prodottoTrovato['nome']); ?>">
                </div>
            <?php else: ?>
                <p>Prodotto non disponibile.</p>
            <?php endif; ?>
        </div>
        <div class="product-info">
            <!-- Mostra le informazioni del prodotto se trovato -->
            <?php if ($prodottoTrovato): ?>
                <h1 id="product-name"><?php echo htmlspecialchars($prodottoTrovato['nome']); ?></h1>
                <p id="product-price" class="price">€<?php echo htmlspecialchars($prodottoTrovato['prezzo']); ?></p>
                <p id="product-description" class="description"><?php echo htmlspecialchars($prodottoTrovato['descrizione']); ?></p>
                <button id="add-to-cart" class="add-to-cart">
                    <img src="Foto Prodotti/unnamed.png" alt="Logo Subito.it" class="subito-logo">
                    Subito.it
                </button>
            <?php endif; ?>
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

  <script>
      // Aggiungi un event listener per le immagini in miniatura
      const thumbnails = document.querySelectorAll('.thumbnail');
      const mainImage = document.getElementById('main-image');

      thumbnails.forEach((thumbnail) => {
          thumbnail.addEventListener('click', function() {
              // Cambia l'immagine principale con quella cliccata
              mainImage.src = this.src;
          });
      });

      // Event listener per il pulsante "Subito.it"
      const addToCartButton = document.getElementById('add-to-cart');

      addToCartButton.addEventListener('click', function() {
          // Prende l'URL dal JSON
          const productUrl = "<?php echo htmlspecialchars($prodottoTrovato['url']); ?>";

          // Apri il link in una nuova scheda
          window.open(productUrl, '_blank');
      });
  </script>
</body>
</html>
