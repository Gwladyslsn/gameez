
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameez - Dashboard Admin</title>
    <style>
        :root {
            --blue: #667eea;
            --purple: #764ba2;
            --white: #f5f5f5;
            --black: #000000;
            --pink: #ff9a9e;
            --light-pink: #fecfef;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--white);
            color: var(--gray-900);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--blue), var(--purple));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.5rem 0.5rem 0.5rem 2.5rem;
            border: none;
            border-radius: 8px;
            background: rgba(255,255,255,0.2);
            color: white;
            backdrop-filter: blur(10px);
            width: 250px;
        }

        .search-box input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.7);
        }

        /* Navigation Tabs */
        .nav-tabs {
            background: white;
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-200);
        }

        .nav-tabs-container {
            display: flex;
            gap: 0.5rem;
            overflow-x: auto;
        }

        .tab-button {
            padding: 0.75rem 1.5rem;
            border: none;
            background: transparent;
            color: var(--gray-600);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .tab-button:hover {
            background: var(--gray-100);
            color: var(--gray-900);
        }

        .tab-button.active {
            background: var(--blue);
            color: white;
        }

        /* Main Content */
        .main-content {
            padding: 2rem 0;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--gray-200);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .stat-card-icon.games { background: var(--blue); }
        .stat-card-icon.users { background: var(--purple); }
        .stat-card-icon.reviews { background: var(--pink); }
        .stat-card-icon.clicks { background: linear-gradient(135deg, var(--blue), var(--purple)); }

        .stat-card-title {
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .stat-card-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--gray-900);
        }

        .stat-card-trend {
            font-size: 0.875rem;
            color: #10b981;
            margin-top: 0.5rem;
        }

        /* Top Games Section */
        .top-games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .top-games-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--gray-200);
        }

        .top-games-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .game-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: var(--gray-50);
            border-radius: 8px;
            margin-bottom: 0.75rem;
        }

        .game-rank {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: white;
            font-weight: bold;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
        }

        .game-rank.clicks { background: var(--blue); }
        .game-rank.wishlists { background: var(--purple); }

        .game-info {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .game-stats {
            text-align: right;
        }

        .game-value {
            font-weight: 600;
            color: var(--gray-900);
        }

        .game-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        /* Games Management */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn-primary {
            background: var(--blue);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--purple);
        }

        .games-table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .table-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filters {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 0.5rem;
            border: 1px solid var(--gray-300);
            border-radius: 6px;
            background: white;
        }

        .games-table {
            width: 100%;
            border-collapse: collapse;
        }

        .games-table th,
        .games-table td {
            padding: 1rem 1.5rem;
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
        }

        .games-table th {
            background: var(--gray-50);
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .games-table tbody tr:hover {
            background: var(--gray-50);
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-badge.published {
            background: #dcfce7;
            color: #166534;
        }

        .status-badge.draft {
            background: #fef3c7;
            color: #92400e;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: var(--light-pink);
            color: var(--purple);
        }

        .btn-edit:hover {
            background: var(--pink);
            color: white;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .btn-delete:hover {
            background: #dc2626;
            color: white;
        }

        /* Reviews Section */
        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .pending-badge {
            background: #fee2e2;
            color: #dc2626;
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .review-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--gray-200);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .review-game-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .review-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .review-user {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .review-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .star {
            color: #fbbf24;
            font-size: 1rem;
        }

        .star.empty {
            color: var(--gray-300);
        }

        .review-date {
            font-size: 0.875rem;
            color: var(--gray-500);
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .review-comment {
            color: var(--gray-700);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .review-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
        }

        .btn-reject {
            padding: 0.5rem 1rem;
            background: #fee2e2;
            color: #dc2626;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-reject:hover {
            background: #dc2626;
            color: white;
        }

        .btn-approve {
            padding: 0.5rem 1rem;
            background: #dcfce7;
            color: #166534;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-approve:hover {
            background: #166534;
            color: white;
        }

        /* Users Section */
        .coming-soon {
            background: white;
            border-radius: 12px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid var(--gray-200);
        }

        .coming-soon h3 {
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .coming-soon p {
            color: var(--gray-600);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box input {
                width: 100%;
            }

            .nav-tabs-container {
                flex-wrap: wrap;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .top-games-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                flex-direction: column;
                align-items: stretch;
            }

            .games-table-container {
                overflow-x: auto;
            }

            .games-table {
                min-width: 600px;
            }
        }

        /* Icons (using Unicode symbols for simplicity) */
        .icon-gamepad::before { content: "🎮"; }
        .icon-users::before { content: "👥"; }
        .icon-chart::before { content: "📊"; }
        .icon-message::before { content: "💬"; }
        .icon-plus::before { content: "+"; }
        .icon-edit::before { content: "✏️"; }
        .icon-delete::before { content: "🗑️"; }
        .icon-check::before { content: "✓"; }
        .icon-x::before { content: "✗"; }
        .icon-star::before { content: "⭐"; }
        .icon-clock::before { content: "🕒"; }
        .icon-trending::before { content: "📈"; }
        .icon-search::before { content: "🔍"; }
        .icon-settings::before { content: "⚙️"; }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <span class="icon-gamepad"></span>
                    <span>Gameez Admin</span>
                </div>
                <div class="search-container">
                    <div class="search-box">
                        <span class="search-icon icon-search"></span>
                        <input type="text" placeholder="Rechercher un jeu...">
                    </div>
                    <span class="icon-settings" style="cursor: pointer; font-size: 1.25rem;"></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="nav-tabs">
        <div class="container">
            <div class="nav-tabs-container">
                <button class="tab-button active" onclick="showTab('overview')">
                    <span class="icon-chart"></span>
                    Vue d'ensemble
                </button>
                <button class="tab-button" onclick="showTab('games')">
                    <span class="icon-gamepad"></span>
                    Gestion des jeux
                </button>
                <button class="tab-button" onclick="showTab('reviews')">
                    <span class="icon-message"></span>
                    Avis en attente
                </button>
                <button class="tab-button" onclick="showTab('users')">
                    <span class="icon-users"></span>
                    Utilisateurs
                </button>
            </div>
        </div>
    </nav>

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