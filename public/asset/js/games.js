document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();

    const loadMoreBtn = document.getElementById('load-more-btn');

    loadMoreBtn.addEventListener('click', function (e){
        e.preventDefault();
        console.log('click charger +');
        
        let offset = parseInt(this.getAttribute('data-offset'));

        // AJAX pour charger plus de jeux
        fetch('/loadMoreGames', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'offset=' + offset
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === '') {
            this.style.display = 'none';
        } else {
            document.getElementById('game-list').insertAdjacentHTML('beforeend', data);
            offset += 10;
            this.setAttribute('data-offset', offset);
        }
    })
    .catch(error => console.error('Erreur:', error));

    })
    });