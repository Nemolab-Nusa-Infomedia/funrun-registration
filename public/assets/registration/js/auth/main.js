document.addEventListener('DOMContentLoaded', function() {
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

    document.querySelectorAll('.togglePassword').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const passwordField = this.previousElementSibling;
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.classList.remove('ri-eye-line');
                this.classList.add('ri-eye-off-line');
            } else {
                passwordField.type = 'password';
                this.classList.remove('ri-eye-off-line');
                this.classList.add('ri-eye-line');
            }
        });
    });
});
