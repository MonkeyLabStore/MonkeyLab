<?php
// Recupera la categoria dalla query string
$categoria_selezionata = isset($_GET['categoria']) ? $_GET['categoria'] : '';

// Leggi il contenuto del file JSON
$json = file_get_contents('prodotti.json');
$prodotti = json_decode($json, true);

// Funzione per mostrare i prodotti per categoria
function mostraProdottiPerCategoria($prodotti, $categoria) {
    foreach ($prodotti as $prodotto) {
        if (in_array($categoria, $prodotto['categorie'])) {
            echo '<div class="product-item">';
            echo '<img src="' . htmlspecialchars($prodotto['immagine']) . '" alt="' . htmlspecialchars($prodotto['nome']) . '">';
            echo '<h3>' . htmlspecialchars($prodotto['nome']) . '</h3>';
            echo '<p>€' . htmlspecialchars($prodotto['prezzo']) . '</p>';
            echo '<p>' . htmlspecialchars($prodotto['descrizione']) . '</p>';
            echo '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodotti per Categoria</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!-- Header and Navigation Code Here -->
    </header>
    <main>
        <section class="category-products">
            <h2>Prodotti nella Categoria: <?php echo htmlspecialchars($categoria_selezionata); ?></h2>
            <div class="product-list">
                <?php mostraProdottiPerCategoria($prodotti, $categoria_selezionata); ?>
            </div>
        </section>
    </main>
    <footer>
        <!-- Footer Code Here -->
    </footer>
</body>
</html>
