<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode OTP Reset Password</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background-color: #F5F5F7; /* cloud-white */
            color: #2E2E2E; /* deep-graphite */
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            border: 1px solid #E5E7EB;
        }
        h1 {
            font-family: 'Poppins', Arial, sans-serif;
            color: #2E2E2E; /* deep-graphite */
            font-size: 24px;
        }
        p {
            line-height: 1.6;
            color: #64748B; /* soft-navy */
        }
        .otp-panel {
            background-color: #F5F5F7; /* cloud-white */
            border-left: 4px solid #5EAAA8; /* muted-teal */
            padding: 20px;
            margin: 30px 0;
            text-align: center;
            border-radius: 4px;
        }
        .otp-code {
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 8px;
            color: #5EAAA8; /* muted-teal */
            font-family: 'Poppins', Arial, sans-serif;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #64748B; /* soft-navy */
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kode OTP Reset Password</h1>
        <p>Halo,</p>
        <p>Gunakan kode berikut untuk mengatur ulang password Anda. Jangan berikan kode ini kepada siapapun.</p>
        
        <div class="otp-panel">
            <p style="margin-top: 0; margin-bottom: 10px; font-size: 16px;">Kode OTP Anda:</p>
            <div class="otp-code">
                {{ $otp }}
            </div>
        </div>

        <p>Kode ini hanya berlaku selama 10 menit. Jika Anda tidak meminta reset password, abaikan email ini.</p>
        <p>Terima kasih,<br>Tim {{ config('app.name') }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>
