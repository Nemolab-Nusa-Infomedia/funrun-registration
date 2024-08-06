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
                    <p class="text-center">Masukan email dan nomor handphone anda</p>
                    <!-- form user -->
                    <form action="{{ route('check-ephone') }}" method="POST" class="mt-5" id="resetPasswordForm">
                        @csrf
                        <div class="form-group text-center mb-3 border-bottom border-light-subtle">
                            <label for="email" class="mb-2 fw-bold">Masukan Email Akun Anda</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukan email anda" required>
                        </div>
                        <div class="form-group text-center mb-3 border-bottom border-light-subtle">
                            <label for="nohp" class="mb-2 fw-bold">Masukan Nomor Handphone Anda</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan nomor handphone anda" required>
                        </div>
                        <div class="d-flex justify-content-between gap-2 mt-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-c6 py-2">Kembali</a>
                            <button type="submit" class="btn btn-c1 text-white py-2">Reset Sandi</button>
                        </div>
                         @if ($errors->has('msg'))
                            <div class="alert alert-danger mt-3">
                                {{ $errors->first('msg') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
