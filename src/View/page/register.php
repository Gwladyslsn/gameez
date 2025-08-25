<?php


use App\Services\Auth;

$auth = new Auth();

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['form_type'] ?? '';

    if ($formType === 'sign') {
        // Inscription
        $auth->signin();
    } elseif ($formType === 'log') {
        // Connexion
        $auth->login();
    }
}

require_once ROOTPATH . "src/View/template/header.php";


?>

<div class="auth-container">
    <!-- Visual Left Side -->
    <div class="auth-visual">
        <div class="visual-content">
            <div class="logo-large">🎲</div>
            <h1 class="visual-title">GameLibrary</h1>
            <p class="visual-subtitle">
                Rejoignez la plus grande communauté de passionnés de jeux de société
            </p>

            <div class="visual-features">
                <div class="feature-item">
                    <div class="feature-icon">📚</div>
                    <div>
                        <strong>5000+ jeux référencés</strong>
                        <div style="font-size: 0.9rem; opacity: 0.8;">Découvrez votre prochain coup de cœur</div>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">⭐</div>
                    <div>
                        <strong>Avis authentiques</strong>
                        <div style="font-size: 0.9rem; opacity: 0.8;">Notes et commentaires de vrais joueurs</div>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <div>
                        <strong>Recommandations</strong>
                        <div style="font-size: 0.9rem; opacity: 0.8;">Suggestions personnalisées selon vos goûts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms Right Side -->
    <div class="auth-forms">
        <!-- Form Toggle -->
        <div class="form-toggle">
            <button class="toggle-btn active" onclick="showLogin()">Connexion</button>
            <button class="toggle-btn" onclick="showRegister()">Inscription</button>
        </div>

        <!-- CONNEXION -->
        <div id="loginForm" class="form-container active" >
            <h2 class="form-title">Bon retour !</h2>
            <p class="form-subtitle">Connectez-vous pour retrouver votre collection</p>

            <form method="post" id="form_log" action="/login">
                <input type="hidden" name="form_type" value="log">
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" id="loginEmail" name="user_mail" class="form-input" placeholder="votre@email.com" required>
                </div>

                <div class="form-group">
                    <label for="loginPassword">Mot de passe</label>
                    <input type="password" id="loginPassword" name="user_password" class="form-input" placeholder="••••••••" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Se souvenir de moi</label>
                </div>

                <button type="submit" class="submit-btn" id="btn_login">Se connecter</button>
            </form>

            <div class="divider">
                <span>ou</span>
            </div>
            <div class="forgot-password">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </div>

        <!-- INSCRIPTION -->
        <div id="registerForm" class="form-container">
            <h2 class="form-title">Créer un compte</h2>
            <p class="form-subtitle">Rejoignez notre communauté de joueurs passionnés</p>

            <div id="feedback"></div><br>

            <form method="post" id="form_sign">
                <input type="hidden" name="form_type" value="sign">
                <div class="form-row">
                    <div class="form-group">
                        <label for="user_name">Prénom</label>
                        <input type="text" id="user_name" name="user_name" class="form-input" placeholder="John">
                    </div>
                    <div class="form-group">
                        <label for="user_lastname">Nom</label>
                        <input type="text" id="user_lastname" name="user_lastname" class="form-input" placeholder="Doe">
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_mail">Email</label>
                    <input type="email" id="user_mail_sign" name="user_mail" class="form-input" placeholder="votre@email.com">
                </div>

                <div class="form-group">
                    <label for="user_dob">Date de naissance</label>
                    <input type="date" id="user_dob" name="user_dob" class="form-input" placeholder="jj/mm/aaaa">
                </div>

                <div class="form-group">
                    <label for="user_password">Mot de passe</label>
                    <input type="password" id="user_password_sign" name="user_password" class="form-input" placeholder="••••••••">
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" id="confirmPassword" class="form-input" placeholder="••••••••">
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>
                    </label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="newsletter">
                    <label for="newsletter">
                        Je souhaite recevoir les nouveautés et recommandations par email
                    </label>
                </div>

                <button class="submit-btn" id="btn_sign">Créer mon compte</button>

                <div class="forgot-password">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$page_script = '/asset/js/register.js';
require_once ROOTPATH . "src/View/template/footer.php"; ?>