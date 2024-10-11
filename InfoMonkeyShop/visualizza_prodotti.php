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

// Funzione per mostrare i prodotti in base alla categoria e alla valutazione esatta
function mostraProdotti($prodotti, $categoria, $valutazione = null) {
    $trovati = false; // Variabile per verificare se ci sono prodotti da mostrare
    foreach ($prodotti as $prodotto) {
        // Verifica se la chiave della categoria è presente e il suo valore
        if (isset($prodotto[$categoria]) && $prodotto[$categoria]) {
            // Se una valutazione è stata selezionata, filtra i prodotti per valutazione esatta
            if ($valutazione !== null && isset($prodotto['valutazione']) && $prodotto['valutazione'] != $valutazione) {
                continue; // Salta il prodotto se la valutazione è diversa da quella selezionata
            }

            $trovati = true;
            $id = htmlspecialchars($prodotto['id']); // Escape l'ID
            echo '<div class="product-item">';
            echo '<a href="Prodotto.php?id=' . urlencode($id) . '">'; // Aggiungi un link al prodotto con ID
            echo '<img src="' . htmlspecialchars($prodotto['immagine']) . '" alt="' . htmlspecialchars($prodotto['nome']) . '">';
            echo '<h3>' . htmlspecialchars($prodotto['nome']) . '</h3>';
            echo '<p>€' . htmlspecialchars($prodotto['prezzo']) . '</p>';
            echo '</a>'; // Chiudi il link

            // Sezione per visualizzare le stelle di valutazione
            if (isset($prodotto['valutazione'])) {
                echo '<div class="stars">';
                $filledStars = intval($prodotto['valutazione']); // Numero di stelle piene
                $emptyStars = 5 - $filledStars; // Calcolo delle stelle vuote

                // Mostra le stelle piene
                for ($i = 0; $i < $filledStars; $i++) {
                    echo '<span class="star filled">★</span>';
                }

                // Mostra le stelle vuote
                for ($i = 0; $i < $emptyStars; $i++) {
                    echo '<span class="star empty">☆</span>';
                }
                echo '</div>'; // Fine sezione stelle
            }

            echo '</div>';
        }
    }

    if (!$trovati) {
        echo '<p>Nessun prodotto disponibile in questa categoria.</p>';
    }
}
?>

<!-- Visualizza i prodotti con la variabile "prodotto" settata a true -->
<section class="featured-products">
    <div class="product-list">
        <?php
        // Se una valutazione è stata selezionata, passa quel parametro alla funzione
        $valutazioneFiltrata = isset($_GET['valutazione']) ? intval($_GET['valutazione']) : null;
        mostraProdotti($prodotti, 'prodotto', $valutazioneFiltrata); // Mostra i prodotti filtrati per valutazione esatta
        ?>
    </div>
</section>
