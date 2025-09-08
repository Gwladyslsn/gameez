document.addEventListener('DOMContentLoaded', function (e) {
    const modal = document.getElementById("modal-add-list");
    const closeBtn = modal.querySelector(".close");
    const validateBtn = document.getElementById("validate-add");

    document.querySelectorAll(".btn-add-list").forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const gameId = btn.getAttribute("data-game-id");
            modal.dataset.gameId = gameId; // stocke l'id du jeu dans le modal
            modal.classList.remove('hidden');

            // ici tu peux faire un fetch pour charger les listes existantes
            loadUserLists();
        });
    });

    closeBtn.addEventListener("click", () => {
        modal.classList.add('hidden');
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) modal.style.display = "none";
    });

});



