@extends('layout/layout')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .welcome-card {
            background: linear-gradient(135deg, #1A5276, #37B7C3);
            color: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .stat-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .stat-card i {
            color: #37B7C3;
        }

        .dashboard-img {
            object-fit: cover;
            border-radius: 25px;
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
@endpush

@section('content')
    <!-- Pastikan user login -->
    @if(Auth::check())
        <div class="container-fluid mt-3">
            <!-- Welcome Banner -->
            <div class="card mb-4 border-0 shadow-sm fade-in" style="background-color: #f2f2f2;">
                <div class="card-body welcome-card text-center">
                    <!-- Pesan selamat datang dinamis berdasarkan role -->
                    @php
                        $user = auth()->user();
                        $role = $user->getRoleNames()->first();
                        $roleDisplay = [
                            'Owner' => 'Owner',
                            'Admin' => 'Admin',
                            'Guru' => 'Guru',
                            'Wali Kelas' => 'Wali Kelas',
                            'Siswa' => 'Siswa'
                        ][$role] ?? 'Pengguna';
                    @endphp
                    <h2 class="m-0" style="font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: 1px;">
                        Selamat Datang di SIAKAD, {{ $roleDisplay }} {{ $user->name }}
                    </h2>
                </div>
            </div>

            <!-- Main Dashboard -->
            <div class="mb-4">
                <div class="row mb-4">
                    <!-- Info Sekolah -->
                    <div class="col-lg-6">
                        <div class="h-100">
                            <div class="card h-100 stat-card fade-in">
                                <div class="card-body p-4">
                                    <div class="text-center mb-3">
                                        <img class="dashboard-img" style="height: 250px; width: 100%;" src="{{ asset('style/assets/sekola.png') }}" alt="Sekolah">
                                        <h3 class="mt-3" style="color: #1e1e1e; font-weight: 600;">SMP Negeri 3 Jember</h3>
                                    </div>
                                    <h5 class="card-title mt-3" style="color: #1e1e1e;">Kurikulum</h5>
                                    <i class="fa-solid fa-book-open"></i> Kurikulum : Kurikulum Merdeka

                                    <h5 class="card-title mt-3" style="color: #1e1e1e;">Akreditasi</h5>
                                    <i class="fa-solid fa-star"></i> Akreditasi : A

                                    <h5 class="card-title mt-3" style="color: #1e1e1e;">Semester Aktif</h5>
                                    @if($semesterAktif)
                                        <p class="card-text" style="font-size: 1.15rem; color: #1e1e1e;">
                                            <i class="fa-solid fa-calendar-alt"></i> {{ $semesterAktif->semester }} | {{ $semesterAktif->tahun_ajaran }}
                                        </p>
                                    @else
                                        <p class="card-text" style="font-size: 1.15rem; color: #1e1e1e;">
                                            <i class="fa-solid fa-calendar-alt"></i> Belum Ada Semester Aktif
                                        </p>
                                    @endif

                                    <h5 class="card-title mt-3" style="color: #1e1e1e;">Kepala Sekolah</h5>
                                    <p class="card-text ml-2" style="color: #1e1e1e;">Heru Wahyudi, S.Pd M.Pd</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik untuk Admin & Owner -->
                    @role('Admin|Owner')
                    <div class="col-lg-6">
                        <div class="h-100">
                            <!-- Chart Placeholder -->
                            <div class="card mb-4 p-3">
                                <h4 class="text-center">Distribusi Tenaga Kependidikan</h4>
                                <div class="text-center mt-4">
                                    <i class="fa-solid fa-chart-bar fa-3x text-secondary"></i>
                                    <p class="mt-2 text-muted">Data belum tersedia atau sedang diperbaiki.</p>
                                </div>
                            </div>

                            <div class="card mb-4 p-3">
                                <h4 class="text-center">Distribusi Tenaga Pendidik</h4>
                                <div class="text-center mt-4">
                                    <i class="fa-solid fa-chart-bar fa-3x text-secondary"></i>
                                    <p class="mt-2 text-muted">Data belum tersedia atau sedang diperbaiki.</p>
                                </div>
                            </div>

                            <!-- Statistik Umum -->
                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="card stat-card h-100">
                                                <div class="card-body d-flex align-items-center justify-content-between py-2 px-3">
                                                    <div>
                                                        <h5 class="card-title mb-0 text-nowrap">Total Guru</h5>
                                                        <h5 class="card-text">{{ $totalGuru }}</h5>
                                                    </div>
                                                    <i class="fa-solid fa-chalkboard-user fa-2xl" style="color: #37B7C3;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card stat-card h-100">
                                                <div class="card-body d-flex align-items-center justify-content-between py-2 px-3">
                                                    <div>
                                                        <h5 class="card-title mb-0 text-nowrap">Total Admin</h5>
                                                        <h5 class="card-text">{{ $totalOperator }}</h5>
                                                    </div>
                                                    <i class="fa-solid fa-user-pen fa-2xl" style="color: #37B7C3;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="card stat-card h-100">
                                                <div class="card-body d-flex align-items-center justify-content-between py-2 px-3">
                                                    <div>
                                                        <h5 class="card-title mb-0 text-nowrap">Tenaga Kependidikan</h5>
                                                        <h5 class="card-text">{{ $totalAdmin }}</h5>
                                                    </div>
                                                    <i class="fa-solid fa-2xl" style="color: #37B7C3;"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card stat-card h-100">
                                                <div class="card-body d-flex align-items-center justify-content-between py-2 px-3">
                                                    <div>
                                                        <h5 class="card-title mb-0 text-nowrap">Peserta Didik</h5>
                                                        <h5 class="card-text">{{ $totalSiswa }}</h5>
                                                    </div>
                                                    <i class="fa-solid fa-graduation-cap fa-2xl" style="color: #37B7C3;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole

                    <!-- Statistik untuk Guru & Wali Kelas -->
                   @role('Guru|Wali Kelas')
<div class="col-lg-6">
    <div class="h-100 row row-cols-2 g-3">
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Total Mata Pelajaran</h5>
                            <i class="fa-solid fa-book fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalMapel }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Rombel Diampu</h5>
                            <i class="fa-solid fa-users fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalRombel }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Capaian Pembelajaran</h5>
                            <i class="fa-solid fa-bullseye fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalCP }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Tujuan Pembelajaran</h5>
                            <i class="fa-solid fa-bullhorn fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalTP }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Total Tugas</h5>
                            <i class="fa-solid fa-book fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalTugas }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Ulangan Harian</h5>
                            <i class="fa-solid fa-clipboard-list fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalUH }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Sumatif Tengah</h5>
                            <i class="fa-solid fa-check fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalSTS }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Sumatif Akhir</h5>
                            <i class="fa-solid fa-check-double fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalSAS }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Ekstrakurikuler</h5>
                            <i class="fa-solid fa-person-running fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalEkskul }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @role('Wali Kelas')
        <div class="col">
            <div class="h-100">
                <div class="card stat-card fade-in">
                    <div class="card-body d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0 text-nowrap" style="font-size: 0.9rem;">Siswa Perwalian</h5>
                            <i class="fa-solid fa-users fa-xl" style="color: #37B7C3;"></i>
                        </div>
                        <h5 class="card-text mb-0">{{ $totalPerwalian }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>
</div>
@endrole
                        </div>
                    </div>
                    

                    <!-- Info untuk Siswa -->
                    @role('Siswa')
                    <div class="col-lg-6">
                        <div class="h-100">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="card p-3 h-100 stat-card fade-in">
                                        <h4 class="text-center">Rekap Ketidakhadiran</h4>
                                        <canvas id="chartKetidakhadiran" height="300px"></canvas>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 h-100 stat-card fade-in">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column justify-content-between">
                                                <p class="card-title mb-3" style="font-size:0.85rem">
                                                    <a class="stretched-link text-decoration-none text-dark" href="{{ route('siswapage.absensi') }}">Cek Presensi</a>
                                                </p>
                                                <h5 class="card-text">Ayo Jangan Terlambat!</h5>
                                            </div>
                                            <i class="fa-solid fa-caret-right fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 h-100 stat-card fade-in">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column justify-content-between">
                                                <p class="card-title mb-3" style="font-size:0.85rem">
                                                    <a href="{{ route('siswapage.bukunilai') }}" class="stretched-link text-decoration-none text-dark">Cek Buku Nilai</a>
                                                </p>
                                                <h5 class="card-text">Belajar Yang Rajin</h5>
                                            </div>
                                            <i class="fa-solid fa-caret-right fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 h-100 stat-card fade-in">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column justify-content-between">
                                                <p class="card-title mb-3" style="font-size:0.85rem">
                                                    <a href="{{ route('kalendermapel.index') }}" class="stretched-link text-decoration-none text-dark">Cek Jadwal Pembelajaran</a>
                                                </p>
                                                <h5 class="card-text">Jangan Lupa Jadwalnya</h5>
                                            </div>
                                            <i class="fa-solid fa-caret-right fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3 h-100 stat-card fade-in">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-column justify-content-between">
                                                <p class="card-title mb-3" style="font-size:0.85rem">
                                                    <a href="{{ route('kalenderakademik.index') }}" class="stretched-link text-decoration-none text-dark">Cek Kalender Akademik</a>
                                                </p>
                                                <h5 class="card-text">Cek Agenda Terbaru</h5>
                                            </div>
                                            <i class="fa-solid fa-caret-right fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    @else
        <!-- Fallback jika user tidak login -->
        <div class="container-fluid mt-5">
            <div class="alert alert-danger text-center">
                <h4><i class="fa-solid fa-lock"></i> Akses Ditolak</h4>
                <p>Silakan login terlebih dahulu.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.5/dist/chart.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Chart Siswa -->
    @role('Siswa')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let chart = null;

            function drawChart(data = {}) {
                const labels = ["Sakit", "Izin", "Alpa", "Terlambat"];
                const values = [
                    data.sakit || 0,
                    data.izin || 0,
                    data.alpa || 0,
                    data.terlambat || 0
                ];

                const ctx = document.getElementById('chartKetidakhadiran').getContext('2d');
                if (chart) chart.destroy();

                chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah',
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)', // Sakit
                                'rgba(255, 159, 64, 0.6)', // Izin
                                'rgba(255, 205, 86, 0.6)', // Alpa
                                'rgba(75, 192, 192, 0.6)'  // Terlambat
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    precision: 0
                                }
                            }
                        }
                    }
                });
            }

            $.ajax({
                url: "{{ route('fetchKehadiranSemester') }}",
                type: "GET",
                success: function(response) {
                    if (response && response.data) {
                        drawChart(response.data);
                    } else {
                        console.warn("Data ketidakhadiran tidak ditemukan, menggunakan default.");
                        drawChart({ sakit: 0, izin: 0, alpa: 0, terlambat: 0 });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching attendance data:", error);
                    drawChart({ sakit: 0, izin: 0, alpa: 0, terlambat: 0 });
                }
            });
        });
    </script>
    @endrole
@endpush