const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const registerLink = document.getElementById('register-link');
const loginLink = document.getElementById('login-link');
const cfInput = document.getElementById('cf-register');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password-register');
const togglePassword = document.getElementById('togglePassword');

registerLink.addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
});

loginLink.addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
});



// Aggiungi event listener per l'input sui campi
cfInput.addEventListener('input', validateCF);
emailInput.addEventListener('input', validateEmail);
passwordInput.addEventListener('input', validatePassword);

function validateCF() {
    const cfValue = cfInput.value;
    const cfRegex = /^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/;

    if (!cfRegex.test(cfValue)) {
        cfInput.setCustomValidity('Il codice fiscale non è valido.');
    } else {
        cfInput.setCustomValidity('');
    }
}

function validateEmail() {
    const emailValue = emailInput.value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailValue)) {
        emailInput.setCustomValidity('L\'email non è valida.');
    } else {
        emailInput.setCustomValidity('');
    }
}

function validatePassword() {
    const passwordValue = passwordInput.value;

    if (passwordValue.length < 6 || !/[A-Z]/.test(passwordValue)) {
        passwordInput.setCustomValidity('La password deve essere lunga almeno 6 caratteri e contenere almeno una lettera maiuscola.');
    } else {
        passwordInput.setCustomValidity('');
    }
}



togglePassword.addEventListener('click', function() {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Cambia l'icona per mostrare/nascondere la password
    togglePassword.classList.toggle('fa-eye-slash');
    togglePassword.classList.toggle('fa-eye');
});