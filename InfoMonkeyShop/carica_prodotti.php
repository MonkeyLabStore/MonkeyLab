<?php
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

// Funzione per mostrare i prodotti in base alla categoria
function mostraProdotti($prodotti, $categoria) {
    $trovati = false; // Variabile per verificare se ci sono prodotti da mostrare
    foreach ($prodotti as $prodotto) {
        if (!empty($prodotto[$categoria]) && $prodotto[$categoria]) { // Assicurati che la chiave esista e sia true
            $trovati = true;
            echo '<div class="product-item">';
            // Aggiungi lo stile border-radius e box-shadow direttamente all'immagine
            echo '<a href="Prodotto.php?id=' . urlencode($prodotto['id']) . '" class="product-link" style="text-decoration: none; color: inherit;">';
            echo '<img src="' . htmlspecialchars($prodotto['immagine']) . '" alt="' . htmlspecialchars($prodotto['nome']) . '" style="max-width: 200px; max-height: 150px; object-fit: contain; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">';
            echo '<h3>' . htmlspecialchars($prodotto['nome']) . '</h3>';
            echo '<p>€' . htmlspecialchars($prodotto['prezzo']) . '</p>';
            echo '</a>';
            echo '</div>';
        }
    }

    if (!$trovati) {
        echo '<p>Nessun prodotto disponibile in questa categoria.</p>';
    }
}
?>

<!-- Visualizza i prodotti in evidenza -->
<section class="featured-products">
    <h2>Prodotti in evidenza</h2>
    <div class="product-list" id="featured-product-list">
        <?php
        mostraProdotti($prodotti, 'ProdottiEvidenza'); // Mostra solo i prodotti in evidenza
        ?>
    </div>
</section>

<!-- Visualizza le offerte speciali -->
<section id="offerte-speciali" class="special-offers">
    <h2>Offerte speciali</h2>
    <div class="product-list">
        <?php
        mostraProdotti($prodotti, 'Offerte'); // Mostra solo le offerte speciali
        ?>
    </div>
</section>
