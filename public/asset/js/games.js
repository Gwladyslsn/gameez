document.addEventListener('DOMContentLoaded', function (e) {

    //Charger plus de jeux
    const loadMoreBtn = document.getElementById('load-more-btn');

    loadMoreBtn.addEventListener('click', function (e) {
        e.preventDefault();

        // calcule dynamiquement l'offset
        let offset = document.querySelectorAll('#game-list .game').length;

        fetch('/loadMoreGames', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ offset: offset })
        })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === '') {
                    this.style.display = 'none';
                } else {
                    document.getElementById('game-list').insertAdjacentHTML('beforeend', data);
                }
            })
            .catch(error => console.error('Erreur:', error));
    });


    // barre de recherche
    const searchInput = document.getElementById("searchInput");
    const categoryFilter = document.getElementById("categoryFilter");
    // tu feras pareil pour joueurs, age, duree
    const resultsBox = document.getElementById("results");

    async function fetchGames() {
        const nameGame = searchInput.value.trim();
        const category = categoryFilter.value;

        const params = new URLSearchParams({
            nameGame,
            category,
            // ajoute ici les autres filtres ex: players, age, duration
        });

        const res = await fetch(`/game/search?${params.toString()}`);
        const games = await res.json();

        resultsBox.innerHTML = games.length
            ? games.map(g => `<div class="game-card">${g.title} (${g.publisher})</div>`).join("")
            : "<p>Aucun jeu trouvé</p>";
    }

    // Recherche dès qu’on tape (avec petit délai pour éviter spam)
    let debounceTimer;
    searchInput.addEventListener("input", () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(fetchGames, 300);
    });

    // Recherche quand on change un filtre
    categoryFilter.addEventListener("change", fetchGames);

});