document.addEventListener('DOMContentLoaded', function () {
    // Seleziona il pulsante di ricerca
    const searchButton = document.getElementById('filter-search-button');

    // Aggiungi un event listener al pulsante di ricerca
    searchButton.addEventListener('click', function () {
        // Ottieni la valutazione selezionata
        const selectedRating = document.querySelector('input[name="rating"]:checked');

        // Se è stata selezionata una valutazione
        if (selectedRating) {
            // Costruisci l'URL corrente e imposta il parametro di valutazione
            const url = new URL(window.location.href);

            // Rimuovi eventuali altri parametri di valutazione
            url.searchParams.delete('valutazione');

            // Aggiungi il parametro di valutazione selezionato
            url.searchParams.set('valutazione', selectedRating.value);

            // Ricarica la pagina con il nuovo parametro
            window.location.href = url.toString();
        } else {
            alert('Seleziona una valutazione per eseguire la ricerca.');
        }
    });
});
