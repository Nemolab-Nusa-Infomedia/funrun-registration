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
    <div class="container-fluid funrun-registration">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mb-5">
                    <h3 class="text-center fw-bold mt-5 mb-3">Pendaftaran Event FunRun Rotary <br> Purwokerto 2024</h3>
                    <div class="row col-12 col-md-12 mx-auto">
                        <div class="card p-3 mb-3 gradient-background kaca">
                            <div class="card-header" style="background: transparent; border: none; z-index: 2">
                                <h3 class="text-dark">Registration</h3>
                                <span class="border-bottom border-dark border-3 rounded-2" style="width: 120px"></span>
                            </div>
                            <div class="card-body" style="z-index: 2">
                                <div class="row col-12 col-md-12 mx-auto">
                                    <img src="{{ asset('assets/registration/img/register-failed.png') }}" class="mx-auto" style="width: 300px" alt="">
                                    <h3 class="fw-bold text-center">Yah Pembayaran Kamu Gagal</h3>
                                    <div class="col-12 col-md-12">
                                        <div class="text-center mb-3">
                                            <span>Silakan coba lagi pembayaran untuk melakukan pendaftaran</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="text-center mb-3">
                                            <a href="" class="btn btn-submit">Ulangi Pembayaran</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
