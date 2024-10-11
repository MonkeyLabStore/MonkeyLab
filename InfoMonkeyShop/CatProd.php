<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie di Prodotto</title>
    <link rel="stylesheet" href="CatStyle.css">
    <script src="script.js"></script>
    <script src="Valutazione.js"></script>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="Scritta ML.png" alt="Logo" class="logo-image">
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="Istituzioni.html">Chi siamo</a></li>
                <li><a href="Blog.html">Blog</a></li>
                <li><a href="assistenza.html">Supporto</a></li>
            </ul>
            <div class="nav-right">
                <div class="search-bar">
                    <input type="text" id="search-input" placeholder="Cerca...">
                    <button onclick="searchProducts()">Cerca</button>
                </div>
                <div class="account-link">
<!--              <a href="Utente.html">Account</a>-->
                </div>
            </div>
        </nav>
    </header>
    <main>
        <aside class="sidebar">
            <h2>Filtri</h2>
            <div class="filter">
                <span>€ 0</span>
                <input type="range" min="0" max="100" value="100" id="price-filter">
                <span id="price-value">€ 100</span>
            </div>
<!--              <div class="filter">
                <h3>Categoria</h3>
                <ul>
                    <li><input type="checkbox"> 1-3 Giorni</li>
                    <li><input type="checkbox"> 3-7 Giorni</li>
                    <li><input type="checkbox"> 7-21 Giorni</li>
                </ul>
            </div>
            <div class="filter">
                <h3>Tempistica</h3>
                <ul>
                    <li><input type="checkbox"> 1-3 Giorni</li>
                    <li><input type="checkbox"> 3-7 Giorni</li>
                    <li><input type="checkbox"> 7-21 Giorni</li>
                </ul>
            </div>
            <div class="filter">
                <h3>Valutazione</h3>
                <ul>
                    <li><input type="checkbox"> 5 Stelle</li>
                    <li><input type="checkbox"> 4 Stelle</li>
                    <li><input type="checkbox"> 3 Stelle</li>
                    <li><input type="checkbox"> 2 Stelle</li>
                    <li><input type="checkbox"> 1 Stelle</li>
                </ul>
            </div> -->
            <div class="filter">
                <button id="filter-search-button" class="filter-search-button">Cerca</button>
            </div>
        </aside>


        <section class="products">
            <h2 id="category-title">Categoria: Nome Categoria</h2>
            <div class="product-list">
                <?php include 'visualizza_prodotti.php'; ?>
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
