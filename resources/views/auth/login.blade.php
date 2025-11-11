<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login SIAKAD</title>
  <link rel="icon" href="{{asset('style/assets/logo-sekolah.png')}}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
    }

    html {
      height: 100%;
    }

    body {
      /* Flexbox langsung di body — paling reliable */
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100dvh;
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(160deg, #e6f0ff 0%, #f9fbfd 100%);
      font-family: 'Poppins', sans-serif;
      color: #212529;
    }

    @media (max-width: 576px) {
  .login-card {
    margin: 0 1rem;
    border-radius: 18px;
  }
  .card-header h2 {
    font-size: 1.3rem;
  }
  .btn-login {
    padding: 12px;
    font-size: 1rem;
  }
}
    .login-card {
      border: none;
      border-radius: 24px;
      box-shadow: 0 10px 40px rgba(0, 80, 200, 0.12);
      max-width: 520px;
      width: 95%;
      background: white;
      overflow: hidden;
    }

    /* Sisanya tetap sama — potong untuk efisiensi */
    .card-header {
      background: linear-gradient(120deg, #4a90e2, #007bff);
      color: white;
      padding: 2rem 1.5rem;
      text-align: center;
    }

   
  .card-header {
    background: linear-gradient(120deg, #4a90e2, #007bff);
    color: white;
    padding: 2rem 1.5rem;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .logo {
  /* Default untuk laptop/desktop */
  width: 85px;
  height: 85px;
  margin: 0 0 1rem 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  background: white;
}

/* Lebih besar di HP (semua ukuran) */
@media (max-width: 768px) {
  .logo {
    width: 120px;     /* Jauh lebih besar */
    height: 120px;
    margin: 0 0 1.5rem 0; /* tambah jarak ke teks */
  }
}

/* Super besar di HP sangat kecil (misal iPhone SE / Android entry-level) */
@media (max-width: 425px) {
  .logo {
    width: 100px;
    height: 100px;
    margin: 0 0 1.3rem 0;
  }
}

  .logo img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* potong & isi penuh */
    display: block; /* hilangkan space bawah */
  }

  .card-header h2 {
    font-weight: 600;
    margin: 0;
    font-size: 1.6rem;
  }


    .card-body {
      padding: 2rem;
    }

    .form-control {
      border-radius: 14px;
    }

    .password-toggle {
      position: absolute;
      right: 20px;
      top: 52px;
      cursor: pointer;
      color: #6c757d;
      font-size: 1.1rem;
    }

    .btn-login {
      background: linear-gradient(120deg, #4547ceff, #4a90e2);
      border: none;
      color: whitesmoke !important;
      border-radius: 50px;
      padding: 14px;
      font-weight: 700;
      font-size: 1.20rem;
      width: 100%;
    }

    .btn-login:hover {
  background: linear-gradient(120deg, #4a90e2, #0069d9);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

    .links {
      display: flex;
      justify-content: space-between;
      margin-top: 1rem;
      font-size: 0.95rem;
    }

    .links a {
      color: #007bff;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .card-header h2 {
        font-size: 1.4rem;
      }
      .logo {
        width: 56px;
        height: 56px;
      }
    }
  </style>
</head>
<body>

<!-- Alert Modal - 100% Work, No Bootstrap JS Required -->
<div id="alertModal" style="
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  font-family: 'Poppins', sans-serif;
">
  <div style="
    background: white;
    border-radius: 16px;
    width: 90%;
    max-width: 450px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    animation: fadeIn 0.3s ease;
  ">
    <!-- Header -->
    <div style="
      padding: 18px 20px 12px;
      border-bottom: 1px solid #eee;
      display: flex;
      justify-content: space-between;
      align-items: start;
    ">
      <h5 style="
        color: #e74c3c;
        font-weight: 600;
        font-size: 1.25rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
      ">
        <i style="font-size: 1.4rem;">⚠️</i> Alert
      </h5>
      <button id="closeModalX" type="button" style="
        background: none;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        color: #777;
        padding: 0;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
      ">&times;</button>
    </div>

    <!-- Body -->
    <div style="padding: 20px; text-align: center; color: #2c3e50; font-size: 1.05rem; line-height: 1.5;">
      Ada Beberapa Fitur Yang Belum Optimal Di Beberapa Device, Untuk Menampilkan Fitur Yang Maksimal Silahkan Gunakan HandPhone Dengan <b>Mode Desktop</b> Atau Laptop/Pc.
    </div>

    <!-- Footer -->
    <div style="padding: 0 20px 20px; text-align: center;">
      <button id="closeModalOK" type="button" style="
        background: #007bff;
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 30px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s ease;
      ">OK</button>
    </div>
  </div>
</div>

<!-- Fade-in Animation -->
<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
  }
</style>

  <div class="login-card">
   <div class="card-header">
  <div class="logo">
    <img src="{{ asset('style/assets/log-logo.png') }}" alt="Logo Sekolah">
  </div>
  <h2>Masuk ke Akun Anda</h2>
</div>
    <div class="card-body">

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius:12px;">
          {{ $errors->first() }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
   <!-- Username Field -->
<div class="mb-3 position-relative">
  <label for="username" class="form-label">Username</label>
  <input type="text"
         class="form-control"
         id="username"
         name="username"
         required
         autocomplete="off"
         style="padding-right: 70px;"> <!-- Sama seperti password -->

  <!-- Ikon Clear (opsional) -->
  <span id="clearUsername"
        style="position: absolute;
               right: 30px;
               top: 73%;
               transform: translateY(-50%);
               cursor: pointer;
               color: #6c757d;
               font-size: 1.2rem;
               display: none;
               z-index: 5;">
    <i class="bi bi-x-circle"></i>
  </span>

  <!-- Ikon User -->
  <span style="position: absolute;
               right: 21px;
               top: 73%;
               transform: translateY(-50%);
               color: #6c757d;
               font-size: 1.2rem;
               z-index: 5;">
    <i class="bi bi-person"></i>
  </span>
</div>

<!-- Password Field -->
<div class="mb-3 position-relative">
  <label for="password" class="form-label">Kata Sandi</label>
  <input type="password"
         class="form-control"
         id="password"
         name="password"
         required
         autocomplete="off"
         style="padding-right: 70px;"> <!-- Sama seperti username -->

  <!-- Tombol Mata -->
  <button type="button"
          id="togglePassword"
          class="btn btn-sm"
          style="position: absolute;
                 right: 20px;
                 top:73%;
                 transform: translateY(-50%);
                 width: 20px;
                 height: 28px;
                 border: none;
                 background: transparent;
                 box-shadow: none;
                 z-index: 10;
                 cursor: pointer;
                 padding: 0;
                 display: flex;
                 align-items: center;
                 justify-content: center;
                 transition: all 0.2s ease;">
    <i class="bi bi-eye" style="font-size: 1.2rem; color: #6c757d;"></i>
  </button>
</div>
        <button type="submit" class="btn-login">MASUK</button>
      </form>

      <!--<div class="links mt-3">
        <a href="{{ route('forget.password.get') }}">Lupa kata sandi?</a>
      </div>-->
    </div>
  </div>

  <script>
(function() {
    const modal = document.getElementById('alertModal');
    const btnOK = document.getElementById('closeModalOK');
    const btnX = document.getElementById('closeModalX');

    if (modal && btnOK) {
      const close = () => {
        modal.style.display = 'none';
        // Opsional: hapus dari DOM
        // modal.remove();
      };
      btnOK.addEventListener('click', close);
      if (btnX) btnX.addEventListener('click', close);
    }
  })();

  document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    if (!toggle || !password) return;

    // Toggle password visibility
    toggle.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      // Ganti ikon
      const icon = this.querySelector('i');
      if (type === 'password') {
        icon.className = 'bi bi-eye';
        icon.style.color = '#6c757d';
      } else {
        icon.className = 'bi bi-eye-slash';
        icon.style.color = '#007bff';
      }
    });

    // Feedback visual saat diklik/touch
    toggle.addEventListener('mousedown', function () {
      this.style.backgroundColor = 'rgba(255,255,255,1)';
      this.style.boxShadow = '0 2px 6px rgba(0,0,0,0.15)';
    });
    toggle.addEventListener('mouseup', function () {
      this.style.backgroundColor = 'rgba(255,255,255,0.9)';
      this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.08)';
    });
    toggle.addEventListener('touchstart', function () {
      this.style.backgroundColor = 'rgba(255,255,255,1)';
      this.style.boxShadow = '0 2px 6px rgba(0,0,0,0.15)';
    });
    toggle.addEventListener('touchend', function () {
      this.style.backgroundColor = 'rgba(255,255,255,0.9)';
      this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.08)';
    });
  });
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></scrip>
</body>
</html>