<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/auth/main.css') }}">
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

    <div class="container d-flex justify-content-center align-items-center notif-verifyEmail">
        <div class="box mt-3 p-3">
            <div class="row mx-auto">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <h3 class="fw-bold text-c1 text-center mb-3">KONFIRMASI EMAIL PENDAFTARAN</h3>

                <img src="{{ asset('assets/registration/img/email-notification.png') }}" class="mx-auto mb-3" style="width: 500px" alt="">

                <p class="text-center">email verifikasi anda telah dikirimkan ke email anda, silahka klik tautan pada email <span class="text-c1">{{ $email }}</span> untuk melakukan verisfikasi email.</p>

                <div class="row mx-auto">
                    <form action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <button id="resendLink" type="submit" class="btn btn-c1 text-white fw-bold" style="font-size: 15px">Kirim Ulang Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const resendLink = document.getElementById('resendLink');
            let countdownTimer;

            resendLink.addEventListener('click', function (event) {
                event.preventDefault(); // Menghindari navigasi
                if (resendLink.classList.contains('disabled')) return;

                // Disable link and start countdown
                resendLink.classList.add('disabled');
                startCountdown(60); // 60 seconds countdown
            });

            function startCountdown(seconds) {
                let remainingTime = seconds;
                updateLinkText(remainingTime);

                countdownTimer = setInterval(function () {
                    remainingTime--;
                    if (remainingTime <= 0) {
                        clearInterval(countdownTimer);
                        resendLink.classList.remove('disabled');
                        resendLink.textContent = 'Kirim Ulang Link';
                    } else {
                        updateLinkText(remainingTime);
                    }
                }, 1000);
            }

            function updateLinkText(seconds) {
                resendLink.textContent = `Kirim Ulang Link (${seconds}s)`;
            }
        });
    </script>
  </body>
</html>
