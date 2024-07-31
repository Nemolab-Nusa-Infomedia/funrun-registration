const daftarBtn = document.getElementById('daftarBtn');
const masukBtn = document.getElementById('masukBtn');
const registrationForm = document.getElementById('registrationForm');
const loginForm = document.getElementById('loginForm');
const toggleIndicator = document.querySelector('.toggle-indicator');

daftarBtn.addEventListener('click', () => {
    daftarBtn.classList.add('active');
    masukBtn.classList.remove('active');
    registrationForm.classList.add('active');
    loginForm.classList.remove('active');
    toggleIndicator.style.left = '0';
});

masukBtn.addEventListener('click', () => {
    masukBtn.classList.add('active');
    daftarBtn.classList.remove('active');
    loginForm.classList.add('active');
    registrationForm.classList.remove('active');
    toggleIndicator.style.left = '50%';
});

function togglePassword() {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('togglePassword');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('ri-eye-line');
        eyeIcon.classList.add('ri-eye-off-line');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('ri-eye-off-line');
        eyeIcon.classList.add('ri-eye-line');
    }
}

function togglePasswordlogin() {
    const passwordField = document.getElementById('passwordlogin');
    const eyeIcon = document.getElementById('togglePasswordlogin');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('ri-eye-line');
        eyeIcon.classList.add('ri-eye-off-line');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('ri-eye-off-line');
        eyeIcon.classList.add('ri-eye-line');
    }
}
