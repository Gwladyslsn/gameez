<?php

require_once ROOTPATH . 'src/View/template/header.php';
?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Overview Tab -->
            <div id="overview" class="tab-content active">
                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Total des jeux</div>
                                <div class="stat-card-value">1,247</div>
                                <div class="stat-card-trend">+12% ce mois</div>
                            </div>
                            <div class="stat-card-icon games">
                                <span class="icon-gamepad"></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Utilisateurs actifs</div>
                                <div class="stat-card-value">8,532</div>
                                <div class="stat-card-trend">+8% ce mois</div>
                            </div>
                            <div class="stat-card-icon users">
                                <span class="icon-users"></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Avis en attente</div>
                                <div class="stat-card-value">23</div>
                            </div>
                            <div class="stat-card-icon reviews">
                                <span class="icon-message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-card-header">
                            <div>
                                <div class="stat-card-title">Clics ce mois</div>
                                <div class="stat-card-value">145,678</div>
                                <div class="stat-card-trend">+15% ce mois</div>
                            </div>
                            <div class="stat-card-icon clicks">
                                <span class="icon-trending"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Games Section -->
                <div class="top-games-grid">
                    <div class="top-games-card">
                        <h3 class="top-games-title">
                            <span class="icon-trending"></span>
                            Top 5 - Plus de clics
                        </h3>
                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank clicks">1</div>
                                <span>The Witcher 3</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">15,432 clics</div>
                                <div class="game-rating">
                                    <span class="star">★</span>
                                    <span>4.8</span>
                                </div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank clicks">2</div>
                                <span>Cyberpunk 2077</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">12,890 clics</div>
                                <div class="game-rating">
                                    <span class="star">★</span>
                                    <span>4.2</span>
                                </div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank clicks">3</div>
                                <span>Elden Ring</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">11,234 clics</div>
                                <div class="game-rating">
                                    <span class="star">★</span>
                                    <span>4.9</span>
                                </div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank clicks">4</div>
                                <span>God of War</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">9,876 clics</div>
                                <div class="game-rating">
                                    <span class="star">★</span>
                                    <span>4.7</span>
                                </div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank clicks">5</div>
                                <span>Horizon Zero Dawn</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">8,765 clics</div>
                                <div class="game-rating">
                                    <span class="star">★</span>
                                    <span>4.6</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-games-card">
                        <h3 class="top-games-title">
                            <span class="star">★</span>
                            Top 5 - Plus en wishlist
                        </h3>
                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">1</div>
                                <span>Baldur's Gate 3</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">2,341 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">2</div>
                                <span>Starfield</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">2,156 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">3</div>
                                <span>Spider-Man 2</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,987 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">4</div>
                                <span>Final Fantasy XVI</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,834 wishlists</div>
                            </div>
                        </div>

                        <div class="game-item">
                            <div class="game-info">
                                <div class="game-rank wishlists">5</div>
                                <span>Diablo IV</span>
                            </div>
                            <div class="game-stats">
                                <div class="game-value">1,723 wishlists</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Games Management Tab -->
            <div id="games" class="tab-content">
                <div class="section-header">
                    <h2>Gestion des jeux</h2>
                    <button class="btn-primary">
                        <span class="icon-plus"></span>
                        Ajouter un jeu
                    </button>
                </div>

                <div class="games-table-container">
                    <div class="table-header">
                        <h3>Jeux récents</h3>
                        <div class="filters">
                            <select class="filter-select">
                                <option>Tous les statuts</option>
                                <option>Publié</option>
                                <option>Brouillon</option>
                            </select>
                            <select class="filter-select">
                                <option>Toutes catégories</option>
                                <option>Action</option>
                                <option>RPG</option>
                                <option>Sport</option>
                            </select>
                        </div>
                    </div>

                    <table class="games-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>The Witcher 3</td>
                                <td>RPG</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>2024-08-20</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon btn-edit">
                                            <span class="icon-edit"></span>
                                        </button>
                                        <button class="btn-icon btn-delete">
                                            <span class="icon-delete"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Cyberpunk 2077</td>
                                <td>Action</td>
                                <td><span class="status-badge published">Publié</span></td>
                                <td>2024-08-19</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon btn-edit">
                                            <span class="icon-edit"></span>
                                        </button>
                                        <button class="btn-icon btn-delete">
                                            <span class="icon-delete"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Elden Ring</td>
                                <td>RPG</td>
                                <td><span class="status-badge draft">Brouillon</span></td>
                                <td>2024-08-18</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-icon btn-edit">
                                            <span class="icon-edit"></span>
                                        </button>
                                        <button class="btn-icon btn-delete">
                                            <span class="icon-delete"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Reviews Tab -->
            <div id="reviews" class="tab-content">
                <div class="reviews-header">
                    <h2>Avis en attente de modération</h2>
                    <span class="pending-badge">3 avis en attente</span>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">The Witcher 3</h4>
                            <div class="review-meta">
                                <span class="review-user">Par Alex123</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span>(5/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-24
                        </div>
                    </div>
                    <p class="review-comment">Jeu absolument fantastique avec une histoire incroyable et un monde ouvert magnifique. Les quêtes secondaires sont aussi intéressantes que la quête principale.</p>
                    <div class="review-actions">
                        <button class="btn-reject">
                            <span class="icon-x"></span>
                            Rejeter
                        </button>
                        <button class="btn-approve">
                            <span class="icon-check"></span>
                            Approuver
                        </button>
                    </div>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">Cyberpunk 2077</h4>
                            <div class="review-meta">
                                <span class="review-user">Par Gamer456</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star empty">★</span>
                                    <span class="star empty">★</span>
                                    <span>(3/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-24
                        </div>
                    </div>
                    <p class="review-comment">Beaucoup de bugs au lancement mais l'univers est vraiment cool. Les graphismes sont impressionnants sur une bonne config.</p>
                    <div class="review-actions">
                        <button class="btn-reject">
                            <span class="icon-x"></span>
                            Rejeter
                        </button>
                        <button class="btn-approve">
                            <span class="icon-check"></span>
                            Approuver
                        </button>
                    </div>
                </div>

                <div class="review-card">
                    <div class="review-header">
                        <div>
                            <h4 class="review-game-title">Elden Ring</h4>
                            <div class="review-meta">
                                <span class="review-user">Par RPGFan</span>
                                <div class="review-rating">
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span class="star">★</span>
                                    <span>(5/5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-date">
                            <span class="icon-clock"></span>
                            2024-08-23
                        </div>
                    </div>
                    <p class="review-comment">Meilleur FromSoftware à ce jour ! L'exploration est addictive et les boss sont épiques. Un chef-d'œuvre du jeu vidéo.</p>
                    <div class="review-actions">
                        <button class="btn-reject">
                            <span class="icon-x"></span>
                            Rejeter
                        </button>
                        <button class="btn-approve">
                            <span class="icon-check"></span>
                            Approuver
                        </button>
                    </div>
                </div>
            </div>

            <!-- Users Tab -->
            <div id="users" class="tab-content">
                <div class="coming-soon">
                    <h3>Gestion des utilisateurs</h3>
                    <p>Section en cours de développement...</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked tab button
            event.target.classList.add('active');
        }

        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            searchInput.addEventListener('input', function() {
                console.log('Recherche:', this.value);
                // Here you would implement actual search functionality
            });

            // Filter functionality
            const filterSelects = document.querySelectorAll('.filter-select');
            filterSelects.forEach(select => {
                select.addEventListener('change', function() {
                    console.log('Filtre changé:', this.value);
                    // Here you would implement actual filtering
                });
            });

            // Review actions
            const approveButtons = document.querySelectorAll('.btn-approve');
            approveButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Approuver cet avis ?')) {
                        this.closest('.review-card').style.opacity = '0.5';
                        console.log('Avis approuvé');
                        // Here you would implement actual approval logic
                    }
                });
            });

            const rejectButtons = document.querySelectorAll('.btn-reject');
            rejectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Rejeter cet avis ?')) {
                        this.closest('.review-card').style.opacity = '0.5';
                        console.log('Avis rejeté');
                        // Here you would implement actual rejection logic
                    }
                });
            });

            // Game actions
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log('Éditer le jeu');
                    // Here you would redirect to edit page or open modal
                });
            });

            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Supprimer ce jeu ?')) {
                        console.log('Jeu supprimé');
                        // Here you would implement actual deletion logic
                    }
                });
            });
        });
    </script>
</body>
</html>