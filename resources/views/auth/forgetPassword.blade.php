<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Kata Sandi - SIAKAD SMPN 3 Jember</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      background: linear-gradient(160deg, #e6f0ff 0%, #f9fbfd 100%);
      font-family: 'Poppins', sans-serif;
      color: #212529;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .reset-card {
      border: none;
      border-radius: 24px;
      box-shadow: 0 10px 40px rgba(0, 80, 200, 0.12);
      max-width: 520px;
      width: 100%;
      background: white;
      overflow: hidden;
    }

    .card-header {
      background: linear-gradient(120deg, #4a90e2, #007bff);
      color: white;
      padding: 2rem 1.5rem;
      text-align: center;
    }

    .logo {
      width: 100px;
      height: 100px;
      margin: 0 0 1.2rem 0;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 60%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      background: white;
    }

    .logo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .card-header h2 {
      font-weight: 600;
      margin: 0;
      font-size: 1.6rem;
    }

    .card-body {
      padding: 2rem;
    }

    .card-body p {
      color: #6c757d;
      margin-bottom: 1.5rem;
      font-size: 0.95rem;
      line-height: 1.6;
    }

    .input-group {
      position: relative;
      margin-bottom: 1.3rem;
    }

    .input-group input {
      width: 100%;
      padding: 14px 14px 14px 48px;
      border: 1px solid #dee2e6;
      border-radius: 14px;
      font-size: 1rem;
      transition: all 0.2s ease;
    }

    .input-group input:focus {
      border-color: #007bff;
      box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
      outline: none;
    }

    .input-group i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
      font-size: 1.1rem;
    }

    .btn-reset {
      background: linear-gradient(120deg, #007bff, #4a90e2);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 14px;
      font-weight: 600;
      width: 100%;
      font-size: 1.05rem;
      transition: all 0.3s ease;
    }

    .btn-reset:hover {
      background: linear-gradient(120deg, #4a90e2, #0069d9);
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(0, 123, 255, 0.3);
    }

    .help-text {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
      color: #6c757d;
    }

    .btn-whatsapp {
      background: linear-gradient(120deg, #25D366, #128C7E);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 8px 20px;
      font-weight: 600;
      font-size: 0.95rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-top: 8px;
    }

    .btn-whatsapp:hover {
      background: linear-gradient(120deg, #128C7E, #075E54);
      transform: scale(1.03);
    }

    footer {
      margin-top: 2rem;
      text-align: center;
      font-size: 0.85rem;
      color: #777;
    }

    /* Modal */
    .modal-content {
      border-radius: 18px;
    }
    .modal-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: rgba(0, 123, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
    }
    .modal-icon i {
      font-size: 1.8rem;
      color: #007bff;
    }

    @media (max-width: 576px) {
      .logo {
        width: 96px;
        height: 96px;
      }
      .card-header h2 {
        font-size: 1.4rem;
      }
      .btn-reset {
        padding: 12px;
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <div class="reset-card">
    <div class="card-header">
      <div class="logo">
        <img src="{{ asset('style/assets/logo-sekolah.png') }}" alt="Logo SMPN 3 Jember">
      </div>
      <h2>Lupa Kata Sandi?</h2>
    </div>
    <div class="card-body">

      <p>Masukkan email akun SIAKAD Anda untuk menerima tautan reset kata sandi.</p>

      @if (Session::has('message'))
        <div class="d-none" id="successMessage">{{ Session::get('message') }}</div>
      @endif

      @error('email')
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius:12px;font-size:0.9rem;padding:10px;">
          {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @enderror

      <form method="POST" action="{{ route('forget.password.post') }}">
        @csrf
        <div class="input-group">
          <i class="bi bi-envelope"></i>
          <input type="email" name="email" id="email" placeholder="Alamat Email" required>
        </div>

        <button type="submit" class="btn-reset">
          <i class="bi bi-send-check"></i> Kirim Tautan Reset
        </button>
      </form>

      <div class="help-text">
        <a href="https://wa.me/6281233007529" class="btn-whatsapp" target="_blank">
          <i class="bi bi-whatsapp"></i> Hubungi Admin
        </a>
      </div>

    </div>
  </div>

  <footer>
    © {{ date('Y') }} Sistem Informasi Akademik — SMP Negeri 3 Jember
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center p-4">
          <div class="modal-icon">
            <i class="bi bi-check-circle"></i>
          </div>
          <h5 class="modal-title">Email Terkirim!</h5>
          <p class="text-muted" id="modalMessageText">Silakan cek kotak masuk atau folder spam.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const msg = document.getElementById('successMessage');
      if (msg) {
        document.getElementById('modalMessageText').textContent = msg.textContent;
        const modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();
      }
    });
  </script>

</body>
</html>