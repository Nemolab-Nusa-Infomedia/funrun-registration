<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Scan FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/notif-pembayaran/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/loading/css/main.css') }}">

    <style>
        @media (max-width: 768px) {
            th, td {
                display: inline;
                text-align: left;
            }
            th {
                margin-top: 10px;
            }
            td {
                margin-bottom: 10px;
            }
        }
    </style>
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
                <h3 class="fw-bold text-c1 text-center mb-3">SCAN PESERTA BERHASIL</h3>

                <img src="{{ asset('assets/registration/img/scan-success.png') }}" class="mx-auto mb-3" style="width: 500px" alt="">

                <table class="d-flex justify-content-center mx-auto mb-3">
                    <tbody>
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <td>: {{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Domisili</th>
                            <td>: {{ $user->kabupaten }}</td>
                        </tr>
                        <tr>
                            <th>Size Jersey</th>
                            <td>: {{ $user->size }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pembayaran</th>
                            <td>: {{ $user->waktu_pembayaran }}</td>
                        </tr>
                        <tr>
                            <th>Via Pembayaran</th>
                            <td>: {{ $user->payment_type }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>: {{ $user->total }}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>:
                                @if(Auth::user()->status == 'settlement')
                                    <span class="btn btn-success"> Lunas</span>
                                @elseif(Auth::user()->status == 'pending')
                                    <span class="btn btn-warning"> Pending</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status Verifikasi data</th>
                            <td>: {{ $user->verification_admin }}</td>
                        </tr>
                        <tr>
                            <th>Terverifikasi Oleh</th>
                            <td>: {{ $user->by_admin }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row mx-auto">
                    <a href="{{ route('scan') }}" class="btn btn-c1 text-white fw-bold" style="font-size: 15px">Kembali ke halaman Scan</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/loading/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
