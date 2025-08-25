function showLogin() {
    document.getElementById('loginForm').classList.add('active');
    document.getElementById('registerForm').classList.remove('active');

    document.querySelectorAll('.toggle-btn')[0].classList.add('active');
    document.querySelectorAll('.toggle-btn')[1].classList.remove('active');
}

function showRegister() {
    document.getElementById('registerForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');

    document.querySelectorAll('.toggle-btn')[1].classList.add('active');
    document.querySelectorAll('.toggle-btn')[0].classList.remove('active');
}

// Animation pour les formulaires
document.addEventListener('DOMContentLoaded', function (e) {
    e.preventDefault();
    const inputs = document.querySelectorAll('.form-input');

    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function () {
            if (this.value === '') {
                this.parentElement.classList.remove('focused');
            }
        });
    });


    /* INSCRIPTION */
    const userNameInput = document.getElementById('user_name');
    const userLastnameInput = document.getElementById('user_lastname');
    const userEmailSignInput = document.getElementById('user_mail_sign');
    const userPasswordSignInput = document.getElementById('user_password_sign');
    const submitBtnSign = document.getElementById('btn_sign');
    const feedback = document.getElementById('feedback');
    const formSign = document.getElementById('form_sign');

    submitBtnSign.addEventListener('click', function (e){
        e.preventDefault();

        //nettoyage input
        let userName = userNameInput.value.trim();
        let userLastname = userLastnameInput.value.trim();
        let userEmailSign = userEmailSignInput.value.trim();
        let PasswordSign = userPasswordSignInput.value.trim();

        //Stock erreurs
        const errors = {};

        //Vérification des champs
        if (userName === "") {
            errors['user_name'] = "Le champ Prénom ne doit pas etre vide."
        }
        if (userLastname === "") {
            errors['user_lastname'] = "Le champ Nom ne doit pas etre vide."
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (userEmailSign === "") {
            errors['user_mail_sign'] = "Le champ Mail ne doit pas etre vide."
        } else if (!emailRegex.test(userEmailSign)) {
            errors['user_mail_sign'] = "Le format de l'adresse mail est invalide."
        }

        const specialCharRegex = /[^A-Za-z0-9]/;
        if (PasswordSign === "") {
            errors['PasswordSign'] = "Le champ Mot de passe ne doit pas etre vide."
        } else if (PasswordSign.length < 9) {
            errors['PasswordSign'] = "Le mot de passe doit contenir au moins 9 caractères."
        } else if (!specialCharRegex.test(PasswordSign)) {
            errors['PasswordSign'] = "Le mot de passe doit contenir au moins un caractère special."
        }

        //Afficher message si erreur
        if (Object.keys(errors).length > 0) {
            feedback.innerHTML = '';

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger';

            const ul = document.createElement('ul');
            ul.style.listStyle = 'none';
            ul.style.padding = '0';

            for (let key in errors) {
                const li = document.createElement('li');
                li.textContent = errors[key];
                li.style.color = 'red';
                ul.appendChild(li);
            }

            alertDiv.appendChild(ul);
            feedback.appendChild(alertDiv);

            console.log("Erreurs de validation côté client :", errors);
        } else {
            console.log('Aucune erreur de validation côté client. Formulaire soumis.');
            formSign.submit();
        }
    })

    /* INSCRIPTION */
    const formLog = document.getElementById('form_log');
    const userMailLogInput = document.getElementById('loginEmail');
    const userPasswordLogInput = document.getElementById('loginPassword');
    const submitBtnLog = document.getElementById('btn_login');

    submitBtnLog.addEventListener('click', function (e) {
        e.preventDefault();

        // Nettoyage input
        let MailLog = userMailLogInput.value.trim();
        let PasswordLog = userPasswordLogInput.value.trim();

        // Stock erreurs
        const errors = {};

        // Vérification des champs
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (MailLog === "") {
            errors['user_mail_log'] = "Le champ Mail ne doit pas etre vide."
        } else if (!emailRegex.test(MailLog)) {
            errors['user_mail_log'] = "Le format de l'adresse mail est invalide."
        }

        if (PasswordLog === "") {
            errors['PasswordLog'] = "Le champ Mot de passe ne doit pas etre vide."
        }

        //Afficher message si erreur
        if (Object.keys(errors).length > 0) {
            feedback.innerHTML = '';

            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-danger';

            const ul = document.createElement('ul');
            ul.style.listStyle = 'none';
            ul.style.padding = '0';

            for (let key in errors) {
                const li = document.createElement('li');
                li.textContent = errors[key];
                li.style.color = 'red';
                ul.appendChild(li);
            }

            alertDiv.appendChild(ul);
            feedback.appendChild(alertDiv);

            console.log("Erreurs de validation côté client :", errors);
        } else {
            console.log('Aucune erreur de validation côté client. Formulaire soumis.');
            formLog.submit();
        }

    });




});