document.addEventListener('DOMContentLoaded', function () {
    // --- MODAL LIST ---
    const modalList = document.getElementById("modal-add-list");
    const closeBtn = modalList.querySelector(".close");
    const validateBtn = document.getElementById("validate-add");
    const selectList = document.getElementById("select-list");
    const newListInput = document.getElementById("new-list-name");

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-add-list")) {
            e.preventDefault();
            const btn = e.target;

            // Utiliser des data dynamiques
            modalList.dataset.type = btn.dataset.type || "game"; 
            modalList.dataset.itemId = btn.dataset.id; 

            modalList.classList.remove('hidden');
            loadUserLists();
        }
    });

    closeBtn.addEventListener("click", () => modalList.classList.add('hidden'));

    window.addEventListener("click", (e) => {
        if (e.target === modalList) modalList.classList.add('hidden');
    });

    async function loadUserLists() {
        try {
            const response = await fetch('/getUserLists');
            const lists = await response.json();

            selectList.innerHTML = '';
            lists.forEach(list => {
                const option = document.createElement('option');
                option.value = list.id_list;
                option.textContent = list.list_name;
                selectList.appendChild(option);
            });

            const newOption = document.createElement('option');
            newOption.value = 'new';
            newOption.textContent = '-- Créer une nouvelle liste --';
            selectList.appendChild(newOption);
        } catch (err) {
            console.error('Erreur en chargeant les listes:', err);
        }
    }

    validateBtn.addEventListener("click", async (e) => {
        e.preventDefault();

        const selectedValue = selectList.value;
        const itemId = modalList.dataset.itemId;
        const type = modalList.dataset.type; // "game" ou "extension"
        let listId = null;
        let newListName = null;

        if (!itemId) {
            console.error("Pas d'ID trouvé sur ce bouton !");
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

        const data = {
            id_list: listId,
            new_list_name: newListName,
            type, // envoyer le type pour le backend
            id_item: itemId // renommer pour que ce soit générique
        };

        try {
            const response = await fetch('/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert(`${type === "game" ? "Jeu" : "Extension"} ajouté(e) à la liste avec succès !`);
                modalList.classList.add('hidden');
                newListInput.value = '';
                loadUserLists();
            } else {
                alert(result.message);
            }
        } catch (err) {
            console.error('Erreur lors de l\'ajout:', err);
            alert('Une erreur est survenue.');
        }
    });

    // --- MODAL REVIEW ---
    const modalReview = document.getElementById("modal-add-review");
    const closeBtnReview = modalReview.querySelector(".close");
    const validateBtnReview = document.getElementById("validate-add-review");
    const formReview = document.getElementById("form-review");

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("btn-add-review")) {
            e.preventDefault();
            const btn = e.target;

            modalReview.dataset.type = btn.dataset.type || "game";
            modalReview.dataset.itemId = btn.dataset.id;

            modalReview.classList.remove('hidden');
        }
    });

    closeBtnReview.addEventListener("click", () => modalReview.classList.add('hidden'));
    window.addEventListener("click", (e) => {
        if (e.target === modalReview) modalReview.classList.add('hidden');
    });

    validateBtnReview.addEventListener("click", async (e) => {
        e.preventDefault();

        const rating = formReview.querySelector('input[name="review_note"]:checked')?.value;
        const comment = formReview.querySelector('textarea[name="review_comment"]').value;
        const itemId = modalReview.dataset.itemId;
        const type = modalReview.dataset.type;

        if (!itemId) {
            console.error("Pas d'ID trouvé sur ce bouton !");
            return;
        }

        const data = {
            review_note: rating,
            review_comment: comment,
            type,
            id_item: itemId
        };

        try {
            const response = await fetch('/addReview', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.status === 'success') {
                alert(`${type === "game" ? "Avis de jeu" : "Avis d'extension"} ajouté avec succès !`);
                formReview.reset();
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






