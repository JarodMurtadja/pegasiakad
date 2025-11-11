<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role</title>
    <link rel="icon" href="{{ asset('style/assets/logo-sekolah.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9d2abd8931.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(160deg, #e6f0ff 0%, #f8f9fa 100%);
            font-family: 'Segoe UI', sans-serif;
            padding: 0;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-container {
            max-width: 600px;
            width: 90%;
            margin: 40px auto;
            text-align: center;
        }

        .logo-section img {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
            object-fit: contain;
        }

        .logo-section h1 {
            font-size: 1.8rem;
            color: #2c3e50;
            margin: 0 0 10px;
        }

        .logo-section h2 {
            font-size: 1.3rem;
            color: #7f8c8d;
            margin: 0;
        }

        .form-section .intro {
            font-size: 1.4rem;
            font-weight: 600;
            color: #007bff;
            margin: 20px 0 10px;
        }

        .form-section p:nth-child(2) {
            color: #6c757d;
            margin-bottom: 30px;
        }

        /* Reset default image behavior */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Role Grid */
        .role-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 24px;
            justify-items: center;
            margin-top: 24px;
        }

        .custom-radio {
            position: relative;
            display: block;
            text-align: center;
            cursor: pointer;
        }

        .custom-radio input[type="radio"] {
            display: none;
        }

        .role-box {
            width: 130px;
            height: 130px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 2px solid transparent;
            border-radius: 12px;
            background-color: #f8f9fa;
            transition: all 0.25s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }

        .role-box:hover {
            background-color: #eef5ff;
            border-color: #007bff;
            box-shadow: 0 5px 12px rgba(0,123,255,0.15);
        }

        .custom-radio input[type="radio"]:checked + .role-box {
            border-color: #007bff;
            background-color: #d6e9ff;
            transform: scale(1.03);
        }

        .role-box i {
            font-size: 40px;
            color: #007bff;
        }

        .role-box p {
            margin: 12px 0 0;
            font-size: 14px;
            font-weight: 500;
            color: #2c3e50;
            text-align: center;
        }

        .footer {
            padding: 8px 0;
            background-color: #007bff;
            text-align: center;
            margin-top: auto;
        }

        .footer p {
            margin: 0;
            font-size: 12px;
            color: white;
        }

        /* Responsif */
        @media (max-width: 576px) {
            .login-container {
                margin: 20px auto;
            }
            .logo-section img {
                width: 70px;
            }
            .role-box {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-section">
            <img src="{{ asset('style/assets/log-logo.png') }}" alt="Logo">
            <h1>Sistem Informasi Akademik</h1>
            <h2>SMP Negeri 3 Jember</h2>
        </div>
        <div class="form-section">
            <p class="intro">Pilih Hak Akses</p>
            <p>Pilih Hak Akses Untuk Masuk Ke Akun Anda</p>

            @if (count($roles) > 0)
                <form id="roleForm" action="{{ route('post_role') }}" method="POST">
                    @csrf
                    <div class="role-grid">
                        @foreach ($roles as $role)
                            <label class="custom-radio">
                                <input 
                                    type="radio" 
                                    name="role" 
                                    value="{{ $role }}"
                                    onchange="this.form.submit();"
                                >
                                <div class="role-box">
                                    @if ($role === 'Owner')
                                        <i class="fa-solid fa-user-gear"></i>
                                    @elseif ($role === 'Admin')
                                        <i class="fa-solid fa-users-gear"></i>
                                    @elseif ($role === 'Guru')
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    @elseif ($role === 'Wali Kelas')
                                        <i class="fa-solid fa-user-group"></i>
                                    @endif
                                    <p>{{ $role }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </form>
            @else
                <div style="background: #fff3f3; border-radius: 12px; padding: 20px; margin: 20px 0;">
                    <h5 style="color: #d32f2f; margin: 0 0 15px; font-weight: 600;">
                        Akun Anda Saat Ini Belum Memiliki Hak Akses
                    </h5>
                    <p style="color: #666; margin-bottom: 15px;">
                        Silahkan hubungi admin untuk informasi lebih lanjut.
                    </p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="padding: 6px 24px; border-radius: 50px;">
                            Keluar
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>&copy; Dibuat oleh Humas PEGA | 2025/2026 | SMP Negeri 3 Jember</p>
    </div>
</body>
</html>