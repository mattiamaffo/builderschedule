const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const registerLink = document.getElementById('register-link');
const loginLink = document.getElementById('login-link');
const cfInput = document.getElementById('cf-register');
const emailInput = document.getElementById('email');
const password = document.getElementById('password');
const passwordInput = document.getElementById('password-register');
const togglePasswordd = document.getElementById('togglePassword-');
const togglePassword = document.getElementById('togglePassword');

const recoverLink = document.getElementById('recover-link');
const recoverForm = document.getElementById('recover-form');
const cfRecover = document.getElementById('cf-recover');

registerLink.addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
    recoverForm.style.display='none';
});

loginLink.addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
    recoverForm.style.display='none';
});

recoverLink.addEventListener('click', function(e) {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'none';
    recoverForm.style.display='block';
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


togglePasswordd.addEventListener('click', function() {
    const password = document.getElementById('password'); // Seleziona l'input della password
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Cambia l'icona per mostrare/nascondere la password
    togglePasswordd.classList.toggle('fa-eye-slash');
    togglePasswordd.classList.toggle('fa-eye');
});

/// recover pw///