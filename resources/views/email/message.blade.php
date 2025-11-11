<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - SIAKAD PEGA</title>
</head>
<body style="margin:0; padding:0; background:#f5f7fa; font-family: 'Poppins', Arial, sans-serif; color:#333;">

    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; margin:auto; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 15px rgba(0,0,0,0.05);">
        <!-- Header -->
        <tr>
            <td style="background:#003366; padding:1.8rem; text-align:center;">
                <img src="{{ asset('style/assets/logo-sekolah.png') }}" alt="Logo Sekolah" width="70" height="70" style="margin-bottom:10px; border-radius:8px; background:#fff; padding:6px;">
                <h1 style="color:#ffffff; margin:0; font-size:22px;">SIAKAD PEGA</h1>
                <p style="color:#bcd4f7; margin:0;">SMP Negeri 3 Jember</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding:2rem;">
                <h2 style="color:#003366; margin-top:0;">Lupa Kata Sandi Anda?</h2>

                <p style="font-size:15px; line-height:1.6; color:#444;">
                    Hai <strong>{{ $user->name ?? 'Pengguna' }}</strong>,<br>
                    Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda di <strong>SIAKAD PEGA</strong>.
                </p>

                <p style="font-size:15px; color:#444;">
                    Klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:
                </p>

                <div style="text-align:center; margin:2rem 0;">
                    <a href="{{ $url }}" target="_blank"
                       style="background:#003366; color:white; text-decoration:none; padding:12px 26px; 
                              border-radius:8px; font-weight:600; letter-spacing:0.5px; display:inline-block;">
                        🔒 Atur Ulang Kata Sandi
                    </a>
                </div>

                <p style="font-size:14px; color:#666;">
                    Jika Anda tidak meminta pengaturan ulang, abaikan saja email ini.  
                    Tautan ini hanya berlaku selama <strong>60 menit</strong>.
                </p>

                <hr style="border:none; border-top:1px solid #eee; margin:2rem 0;">

                <p style="font-size:13px; color:#888;">
                    Hormat kami,<br>
                    <strong>Admin SIAKAD PEGA</strong><br>
                    SMP Negeri 3 Jember
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background:#f0f2f5; text-align:center; padding:1rem; font-size:12px; color:#888;">
                © {{ date('Y') }} SIAKAD PEGA — Semua Hak Dilindungi.
            </td>
        </tr>
    </table>

</body>
</html>
