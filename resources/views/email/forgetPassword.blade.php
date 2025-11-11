<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - SIAKAD PEGA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }
        .header {
            background: linear-gradient(135deg, #003366, #004080);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        .content {
            padding: 30px;
            color: #444;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #003366, #004080);
            color: white !important;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(0, 51, 102, 0.2);
            transition: all 0.3s ease;
        }
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 51, 102, 0.3);
        }
        .footer {
            background: #f0f2f5;
            text-align: center;
            padding: 18px;
            font-size: 12px;
            color: #777;
        }
        .highlight {
            background: #e6f0ff;
            padding: 2px 6px;
            border-radius: 4px;
            color: #003366;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1 style="margin: 0; font-size: 26px; font-weight: 600;">SIAKAD PEGA</h1>
            <p style="margin: 8px 0 0; font-size: 16px; opacity: 0.9; font-weight: 300;">SMP Negeri 3 Jember</p>
            <p style="margin: 5px 0 0; font-size: 14px; opacity: 0.85; font-weight: 400;">2025</p>
        </div>

        <!-- Body -->
        <div class="content">
            <h2 style="color: #003366; margin-top: 0; font-size: 22px;">Lupa Kata Sandi Anda?</h2>

            <p style="font-size: 15px; line-height: 1.6;">
                Hai <strong>{{ $user->name ?? 'Pengguna' }}</strong>,<br>
                Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda di <strong>SIAKAD PEGA</strong>.
            </p>

            <p style="font-size: 15px; color: #444; margin: 15px 0;">
                Klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:
            </p>

            <!-- Tombol Reset Password -->
            <div style="text-align: center; margin: 25px 0;">
                <a href="{{ url('/reset-password/' . $token) }}"
                   target="_blank" 
                   class="button">
                    🔒 Atur Ulang Kata Sandi
                </a>
            </div>

            <p style="font-size: 14px; color: #666; background: #f9f9f9; padding: 12px; border-left: 4px solid #003366; margin: 20px 0;">
                Jika Anda tidak meminta pengaturan ulang, abaikan saja email ini.  
                Tautan ini hanya berlaku selama <strong>60 menit</strong>.
            </p>

            <hr style="border: none; border-top: 1px solid #eee; margin: 25px 0;">

            <p style="font-size: 13px; color: #888;">
                Hormat kami,<br>
                <strong>Admin SIAKAD PEGA</strong><br>
                SMP Negeri 3 Jember
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} SIAKAD PEGA — Semua Hak Dilindungi.
        </div>
    </div>
</body>
</html>