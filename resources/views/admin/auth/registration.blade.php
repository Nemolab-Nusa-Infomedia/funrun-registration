<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Peserta FunRun</title>
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
                    <h2 class="text-center fw-bold" style="font-size: 25px;">REGISTRASI</h2>
                    <p class="text-center">jadilah bagian dari kami dengan cara mendaftar dibawah</p>
                    <!-- form user -->
                    <form action="{{ route('email-validation') }}" method="POST" class="mt-5">
                        @csrf
                        <div class="form-group text-center mb-3 border-bottom border-light-subtle">
                            <label for="email" class="mb-2 fw-bold">Masukkan Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="masukkan email anda" value="{{ old('email') }}" required>
                             @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="form-group text-center mb-3 border-bottom border-light-subtle">
                            <label for="nohp" class="mb-2 fw-bold">Masukkan Nomor Handphone</label>
                            <input type="text" class="form-control" name="phone" placeholder="masukkan nomor handphone anda" required>
                        </div>
                        <div class="form-group text-center mb-4 border-bottom border-light-subtle position-relative">
                            <label for="password" class="mb-2 fw-bold">Buat Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="buat kata sandi" required>
                                @error('password')
                                   <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <i class="fas fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 18px; z-index: 99;"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between gap-2">
                            <a href="https://funrun.rotarypurwokerto.id/" class="btn btn-outline-c6 py-2">Kembali</a>
                            <button type="submit" class="btn btn-c1 text-white py-2">Daftar Akun</button>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-c1 fw-bold"><a href="{{ route('login') }}" class="text-c2">masuk disini</a> jika sudah memiiki akun</span>
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
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            var icon = this;
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
