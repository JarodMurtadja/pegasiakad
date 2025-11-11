<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Ulang Kata Sandi - SIAKAD PEGA</title>
    <style>
        :root {
            --primary: #003366;
            --secondary: #004080;
            --bg-light: #e6f0ff;
            --bg-dark: #121212;
            --card-light: white;
            --card-dark: #1e1e1e;
            --text-light: #333;
            --text-dark: #f0f0f0;
            --border-light: #dee2e6;
            --border-dark: #333;
            --shadow-light: rgba(0, 0, 0, 0.05);
            --shadow-dark: rgba(0, 0, 0, 0.3);
            --input-bg-light: #fafbfc;
            --input-bg-dark: #2d2d2d;
            --btn-hover: rgba(0, 51, 102, 0.1);
        }

        [data-theme="dark"] {
            --bg-light: #121212;
            --bg-dark: #000;
            --card-light: #1e1e1e;
            --card-dark: #121212;
            --text-light: #f0f0f0;
            --text-dark: #ffffff;
            --border-light: #333;
            --border-dark: #555;
            --shadow-light: rgba(0, 0, 0, 0.3);
            --shadow-dark: rgba(0, 0, 0, 0.5);
            --input-bg-light: #2d2d2d;
            --input-bg-dark: #1e1e1e;
            --btn-hover: rgba(0, 51, 102, 0.2);
        }

        body {
            background: var(--bg-light);
            font-family: 'Poppins', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100dvh;
            margin: 0;
            padding: 20px;
            transition: background 0.5s ease;
            position: relative;
            overflow: hidden;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            opacity: 0.5;
            animation: float 8s infinite ease-in-out;
        }

        @keyframes float {
            0% { transform: translate(0px, 0px) rotate(0deg); }
            50% { transform: translate(10px, 10px) rotate(180deg); }
            100% { transform: translate(0px, 0px) rotate(360deg); }
        }

        .login-container {
            background: var(--card-light);
            border-radius: 20px;
            box-shadow: 0 20px 40px var(--shadow-light);
            padding: 40px 30px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
            transition: all 0.5s ease;
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .login-header h2 {
            color: var(--primary);
            font-weight: 700;
            font-size: 26px;
            margin: 0;
            position: relative;
            display: inline-block;
            transition: color 0.3s ease;
        }

        .login-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
            transition: all 0.3s ease;
        }

       .form-group {
    position: relative;
    margin-bottom: 25px;
    max-width: 350px; 
    width: 100%;
}

.form-control {
    width: 100%;
    max-width: 100%; 
    padding: 15px 15px 15px 50px;
    border: 2px solid var(--border-light);
    border-radius: 20px;
    font-size: 16px;
    transition: all 0.3s ease;
    outline: none;
    background: var(--input-bg-light);
    color: var(--text-light);
    font-weight: 500;
    box-sizing: border-box; 
}

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--btn-hover);
            background: var(--card-light);
            color: var(--text-light);
        }

        .form-label {
            position: absolute;
            top: 15px;
            left: 50px;
            color: #6c757d;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
            background: var(--card-light);
            padding: 0 5px;
        }

        .form-control:focus ~ .form-label,
        .form-control:not(:placeholder-shown) ~ .form-label {
            top: -8px;
            left: 10px;
            font-size: 14px;
            color: var(--primary);
            background: var(--card-light);
            padding: 0 5px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 18px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 15px rgba(0, 51, 102, 0.3);
            font-size: 16px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 6px 15px rgba(0, 51, 102, 0.3); }
            50% { box-shadow: 0 10px 25px rgba(0, 51, 102, 0.5); }
            100% { box-shadow: 0 6px 15px rgba(0, 51, 102, 0.3); }
        }

        .btn-primary:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 51, 102, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .alert {
            background: #d1e7ff;
            border: 1px solid #b3d4ff;
            color: #004085;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .theme-toggle:hover {
            background: var(--secondary);
            transform: scale(1.1);
        }

        .theme-toggle.dark {
            background: #333;
        }

        .theme-toggle.dark i {
            content: '☀️';
        }

        [data-theme="dark"] .theme-toggle {
            background: #333;
        }

        [data-theme="dark"] .theme-toggle i {
            content: '☀️';
        }

        [data-theme="dark"] .theme-toggle:hover {
            background: #555;
        }

        /* Dark mode text */
        [data-theme="dark"] .login-header h2 {
            color: #bbdefb;
        }

        [data-theme="dark"] .form-label {
            color: #aaa;
        }

        [data-theme="dark"] .input-icon {
            color: #bbdefb;
        }

        [data-theme="dark"] .btn-primary {
            background: linear-gradient(135deg, #1a237e, #3949ab);
        }

        [data-theme="dark"] .btn-primary:hover {
            box-shadow: 0 10px 25px rgba(57, 73, 171, 0.4);
        }

        [data-theme="dark"] .alert {
            background: #1a237e;
            border: 1px solid #3949ab;
            color: #bbdefb;
        }

        [data-theme="dark"] .invalid-feedback {
            color: #ff7043;
        }
    </style>
</head>
<body>
    <!-- Particle Background -->
    <div class="particles" id="particles"></div>

    <!-- Theme Toggle Button -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i>🌙</i>
    </button>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-header">
            <h2>Atur Ulang Kata Sandi</h2>
        </div>

        @if (Session::has('message'))
            <div class="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('reset.password.post') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- Email Field -->
            <div class="form-group">
                <span class="input-icon">📧</span>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" 
                       id="email" 
                       value="{{ $email }}" 
                       placeholder=" " 
                       readonly>
                <label for="email" class="form-label">Alamat Email</label>
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <span class="input-icon">🔑</span>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" 
                       id="password" 
                       placeholder=" " 
                       required>
                <label for="password" class="form-label">Kata Sandi Baru</label>
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <span class="input-icon">🔒</span>
                <input type="password" 
                       class="form-control @error('password_confirmation') is-invalid @enderror" 
                       name="password_confirmation" 
                       id="password_confirmation" 
                       placeholder=" " 
                       required>
                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn-primary">
                🔐 Atur Ulang Kata Sandi
            </button>
        </form>
    </div>

    <script>
        // Create particles
        function createParticles() {
            const container = document.getElementById('particles');
            const count = 20; // Jumlah partikel

            for (let i = 0; i < count; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                // Ukuran acak
                const size = Math.random() * 10 + 5;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                // Posisi acak
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                // Delay animasi
                particle.style.animationDelay = `${Math.random() * 5}s`;

                container.appendChild(particle);
            }
        }

        // Toggle theme
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.querySelector('.theme-toggle');
            const icon = themeToggle.querySelector('i');

            if (body.getAttribute('data-theme') === 'dark') {
                body.setAttribute('data-theme', 'light');
                icon.textContent = '🌙';
                themeToggle.classList.remove('dark');
            } else {
                body.setAttribute('data-theme', 'dark');
                icon.textContent = '☀️';
                themeToggle.classList.add('dark');
            }
        }

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
        });
    </script>
</body>
</html>