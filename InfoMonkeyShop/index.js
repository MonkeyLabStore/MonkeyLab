<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Funzione per il reindirizzamento alla pagina specificata
        function redirectToPage(url) {
            console.log(`Redirecting to ${url}`); // Log per debugging
            window.location.href = url;
        }

        // Funzione per caricare il link dal file JSON e aggiornare il bottone
        function loadButtonLink() {
            fetch('data/link.json') // Assicurati che il percorso del file JSON sia corretto
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Network response was not ok: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data loaded:', data); // Log per debugging
                    const url = data.url; // Assumi che il JSON abbia un campo 'url'
                    const button = document.querySelector('.add-to-cart');

                    if (button) {
                        button.addEventListener('click', () => {
                            redirectToPage(url);
                        });
                        console.log('Button found and event listener added.'); // Log per debugging
                    } else {
                        console.error('Button with class .add-to-cart not found!');
                    }
                })
                .catch(error => console.error('Errore nel caricamento del link:', error));
        }

        // Aggiungi un event listener al bottone "Esplora"
        document.querySelector('.search-bar button').addEventListener('click', () => {
            redirectToPage('CatProd.php');
        });

        // Funzione per caricare i prodotti dal file JSON
        function loadProducts() {
            fetch('data/products.json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Network response was not ok: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const prodotti = data.prodotti;
                    const currentPage = window.location.pathname.split('/').pop();

                    let category = '';
                    if (currentPage === 'index.html' || currentPage === 'index.php') {
                        category = 'categorie1';
                    } else if (currentPage.startsWith('Categorie')) {
                        const categoryName = currentPage.split('.')[0].replace('Categorie-', '');
                        category = categoryName;
                    }

                    const productList = document.querySelector('#product-list');
                    const featuredProductList = document.querySelector('#featured-product-list');

                    if (productList) {
                        productList.innerHTML = '';

                        prodotti
                            .filter(prodotto => prodotto.categoria === category || category === '')
                            .forEach(prodotto => {
                                const productItem = document.createElement('div');
                                productItem.classList.add('product-item');
                                productItem.innerHTML = `
                                    <a href="Prodotto.php?id=${prodotto.id}" class="product-link">
                                        <img src="${prodotto.immagine}" alt="${prodotto.nome}">
                                        <h3 class="product-name">${prodotto.nome}</h3>
                                        <p>${prodotto.prezzo.toFixed(2)}€</p>
                                    </a>
                                `;
                                productList.appendChild(productItem);
                            });
                    }

                    if (featuredProductList) {
                        featuredProductList.innerHTML = '';

                        prodotti
                            .filter(prodotto => prodotto.inEvidenza)
                            .forEach(prodotto => {
                                const productItem = document.createElement('div');
                                productItem.classList.add('product-item');
                                productItem.innerHTML = `
                                    <a href="Prodotto.php?id=${prodotto.id}" class="product-link">
                                        <img src="${prodotto.immagine}" alt="${prodotto.nome}">
                                        <h3 class="product-name">${prodotto.nome}</h3>
                                        <p>${prodotto.prezzo.toFixed(2)}€</p>
                                    </a>
                                `;
                                featuredProductList.appendChild(productItem);
                            });
                    }
                })
                .catch(error => console.error('Errore nel caricamento dei prodotti:', error));
        }

        // Funzione per caricare i dettagli del prodotto nella pagina del prodotto
        function caricaDettagliProdotto(prodottoId) {
            fetch('data/products.json')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Network response was not ok: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const prodotto = data.prodotti.find(p => p.id === prodottoId);

                    if (prodotto) {
                        document.getElementById('main-image').src = prodotto.immaginePrincipale;
                        document.getElementById('product-name').textContent = prodotto.nome;
                        document.getElementById('product-price').textContent = `€${prodotto.prezzo.toFixed(2)}`;
                        document.getElementById('product-description').textContent = prodotto.descrizione;

                        const sizeSelect = document.getElementById('size');
                        sizeSelect.innerHTML = '';
                        prodotto.taglie.forEach(taglia => {
                            const option = document.createElement('option');
                            option.value = taglia;
                            option.textContent = taglia;
                            sizeSelect.appendChild(option);
                        });
                    } else {
                        console.error('Prodotto non trovato!');
                    }
                })
                .catch(error => console.error('Errore nel caricamento dei dettagli del prodotto:', error));
        }

        // Determina la pagina corrente e carica i dati appropriati
        const currentPage = window.location.pathname.split('/').pop();
        if (currentPage === 'Prodotto.php') {
            const urlParams = new URLSearchParams(window.location.search);
            const prodottoId = parseInt(urlParams.get('id'), 10);
            if (prodottoId) {
                caricaDettagliProdotto(prodottoId);
            }
        } else if (currentPage === 'index.html' || currentPage === 'index.php') {
            loadProducts();
        }

        // Carica il link del bottone
        loadButtonLink();
    });
</script>
