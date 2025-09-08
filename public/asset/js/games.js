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


    // Barre de recherche
    const searchInput = document.getElementById("searchInput");
    const categoryFilter = document.getElementById("categoryFilter");
    const playersFilter = document.getElementById("nbGamerFilter");
    const ageFilter = document.getElementById("ageFilter");
    const durationFilter = document.getElementById("durationFilter");
    const searchBtn = document.getElementById("searchBtn");

    const resultsBox = document.getElementById("game-list");

    // --- Fonction principale ---
    async function fetchGames() {
        const nameGame = searchInput.value.trim();
        const idCategory = parseInt(categoryFilter.value);
        const nbPlayer = playersFilter.value;
        const agePlayer = ageFilter.value;
        const durationGame = durationFilter.value;

        const params = new URLSearchParams({
            nameGame,
            idCategory,
            nbPlayer,
            agePlayer,
            durationGame
        });

        const res = await fetch(`/searchGame?${params.toString()}`);
        const games = await res.json();

        const resultsBox = document.getElementById("game-list");

        resultsBox.innerHTML = games.length
            ? games.map(g => `
        <div class="game-card game">
            <div class="game-image">
                <span><img src="/asset/${g.image}" alt="Image du jeu" class="gameImage"></span>
            </div>
            <h3 class="game-title">${g.game_name}</h3>
            <div class="game-meta">
                <span class="meta-tag">${g.nb_gamer} joueurs</span>
                <span class="meta-tag">${g.duration_game} minutes</span>
                <span class="meta-tag">à partir de ${g.age_gamer} ans</span>
            </div>
            <div class="game-rating">
                <div class="stars">★★★★☆</div>
                <span class="rating-text">4.6 (3,521 avis)</span>
            </div>
            <p class="game-description">${g.description_game}</p>
        </div>
    `).join("")
            : "<p>Aucun jeu trouvé</p>";


    }

    // --- Listeners ---
    // Clic sur la loupe
    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('click btn loupe');
        fetchGames();
    });

    // Recherche dès qu’on tape (avec délai anti-spam)
    let debounceTimer;
    searchInput.addEventListener("input", () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(fetchGames, 300);
    });

    // Recherche quand on change un filtre
    categoryFilter.addEventListener("change", fetchGames);
    playersFilter.addEventListener("change", fetchGames);
    ageFilter.addEventListener("change", fetchGames);
    durationFilter.addEventListener("change", fetchGames);



});