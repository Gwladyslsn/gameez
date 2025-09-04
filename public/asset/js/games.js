document.addEventListener('DOMContentLoaded', function (e) {

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
});