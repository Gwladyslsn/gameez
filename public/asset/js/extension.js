document.addEventListener('DOMContentLoaded', function () {
    const searchInputExt = document.getElementById("searchInputExt");
    const btnAllExt = document.getElementById("allExt");
    const btnNewExt = document.getElementById("newExt");
    const btnComplexExt = document.getElementById("complexExt");
    const btnBestExt = document.getElementById("bestExt");
    const searchBtn = document.getElementById("searchExt");

    async function fetchExtensions(filter = "all") {
        const nameExtension = searchInputExt.value.trim();

        const params = new URLSearchParams({
            nameExtension,
            filter // <-- on envoie le filtre sélectionné
        });

        

        const res = await fetch(`/searchExtension?${params.toString()}`);
        const extensions = await res.json();

        const resultsBoxExt = document.getElementById("extensionsGrid");
        resultsBoxExt.innerHTML = extensions.length
            ? extensions.map(e => `
            <div class="extension-card fade-in">
                <div class="extension-image">
                    <span>
                        <img src="/asset/image/extensions/${e.extension_image}" alt="Image de l'extension" class="extensionImage">
                    </span>
                </div>
                <div class="extension-info">
                    <h3 class="extension-name">${e.extension_name}</h3>
                    <div class="base-game">Extension pour • ${e.game_name}</div>
                    <p class="extension-description">${e.extension_description}</p>
                </div>
                <div class="extension-details">
                    <div class="detail-item"><span class="detail-label">Note moyenne :</span><span class="detail-value">${e.avg_rating ?? "—"}</span></div>
                    <div class="detail-item"><span class="detail-label">Complexité :</span><span class="detail-value">${e.complexity} /5</span></div>
                    <div class="detail-item"><span class="detail-label">Sortie le :</span><span class="detail-value">${e.release_date}</span></div>
                </div>
            </div>
            `).join("")
            : "<p>Aucune extension trouvée</p>";
    }

    // --- Listeners ---
    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        fetchExtensions();
    });

    let debounceTimer;
    searchInputExt.addEventListener("input", () => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => fetchExtensions(), 300);
    });

    btnAllExt.addEventListener("click", () => fetchExtensions("all"));
    btnNewExt.addEventListener("click", () => fetchExtensions("new"));
    btnComplexExt.addEventListener("click", () => fetchExtensions("complex"));
    btnBestExt.addEventListener("click", () => fetchExtensions("best"));
});
