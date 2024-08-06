<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview Certificate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/preview-certificate/main.css') }}">
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

    <div class="container d-flex justify-content-center align-items-center rounded-5">
        <div class="box mt-3 mb-3">
            <div class="certificate-image">
                <img src="{{ asset('assets/registration/img/sertificate/sertificate.png') }}" alt="">
                <div class="text-overlay">
                    <span>{{ $name }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{-- <a href="{{ route('generate-certificate', ['name'=>$name]) }}" id="btnSertifikat" class="btn btn-primary py-2 px-4">Download Certificate</a> --}}
        {{-- <a href="#" id="btnSertifikat" class="btn btn-primary py-2 px-4">Download Certificate</a> --}}
        <a href="{{ route('generate-certificate') }}" class="btn btn-primary py-2 px-4">Download Certificate</a>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Waktu target dalam WIB (6 Oktober 2024 jam 07:00 pagi WIB)
            const targetDateWIB = new Date('2024-10-06T07:00:00+07:00'); // +07:00 adalah offset untuk WIB

            // Waktu saat ini dalam WIB
            const now = new Date();
            const localTimeOffset = now.getTimezoneOffset() * 60000; // Offset waktu lokal dalam ms
            const WIBOffset = 7 * 60 * 60 * 1000; // Offset WIB dalam ms
            const localNowWIB = new Date(now.getTime() + localTimeOffset + WIBOffset);

            // Mendapatkan tombol sertifikat
            const btnSertifikat = document.getElementById('btnSertifikat');

            // Memeriksa apakah waktu saat ini sudah melewati waktu target
            btnSertifikat.addEventListener('click', function(event) {
                if (localNowWIB < targetDateWIB) {
                    event.preventDefault(); // Mencegah aksi klik
                    alert('Sertifikat belum bisa di Download, Sertificate dapat di download pada tanggal 6 Oktober 2024 jam 07:00 WIB.'); // Pesan peringatan
                } else {
                    // Lakukan aksi yang diinginkan jika waktu sudah melewati target
                    // Misalnya, arahkan ke halaman sertifikat
                    window.location.href = 'URL_KE_SERTIFIKAT';
                }
            });
        });
    </script> --}}
  </body>
</html>
