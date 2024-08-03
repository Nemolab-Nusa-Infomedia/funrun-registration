<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Peserta FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/auth/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/loading/css/main.css') }}">

    <script src="https://kit.fontawesome.com/0a267e6f70.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="loading-container">
        <div class="loader">
          <img src="{{ asset('assets/registration/img/loading/sepatu1.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu2.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu3.png') }}" alt="Loading" class="shoe">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row p-3 mx-auto">
            <div class="col-12 col-md-7 d-md-block p-0 bg-auth">
                <div class="bg-image" style="background-image: url('{{ asset('assets/admin/img/auth/auth-bg.png') }}'); border-radius: 15px;"></div>
            </div>

            <div class="col-12 col-md-5 login-form-container box">
                <div class="login-form">
                    <h2 class="text-center fw-bold" style="font-size: 25px;">Reset Password</h2>
                    <p class="text-center">Selamat datang kembali sobat FunRun Rotary</p>
                    <p class="text-center">Masukan kata sandi baru anda</p>
                    <!-- form user -->
                    <form action="" method="POST" class="mt-5" id="resetPasswordForm">
                        @csrf
                        <div class="form-group text-center mb-4 border-bottom border-light-subtle">
                            <label for="password" class="mb-2 fw-bold">Masukan Email Akun Anda</label>
                            <input type="email" class="form-control" name="email" placeholder="masukan kata sandi baru" required>
                        </div>
                        <div class="form-group text-center mb-4 border-bottom border-light-subtle">
                            <label for="password" class="mb-2 fw-bold">Masukan Kata Sandi Baru</label>
                            <div class="input-group position-relative">
                                <input type="password" id="password" class="form-control" name="password" placeholder="masukan kata sandi baru" required>
                                <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 18px; z-index: 99;"></i>
                            </div>
                        </div>
                        <div class="form-group text-center mb-2 border-bottom border-light-subtle">
                            <label for="konfirmasiPassword" class="mb-2 fw-bold">Konfirmasi Kata Sandi Baru</label>
                            <div class="input-group position-relative">
                                <input type="password" id="konfirmasiPassword" class="form-control" name="konfirmasiPassword" placeholder="konfirmasi kata sandi baru" required>
                                <i class="fas fa-eye" id="toggleKonfirmasiPassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 18px; z-index: 99;"></i>
                            </div>
                            <small id="error-message" class="form-text text-danger d-none">Kata sandi tidak sama</small>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <a href="#" class="btn btn-outline-c6 py-2">Kembali</a>
                            <button type="submit" class="btn btn-c1 text-white py-2">Reset Sandi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var konfirmasiPassword = document.getElementById('konfirmasiPassword').value;
            var errorMessage = document.getElementById('error-message');
            var passwordField = document.getElementById('password');
            var konfirmasiPasswordField = document.getElementById('konfirmasiPassword');

            if (password !== konfirmasiPassword) {
                event.preventDefault(); // Prevent form submission
                errorMessage.classList.remove('d-none');
                passwordField.classList.add('border', 'border-danger');
                konfirmasiPasswordField.classList.add('border', 'border-danger');
            } else {
                errorMessage.classList.add('d-none');
                passwordField.classList.remove('border', 'border-danger');
                konfirmasiPasswordField.classList.remove('border', 'border-danger');
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            var icon = this;
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggleKonfirmasiPassword').addEventListener('click', function() {
            var konfirmasiPasswordField = document.getElementById('konfirmasiPassword');
            var type = konfirmasiPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            konfirmasiPasswordField.setAttribute('type', type);
            var icon = this;
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
