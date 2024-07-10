<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .email-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            text-align: center;
        }

        header h1 {
            font-size: 18px;
            color: #888888;
        }

        main p {
            font-size: 16px;
            color: #333333;
            margin: 10px 0;
        }

        main a {
            color: #007bff;
            text-decoration: none;
        }

        main a:hover {
            text-decoration: underline;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <header>
            <h1>FunRun Rotary Purwokerto 2024</h1>
        </header>
        <main>
            <p>Selamat Datang, <a href="mailto:rizqybs24@gmail.com">rizqybs24@gmail.com</a>!</p>
            <p>Terimakasih telah mendaftarkan email anda di FunRun Rotary Purwokerto.</p>
            <p>Verifikasi Email anda dengan click tombol dibawah:</p>
            <a class="btn" href="{{ $url }}">Confirm Email</a>
        </main>
    </div>
</body>
</html>
