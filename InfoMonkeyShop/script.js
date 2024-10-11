document.addEventListener('DOMContentLoaded', function() {
    // Ottieni riferimenti agli elementi del DOM che userai
    var rangeInput = document.querySelector('input[type="range"]');
    var priceValue = document.getElementById('price-value');
    var searchInput = document.getElementById('search-input');
    var searchButton = document.querySelector('.search-bar button');
    var filterSearchButton = document.getElementById('filter-search-button');

    // Aggiornamento iniziale del valore del prezzo visualizzato
    priceValue.textContent = '€ ' + rangeInput.value;

    // Aggiungi un event listener all'input del range per aggiornare il valore del prezzo visualizzato
    rangeInput.addEventListener('input', function() {
        var value = this.value;
        priceValue.textContent = '€ ' + value;
    });

    // Aggiungi un event listener alla barra di ricerca per eseguire la ricerca al premere di "Invio"
    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Previene il comportamento predefinito del form
            searchProducts();
        }
    });

    // Funzione di ricerca dei prodotti
    function searchProducts() {
        var input = searchInput.value.toLowerCase();
        var maxPrice = parseFloat(rangeInput.value);
        var products = document.getElementsByClassName('product-item');
        var categoryTitle = document.getElementById('category-title');

        // Logica per mostrare/nascondere i prodotti in base alla ricerca e al filtro del prezzo
        for (var i = 0; i < products.length; i++) {
            var productName = products[i].getElementsByTagName('h3')[0].innerText.toLowerCase();
            var productPrice = parseFloat(products[i].getElementsByTagName('p')[0].innerText.replace('€', ''));

            if (productName.includes(input) && productPrice <= maxPrice) {
                products[i].style.display = 'block'; // Mostra il prodotto se soddisfa i criteri di ricerca e prezzo
            } else {
                products[i].style.display = 'none'; // Nascondi il prodotto se non soddisfa i criteri
            }
        }

        // Aggiorna il titolo della categoria in base alla ricerca effettuata
        categoryTitle.textContent = 'Risultati della ricerca per: "' + input + '"';
    }

    // Aggiungi un event listener al bottone di ricerca nella barra di ricerca
    searchButton.addEventListener('click', searchProducts);

    // Aggiungi un event listener al bottone di ricerca nei filtri
    filterSearchButton.addEventListener('click', searchProducts);
});
