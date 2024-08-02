<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f2f2f2; padding: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" max-width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td align="center" style="font-size: 18px; color: #888888; padding-bottom: 10px;">
                            FunRun Rotary Purwokerto 2024
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 16px; color: #333333; text-align: center;">
                            <p>Selamat Datang, <a href="mailto:{{ $email }}" style="color: #007bff; text-decoration: none;">{{ $email }}</a>!</p>
                            <p>Terimakasih telah mendaftarkan email anda di FunRun Rotary Purwokerto.</p>
                            <p>Verifikasi Email anda dengan klik tombol di bawah:</p>
                            <a href="{{ $url }}" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px; cursor: pointer; border: none;">Confirm Email</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
