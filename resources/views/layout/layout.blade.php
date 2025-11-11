<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD PEGA</title>
    <link rel="icon" href="{{asset('style/assets/logo-sekolah.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  ">
    <link rel="stylesheet" href="{{asset('style/css/layout.css')}}">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js  '></script>
    <script src="https://kit.fontawesome.com/9d2abd8931.js  " crossorigin="anonymous"></script>
    @stack('style')
    <style>
        .avatar {
            object-fit: cover !important;
            object-position: center top !important;
        }

        #selectSemesterModal .btn-semester:hover {
            border-color: #37B7C3 !important;
        }

        /* Gaya Sidebar yang Dimodifikasi */
        #sidebar {
            width: 280px; /* Lebar sidebar */
            min-width: 280px;
            max-width: 280px;
            background-color: #ffffff; /* Warna latar belakang sidebar putih */
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
            transition: all 0.3s ease; /* Transisi untuk efek perubahan */
            z-index: 1000; /* Z-index agar tetap di atas konten */
            position: fixed; /* Tetap di tempat saat scroll */
            top: 0;
            left: 0;
            height: 100dvh; /* Tinggi penuh layar */
            overflow-y: auto; /* Scroll jika konten terlalu panjang */
            padding-bottom: 20px; /* Ruang di bawah */
        }

        /* Gaya untuk logo dan nama sekolah */
        .sidebar-logo {
            padding: 20px 15px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0; /* Garis pemisah */
            background-color: #37B7C3; /* Warna latar belakang header sidebar */
            color: white;
        }
        .sidebar-logo a {
            text-decoration: none;
            color: inherit;
            font-weight: 600;
            font-size: 1.1rem;
            display: block;
        }
        .sidebar-logo img {
            margin-bottom: 10px;
            border-radius: 8px; /* Sedikit bulat */
        }

        /* Gaya untuk header peran */
        .sidebar-header {
            padding: 12px 15px 8px 15px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d; /* Warna abu-abu terang */
            background-color: #f8f9fa; /* Warna latar belakang header peran */
            border-top: 1px solid #e0e0e0;
            border-bottom: 1px solid #e0e0e0;
            margin-top: 10px;
        }

        /* Gaya untuk item menu utama */
        .sidebar-item {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk link menu */
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: #495057; /* Warna teks default */
            font-size: 0.95rem;
            transition: background-color 0.2s ease, color 0.2s ease; /* Transisi warna */
            border-left: 3px solid transparent; /* Garis kiri transparan */
        }

        .sidebar-link i {
            margin-right: 12px;
            width: 20px; /* Lebar ikon */
            text-align: center;
            color: #6c757d; /* Warna ikon default */
            font-size: 1.1rem;
        }

        /* Gaya hover untuk link */
        .sidebar-link:hover {
            background-color: #e6f7fa; /* Warna latar belakang saat hover */
            color: #37B7C3; /* Warna teks saat hover */
            border-left-color: #37B7C3; /* Warna garis kiri saat hover */
        }
        .sidebar-link:hover i {
            color: #37B7C3; /* Warna ikon saat hover */
        }

        /* Gaya untuk item aktif - Tambahkan kelas 'active' secara dinamis di PHP jika diperlukan */
        /* .sidebar-item.active > .sidebar-link,
        .sidebar-item .sidebar-link.active {
            background-color: #e6f7fa;
            color: #37B7C3;
            border-left-color: #37B7C3;
            font-weight: 500;
        }
        .sidebar-item.active > .sidebar-link i,
        .sidebar-item .sidebar-link.active i {
             color: #37B7C3;
        } */

        /* Gaya untuk dropdown */
        .sidebar-dropdown {
            background-color: #f8f9fa; /* Warna latar belakang dropdown */
            padding-left: 35px; /* Indentasi untuk dropdown */
        }
        .sidebar-dropdown .sidebar-item {
            margin: 0;
        }
        .sidebar-dropdown .sidebar-link {
            padding: 10px 15px;
            font-size: 0.9rem;
            color: #6c757d; /* Warna teks dropdown lebih gelap */
        }
        .sidebar-dropdown .sidebar-link:hover {
            background-color: #e9f4f6; /* Warna hover dropdown */
            color: #2a9ca5; /* Warna teks hover dropdown */
            border-left-color: #2a9ca5;
        }
        .sidebar-dropdown .sidebar-link:hover i {
            color: #2a9ca5;
        }
        /* Ikon panah dropdown */
        .sidebar-link[aria-expanded="true"]::after,
        .sidebar-link.collapsed[aria-expanded="true"]::after {
            content: " \25BC"; /* Unicode untuk panah bawah */
            margin-left: auto;
            font-size: 0.8rem;
        }
        .sidebar-link.collapsed::after {
            content: " \25B6"; /* Unicode untuk panah kanan */
            margin-left: auto;
            font-size: 0.8rem;
        }

        /* Penyesuaian untuk layar kecil (mobile) */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%); /* Sembunyikan sidebar di mobile */
            }
            #sidebar.active {
                transform: translateX(0); /* Tampilkan sidebar saat aktif */
            }
        }

    </style>
</head>

<body>
    <div class="wrapper d-flex">
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#" class="align-middle">
                        <img class="rounded mx-auto d-block mb-3 mt-3" src="{{asset('style/assets/logo-sekolah.png')}}" alt="Logo" width="100" height="100">
                        SMP Negeri 3 Jember
                    </a>
                </div>

                <!-- Super Admin -->
                @role('Owner')
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Owner</li>
                    <li class="sidebar-item">
                        <a href="{{route('home')}}" class="sidebar-link">
                            <i class="fa-solid fa-list-ul"></i> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item list-except">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#biografi" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-database"></i> Master Database
                        </a>
                        <ul id="biografi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('admin.index')}}" class="sidebar-link">Tenaga Kependidikan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('guru.index')}}" class="sidebar-link">Pendidik</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('siswa.index')}}" class="sidebar-link">Peserta Didik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('account.index')}}" class="sidebar-link">
                            <i class="fa-solid fa-user"></i> Akun
                        </a>
                    </li>
                </ul>
                @endrole

                <!-- Admin -->
                @role('Admin')
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Admin</li>
                    <li class="sidebar-item">
                        <a href="{{route('home')}}" class="sidebar-link">
                            <i class="fa-solid fa-list-ul"></i> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('semesters.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-chart-simple"></i> Semester
                        </a>
                    </li>
                    <li class="sidebar-item list-except">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#biografi" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-database"></i> Master Database
                        </a>
                        <ul id="biografi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('admin.index')}}" class="sidebar-link">Tenaga Kependidikan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('guru.index')}}" class="sidebar-link">Pendidik</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('siswa.index')}}" class="sidebar-link">Peserta Didik</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('kelas.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-users"></i> Kelas & Ekstrakurikuler
                        </a>
                    </li>
                    <li class="sidebar-item list-except">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#mapelsidebar" data-bs-toggle="collapse" aria-expanded="false">
                            <i class="fa-solid fa-book-open"></i> Mata Pelajaran
                        </a>
                        <ul id="mapelsidebar" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('mapel.index')}}" class="sidebar-link">Mengelola Mata Pelajaran</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{route('kalendermapel.index')}}" class="sidebar-link">Jadwal Mata Pelajaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('kalenderakademik.index')}}" class="sidebar-link">
                            <i class="fa-solid fa-calendar-days"></i> Kalender Akademik
                        </a>
                    </li>
                </ul>
                @endrole

                <!-- Siswa -->
                @role('Siswa')
                <ul class="sidebar-nav">
                    <li class="sidebar-header">Peserta Didik</li>
                    <li class="sidebar-item">
                        <a href="{{route('home')}}" class="sidebar-link">
                            <i class="fa-solid fa-list-ul"></i> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('siswapage.absensi') }}" class="sidebar-link">
                            <i class="fa-solid fa-address-book"></i> Presensi
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('siswapage.bukunilai') }}" class="sidebar-link">
                            <i class="fa-solid fa-scroll"></i> Buku Nilai
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('kalendermapel.index')}}" class="sidebar-link">
                            <i class="fa-regular fa-calendar"></i> Jadwal Pelajaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('kalenderakademik.index') }}" class="sidebar-link">
                            <i class="fa-solid fa-calendar-days"></i> Kalender Akademik
                        </a>
                    </li>
                </ul>
                @endrole

                <!-- Guru -->
               @role('Guru|Wali Kelas')
<ul class="sidebar-nav">
    <li class="sidebar-header">Guru</li>
    <li class="sidebar-item">
        <a href="{{ route('home')}}" class="sidebar-link">
            <i class="fa-solid fa-list-ul"></i> Dashboard
        </a>
    </li>
    <li class="sidebar-item list-except">
        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#mata-pelajaran" aria-expanded="false" aria-controls="mata-pelajaran">
            <i class="fa-solid fa-person-chalkboard"></i> Silabus
        </a>
        <ul id="mata-pelajaran" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            @forelse($listMataPelajaran as $mapel)
                <li class="sidebar-item">
                    <a href="{{ route('silabus.index', ['mapelId' => $mapel->id]) }}" class="sidebar-link">
                        {{ $mapel->nama }} | Kelas {{ $mapel->kelas }}
                    </a>
                </li>
            @empty
                <li class="sidebar-item disabled"><a class="sidebar-link text-muted">Tidak ada mata pelajaran</a></li>
            @endforelse
        </ul>
    </li>
    <li class="sidebar-item list-except">
        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#penilaian" aria-expanded="false" aria-controls="penilaian">
            <i class="fa-solid fa-chart-pie"></i> Penilaian
        </a>
        <ul id="penilaian" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            @forelse($listRombel as $mapel)
                <li class="sidebar-item">
                    <a href="{{ route('penilaian.index', ['mapelKelasId' => $mapel->mapel_kelas_id]) }}" class="sidebar-link">
                        {{ $mapel->nama }} | Kelas {{ $mapel->rombongan_belajar }}
                    </a>
                </li>
            @empty
                <li class="sidebar-item disabled"><a class="sidebar-link text-muted">Tidak ada rombel diampu</a></li>
            @endforelse
        </ul>
    </li>
    <li class="sidebar-item list-except">
        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#ekstrakulikuler" aria-expanded="false" aria-controls="ekstrakulikuler">
            <i class="fa-solid fa-person-walking"></i> Ekstrakurikuler
        </a>
        <ul id="ekstrakulikuler" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            @forelse($listEkskul as $ekskul)
                <li class="sidebar-item">
                    <a href="{{ route('penilaian.ekskul', [$ekskul->kelas_id, $ekskul->mapel_id]) }}" class="sidebar-link">
                        {{ $ekskul->nama }}
                    </a>
                </li>
            @empty
                <li class="sidebar-item disabled"><a class="sidebar-link text-muted">Tidak ada ekstrakurikuler</a></li>
            @endforelse
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('kalendermapel.index') }}" class="sidebar-link">
            <i class="fa-regular fa-calendar"></i> Jadwal Pelajaran
        </a>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('kalenderakademik.index') }}" class="sidebar-link">
            <i class="fa-solid fa-calendar-days"></i> Kalender Akademik
        </a>
    </li>
</ul>
@endrole

                <!-- Wali Kelas -->
                @role('Wali Kelas')
                <ul class="sidebar-nav mb-5">
                    <li class="sidebar-header">
                        Wali Kelas {{ optional($kelasSemester)->rombongan_belajar ? '| '.$kelasSemester->rombongan_belajar: '' }}
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('pesertadidik.index',  ['semesterId' => $selectedSemesterId ?? 'default'])}}" class="sidebar-link">
                            <i class="fa-solid fa-graduation-cap"></i> Peserta Didik
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('pesertadidik.attendanceIndex', ['semesterId' => $selectedSemesterId ?? 'default']) }}" class="sidebar-link">
                            <i class="fa-solid fa-address-book"></i> Presensi
                        </a>
                    </li>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('pesertadidik.legerNilai', [optional($kelasSemester)->id ?? 'default' , $selectedSemesterId ?? 'default'])}}" class="sidebar-link">
                            <i class="fa-solid fa-book"></i> Leger Nilai
                        </a>
                    </li>
                </ul>
                @endrole
            </div>
        </aside>

        <div class="main" style="margin-left: 280px; width: calc(100% - 280px);">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @role('Guru|Wali Kelas|Siswa')
                <form action="{{ route('select.semester') }}" method="POST" class="m-0">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #37B7C3;">
                            @if (is_null($selectedSemester))
                                Pilih Semester
                            @else
                                {{$selectedSemester->semester}} | {{$selectedSemester->tahun_ajaran}}
                            @endif
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-start">
                            @foreach($semesters as $semester)
                            <li>
                                <button class="btn dropdown-item @if ($selectedSemesterId == $semester->id) text-white @endif" type="submit" name="semester_id" value="{{ $semester->id }}" style="@if ($selectedSemesterId == $semester->id) background-color: #37B7C3; @endif">
                                    {{ $semester->semester }} | {{ $semester->tahun_ajaran }}
                                    {{ $semester->status == 1 ? "(Aktif)" : "" }}
                                </button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
                @endrole

                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav ms-auto"> <!-- ms-auto untuk menggeser ke kanan -->
                        <p style="padding: 10px 15px">{{ auth()->user()->name }}</p>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                @if (auth()->user()->picture)
                                    <img src="data:image/jpeg;base64,{{ base64_encode(auth()->user()->picture) }}" class="avatar rounded-circle" alt="Profile Picture">
                                @else
                                    <img src="{{ asset('style/assets/default_picture.jpg') }}" class="avatar rounded-circle" alt="Default Profile Picture">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('profile') }}" class="dropdown-item">Profil</a>
                                @if (count(auth()->user()->getRoleNames()->toArray()) > 1)
                                    <a href="{{ route('role') }}" class="dropdown-item">Ganti Hak Akses</a>
                                @endif
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="font-family: 'Poppins';font-size: 16px;" class="dropdown-item text-danger">Keluar</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @role('Guru|Wali Kelas|Siswa')
    <div class="modal fade" id="selectSemesterModal" tabindex="-1" aria-labelledby="selectSemesterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="selectSemesterLabel">Pilih Semester</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('select.semester') }}" method="POST" class="mt-3 mb-4">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center">
                            @foreach($semesters as $semester)
                            <li>
                                <button class="btn btn-semester my-1 @if ($selectedSemesterId == $semester->id) btn-white @endif" type="submit" name="semester_id" value="{{ $semester->id }}" style="min-width:250px; @if ($selectedSemesterId == $semester->id) background-color: #37B7C3; color:white; @else border: 2px solid #212529; @endif">
                                    {{ $semester->semester }} | {{ $semester->tahun_ajaran }}
                                    {{ $semester->status == 1 ? "(Aktif)" : "" }}
                                </button>
                            </li>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (!session()->get('semester_id'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("selectSemesterModal"));
            myModal.show();
        });
    </script>
    @endif
    @endrole

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js  "></script>
    <script src="{{asset('style/js/layout.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11  "></script>
    @stack('script')
</body>

</html>