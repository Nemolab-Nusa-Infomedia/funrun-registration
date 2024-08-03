<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undian Doorprize Funrun Rotary Purwokerto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">FUNRUN ROTARY PURWOKERTO</h1>
        <div class="text-center d-none" id="pemenang-undian">
            <h3>Pemenang Undian</h3>
            <h1 id="nomor-peserta"></h1>
            <h3 id="nama-peserta"></h3>
            <h4 id="alamat-peserta"></h4>
            <button id="hangus" class="btn btn-danger mt-5">Hangus?</button>
        </div>
        <button id="undi" class="btn btn-info mx-auto d-block">Undi Nomor Peserta</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#undi').click(function() {
                $.ajax({
                    url: '{{ secure_url('undian-doorprize') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response) {
                            $('#nomor-peserta').text('#' + response.participant_number);
                            $('#nama-peserta').text(response.name);
                            $('#alamat-peserta').text(response.kecamatan + ', ' + response.kabupaten); // pastikan field address ada di database
                            $('#pemenang-undian').removeClass('d-none');
                            $('#undi').addClass('d-none');
                        } else {
                            alert('Tidak ada peserta yang terdaftar.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat melakukan undian.');
                    }
                });
            });

            $('#hangus').click(function() {
                var participantNumber = $('#nomor-peserta').text().replace('#', '');
                $.ajax({
                    url: '{{ secure_url('undian-doorprize-hangus') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        participant_number: participantNumber
                    },
                    success: function(response) {
                        alert(response.message);
                        $('#pemenang-undian').addClass('d-none');
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
