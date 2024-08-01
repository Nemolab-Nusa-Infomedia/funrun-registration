<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/notif-pembayaran/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/loading/css/main.css') }}">
</head>
  <body>
    <div id="loading-container">
        <div class="loader">
          <img src="{{ asset('assets/registration/img/loading/sepatu1.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu2.png') }}" alt="Loading" class="shoe">
          <img src="{{ asset('assets/registration/img/loading/sepatu3.png') }}" alt="Loading" class="shoe">
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center notif-pembayaran">
        <div class="box mt-3 p-3">
            <div class="row mx-auto">
                <h3 class="fw-bold text-c1 text-center mb-3">PEMBAYARAN ANDA BERHASIL</h3>

                <img src="{{ asset('assets/registration/img/register-success.png') }}" class="mx-auto mb-3" style="width: 500px" alt="">

                <p class="text-center">pembayaran anda <b class="text-c1">telah berhasil dan sukses</b>, untuk melihat nomor peserta dan riwayat transaksi klik tombol dibawah</p>

                <div class="row mx-auto">
                    <a href="{{ route('profile') }}" class="btn btn-c1 text-white fw-bold" style="font-size: 15px">Buka Profil anda</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
