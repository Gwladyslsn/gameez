document.addEventListener('DOMContentLoaded', function () {

    //Modal ajout jeu (ADMIN !!)
    const btnNewGame = document.getElementById('new-game');
    const modalAddGame = document.getElementById('modal-add-game');
    const closeBtnModal = modalAddGame.querySelector('.close');

    // IMAGE DU JEU (déclaré AVANT pour être dispo partout)
    const fileInput = document.getElementById('file-game');
    const previewImg = document.getElementById('preview-game');
    const selectImgBtn = document.getElementById('btn-img-game');

    // Ouvrir le modal
    btnNewGame.addEventListener('click', function (e) {
        e.preventDefault(); // <-- parenthèses !
        modalAddGame.classList.remove('hidden');
    });

    // Fermer le modal
    closeBtnModal.addEventListener('click', () => modalAddGame.classList.add('hidden'));
    window.addEventListener('click', (e) => {
        if (e.target === modalAddGame) modalAddGame.classList.add('hidden');
    });

    // Sélection et preview image
    selectImgBtn.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => previewImg.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });

    // ENVOI DES DONNÉES EN BDD
    const btnAddGame = document.getElementById('btn-add-game');

    btnAddGame.addEventListener('click', function (e) {
        e.preventDefault();

        const InputNameGame = document.getElementById('game_name');
        const InputDurationGame = document.getElementById('game_duration');
        const InputNbGamer = document.getElementById('nb_gamer');
        const InputAgeGamer = document.getElementById('age_gamer');
        const InputDescriptionGame = document.getElementById('game_description');
        const InputCategoryGame = document.getElementById('category-game');

        console.log('InputCategoryGame', InputCategoryGame); // doit pas être null

        const nameGame = InputNameGame.value.trim();
        const durationGame = InputDurationGame.value.trim();
        const nbGamer = InputNbGamer.value.trim();
        const ageGamer = InputAgeGamer.value.trim();
        const descriptionGame = InputDescriptionGame.value.trim();
        const categoryGame = InputCategoryGame.value;
        const fileGame = fileInput.files[0]; // <-- Récupère bien le fichier choisi

        const data = [nameGame, durationGame, nbGamer, ageGamer, descriptionGame, categoryGame, fileGame];
        console.log('data', data);
    });
});

