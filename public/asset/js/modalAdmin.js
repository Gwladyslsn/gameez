document.addEventListener('DOMContentLoaded', function () {



    //Modal ajout jeu (ADMIN !!)
    const btnNewGame = document.getElementById('new-game');
    const modalAddGame = document.getElementById('modal-add-game');
    const closeBtnModal = modalAddGame.querySelector('.close');

    btnNewGame.addEventListener('click', function (e) {
        e.preventDefault;

        modalAddGame.classList.remove('hidden');
    });

    // Fermer le modal
    closeBtnModal.addEventListener('click', () => {
        modalAddGame.classList.add('hidden');
    });

    window.addEventListener('click', (e) => {
        if (e.target === modalAddGame) modalAddGame.classList.add('hidden');
    });


    // IMAGE DU JEU
    // Récupération des éléments
    const fileInput = document.getElementById('file-game');
    const previewImg = document.getElementById('preview-game');
    const selectImgBtn = document.getElementById('btn-img-game');

    // Clic sur le bouton -> ouvrir la boîte de dialogue
    selectImgBtn.addEventListener('click', () => fileInput.click());

    // Changement de fichier -> mise à jour de l'aperçu
    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => previewImg.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });

})
