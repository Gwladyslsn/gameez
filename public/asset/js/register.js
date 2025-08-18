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
document.addEventListener('DOMContentLoaded', function () {
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
});