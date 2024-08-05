<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doorprize</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/registration/css/undian/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <style>
        .undian-image {
            position: relative;
        }
        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center;
            display: none;
        }
        .nomor-pemenang {
            font-size: 2rem;
            font-weight: bold;
        }
        .nama-pemenang, .alamat-pemenang {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center rounded-5">
        <div class="box mt-3 mb-3">
            <div class="undian-image">
                <img src="{{ asset('assets/registration/img/undian.png') }}" alt="">
                <div class="text-overlay" id="pemenang-undian">
                    <span id="nomor-peserta" class="nomor-pemenang">JHJSDHJSDHJ</span>
                    <span id="nama-peserta" class="nama-pemenang">SDHJHHD</span>
                    <span id="alamat-peserta" class="alamat-pemenang"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4 gap-3">
        <button id="hangus" class="btn btn-danger">Hangus?</button>
        <button id="undi" class="btn btn-info">Undi Nomor Peserta</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#undi').click(function() {
                $('#pemenang-undian').hide(); // Sembunyikan informasi pemenang

                // Simulasi efek pengacakan
                var interval = setInterval(function() {
                    var randomNumber = Math.floor(Math.random() * 1000000); // Angka acak
                    $('#nomor-peserta').text(randomNumber.toString().padStart(6, '0')); // Tampilkan angka dengan 6 digit
                }, 50); // Update setiap 50ms

                $.ajax({
                    url: '{{ route('mulai-undi') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        clearInterval(interval); // Hentikan efek pengacakan
                        if (response) {
                            $('#nomor-peserta').text('#' + response.participant_number);
                            $('#nama-peserta').text(response.name);
                            $('#alamat-peserta').text(response.kecamatan + ', ' + response.kabupaten); // pastikan field address ada di database
                            $('#pemenang-undian').show(); // Tampilkan informasi pemenang
                            $('#undi').addClass('d-none');
                        } else {
                            alert('Tidak ada peserta yang terdaftar.');
                        }
                    },
                    error: function() {
                        clearInterval(interval); // Hentikan efek pengacakan
                        alert('Terjadi kesalahan saat melakukan undian.');
                    }
                });
            });

            $('#hangus').click(function() {
                var participantNumber = $('#nomor-peserta').text().replace('#', '');
                $.ajax({
                    url: '{{ route('hangus-undi') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        participant_number: participantNumber
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#pemenang-undian').hide();
                        $('#undi').removeClass('d-none');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat menghanguskan peserta.');
                    }
                });
            });
        });
    </script>
</body>
</html>
