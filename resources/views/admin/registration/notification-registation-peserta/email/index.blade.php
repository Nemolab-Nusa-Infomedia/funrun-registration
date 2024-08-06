<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunRun Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .highlight {
            font-weight: bold;
        }
        .instructions {
            margin-top: 20px;
        }
        .barcode {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
            right: 50%
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $user->name }}</h1>
        <p>
            Anda telah berhasil mendaftar pada FunRun Rotary 2024 dengan pembayaran menggunakan {{ $user->payment_type }}. Terima kasih atas pembayaran Anda. Ini adalah konfirmasi Anda untuk FunRun Rotary Purwokerto 2024.
        </p>
        <p class="highlight">
            Tunjukkan email ini pada saat registrasi ulang di event FunRun dan siapkan kartu Identitas (KTP/KIA/PASPOR) untuk pengambilan GoodieBag Anda
        </p>
        <div class="instructions">
            <p><strong>Pengambilan GoodieBag:</strong> 5 Oktober 2024</p>
            <p><strong>Hari Acara:</strong> 6 Oktober 2024</p>
            <p><strong>Tempat:</strong> Alun-alun Purwokerto</p>
        </div>
        <div class="instructions">
            <h2>Registrasi Ulang acara</h2>
            <p>1. Peserta FunRun melakukan registrasi ulang pada 1 hari sebelum acara atau 5 Oktober 2024</p>
            <p>2. Peserta memperlihatkan email konfirmasi kepada panitia dengan menunjukan barcode yang di kirim ke email pendaftar</p>
            <p>3. Peserta FunRun dapat mengambil GoodieBag setelah berhasil melakukan verifikasi</p>
        </div>
        <h2 style="text-align: center">Nomor Peserta : {{ $user->participant_number }}</h2>
        <div class="barcode" style="display: block; justify-content: center">
            <img src="{{ $message->embed('qrcodes/'.$user->kodeunik.'.png') }}" width="250px" alt="Barcode">
        </div>
        <div class="footer">
            <p>Tunjukkan Barcode ini saat registrasi ulang dan pengambilan GoodieBag</p>
            <p>Thank You, Happy Run Sobat Rotary</p>
        </div>
    </div>
</body>
</html>
