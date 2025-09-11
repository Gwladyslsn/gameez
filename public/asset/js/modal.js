document.addEventListener('DOMContentLoaded', function () {
    // MODAL LIST
    const modalList = document.getElementById("modal-add-list");
    const closeBtn = modalList.querySelector(".close");
    const validateBtn = document.getElementById("validate-add");
    const selectList = document.getElementById("select-list");
    const newListInput = document.getElementById("new-list-name"); // si tu as un input pour nouvelle liste

    // Ouvrir le modal via event delegation
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-add-list")) {
            e.preventDefault();
            const btn = e.target;
            const gameId = btn.getAttribute("data-game-id");
            modalList .dataset.gameId = gameId; // stocke l'id du jeu dans le modal
            modalList .classList.remove('hidden');

            loadUserLists(); // charge les listes existantes dans le select
        }
    });

    // Fermer le modal
    closeBtn.addEventListener("click", () => {
        modalList .classList.add('hidden');
    });

    window.addEventListener("click", (e) => {
        if (e.target === modalList ) modalList .classList.add('hidden');
    });

    // Charger les listes existantes de l'utilisateur
    async function loadUserLists() {
        try {
            const response = await fetch('/getUserLists');
            const lists = await response.json();

            // Vider le select avant de remplir
            selectList.innerHTML = '';
            lists.forEach(list => {
                const option = document.createElement('option');
                option.value = list.id_list;
                option.textContent = list.list_name;
                selectList.appendChild(option);
            });

            // Ajouter une option "Nouvelle liste"
            const newOption = document.createElement('option');
            newOption.value = 'new';
            newOption.textContent = '-- Créer une nouvelle liste --';
            selectList.appendChild(newOption);

        } catch (err) {
            console.error('Erreur en chargeant les listes:', err);
        }
    }

    // Valider l'ajout du jeu à la liste
    validateBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        const selectedValue = selectList.value;
        const gameId = modalList .dataset.gameId;
        let listId = null;
        let newListName = null;

        if (!gameId) {
            console.error("Pas d'ID de jeu trouvé sur ce bouton !");
            return;
        }

        if (selectedValue === 'new') {
            newListName = newListInput.value.trim();
            if (!newListName) {
                alert('Veuillez entrer un nom pour la nouvelle liste');
                return;
            }
        } else {
            listId = selectedValue;
        }

        // Préparer les données
        const data = {
            id_list: listId,
            new_list_name: newListName,
            id_game: gameId
        };

        try {
            const response = await fetch('/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert('Jeu ajouté à la liste avec succès !');
                modalList.classList.add('hidden');
                newListInput.value = ''; // reset input nouvelle liste
                loadUserLists(); // recharger les listes au cas où une nouvelle a été créée
            } else {
                alert(result.message);
            }
        } catch (err) {
            console.error('Erreur lors de l\'ajout:', err);
            alert('Une erreur est survenue.');
        }
    });



    // Modal avis

    const modalReview = document.getElementById("modal-add-review");
    const closeBtnReview = modalList.querySelector(".close");
    const validateBtnReview = document.getElementById("validate-add-review");
    const formReview = document.getElementById("form-review");

    // Ouvrir le modal via event delegation
    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-add-review")) {
            e.preventDefault();
            const btn = e.target;
            const gameId = btn.getAttribute("data-game-id");
            modalReview .dataset.gameId = gameId; // stocke l'id du jeu dans le modal
            modalReview .classList.remove('hidden');           
        }
    });

    // Fermer le modal
    closeBtnReview.addEventListener("click", () => {
        modalReview .classList.add('hidden');
    });

    window.addEventListener("click", (e) => {
        if (e.target === modalReview ) modalReview .classList.add('hidden');
    });


    // Valider l'avis
    validateBtnReview.addEventListener("click", async (e) => {
        e.preventDefault();
        const rating = formReview.querySelector('input[name="review_note"]:checked')?.value;
        const comment = formReview.querySelector('textarea[name="review_comment"]').value;
        const gameId = modalReview .dataset.gameId;

        if (!gameId) {
            console.error("Pas d'ID de jeu trouvé sur ce bouton !");
            return;
        }


        // Préparer les données
        const data = {
            review_note: rating,
            review_comment: comment,
            id_game: gameId
        };

        try {
            const response = await fetch('/addReview', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert('Avis ajouté avec succès ! !');
                modalReview.classList.add('hidden');
            } else {
                alert(result.message);
            }
        } catch (err) {
            console.error('Erreur lors de l\'ajout:', err);
            alert('Une erreur est survenue.');
            formReview.reset();
        }
    });
});





