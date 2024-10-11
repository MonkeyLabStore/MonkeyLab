<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="index.js" defer></script>
    <script src="esplora.js" defer></script>
</head>
<body>
  <header>
      <nav>
          <div class="logo">
              <img src="Scritta ML.png" alt="Logo" class="logo-image">
          </div>
          <ul class="nav-links">
              <li><a href="index.php">Home</a></li>
              <li><a href="#offerte-speciali">Offerte</a></li>
              <li><a href="Istituzioni.html">Chi siamo</a></li>
              <li><a href="#footer">Contatti</a></li>
<!--              <li><a href="Blog.html">Blog</a></li>-->
              <li><a href="assistenza.html">Supporto</a></li>
          </ul>
          <div class="nav-right">
              <div class="search-bar">
                  <button onclick="redirectToPage('CatProd.php')">Esplora</button>
              </div>
              <div class="account-link">
<!--              <a href="Utente.html">Account</a>-->
              </div>
          </div>
      </nav>
  </header>
    <main>
        <section class="banner">
            <img src="MONKEY LAB Logo 1200-300.png" alt="Logo" class="logo-image">
        </section>

        <!-- Prodotti in evidenza -->
        <?php include 'carica_prodotti.php'; ?>

        <!-- Offerte speciali -->

<!--        <section class="testimonials">
            <h2>Recensioni dei clienti</h2>
            <div class="testimonial-list">
                <div class="testimonial-item">"Ottimo servizio!" - Cliente 1</div>
                <div class="testimonial-item">"Prodotti di qualità." - Cliente 2</div>
                <div class="testimonial-item">"Consigliatissimo!" - Cliente 3</div>
            </div>
        </section>-->
    </main>
    <footer>
        <div id="footer" class="footer-container">
            <div class="footer-section">
                <h3>Informazioni</h3>
                <p>Sito Shop Online - Roma (RM)</p>
                <p><strong>Email:</strong> infomonkey.contact@gmail.com</p>
                <p><strong>Telefono:</strong> +39 xxxx xxxxxx</p>
            </div>
            <div class="footer-section">
                <h3>Links Utili</h3>
                <ul>
                    <li><a href="#">Termini e condizioni</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Spedizioni</a></li>
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
