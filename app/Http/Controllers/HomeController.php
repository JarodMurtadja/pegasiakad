<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KelasSiswa;
use App\Models\User;
use App\Models\Semester;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Admin;
use App\Models\TP;
use App\Models\CP;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $semesterId = $request->session()->get('semester_id');

        // Check if user is an Admin or Owner
        if ($user->hasRole(['Admin', 'Owner'])) { // <-- Diubah: Tambahkan 'Owner'
            $semesterAktif = Semester::select('semester', 'tahun_ajaran')
                ->where('status', 1)
                ->first(); // Gunakan first()

            $kepalaSekolah = Guru::select('nama')
                ->where('jabatan', 'Kepala Sekolah')
                ->get();

            $totalSiswa = Siswa::count();
            $totalGuru = Guru::count();
            $totalEkskul = Kelas::where('kelas', 'Ekskul')->count();
            $totalKelas = Kelas::where('kelas', '!=', 'Ekskul')->count();
            $totalMapel = Mapel::count();
            $totalAdmin = Admin::count();
            $totalOperator = User::role('Admin')->count(); // Ini mungkin perlu disesuaikan jika Owner juga bisa operator

            $tenagaKependidikanChartData = Admin::selectRaw("
                COUNT(CASE WHEN jabatan = 'Tenaga Kebersihan' THEN 1 END) AS tenaga_kebersihan,
                COUNT(CASE WHEN jabatan = 'Tenaga Keamanan' THEN 1 END) AS tenaga_keamanan,
                COUNT(CASE WHEN jabatan = 'Tata Usaha' THEN 1 END) AS tata_usaha
            ")->first();

            $pendidikChartData = Guru::selectRaw("
                COUNT(CASE WHEN status = 'PNS' THEN 1 END) AS pns,
                COUNT(CASE WHEN status = 'PPPK' THEN 1 END) AS pppk,
                COUNT(CASE WHEN status = 'PTT' THEN 1 END) AS ptt,
                COUNT(CASE WHEN status = 'GTT' THEN 1 END) AS gtt
            ")->first();

            return view('home', compact(
                'semesterAktif',
                'kepalaSekolah',
                'totalSiswa',
                'totalGuru',
                'totalEkskul',
                'totalMapel',
                'totalAdmin',
                'totalKelas',
                'totalOperator',
                'tenagaKependidikanChartData',
                'pendidikChartData',
            ));
        } else if ($user->hasRole(['Guru', 'Wali Kelas'])) {
            $semesterAktif = Semester::select('semester', 'tahun_ajaran')
                ->where('status', 1)
                ->first(); // Gunakan first()

            $kepalaSekolah = Guru::select('nama')
                ->where('jabatan', 'Kepala Sekolah')
                ->get();

            $operator = Guru::select('nama')
                ->where('jabatan', "Operator")
                ->get();

            $operator = $operator->concat(
                Admin::select('nama')
                    ->where('jabatan', "Operator")
                    ->get());

            $totalMapel = Mapel::join('gurus', 'gurus.id', '=', 'mapels.guru_id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('users.id', $user->id)
                ->where('mapels.semester_id', $semesterId)
                ->where('mapels.kelas', '!=', 'Ekskul')
                ->count();

            $totalRombel = Kelas::join('mapel_kelas as mk', 'mk.kelas_id', '=', 'kelas.id')
                ->join('mapels', 'mapels.id', '=','mk.mapel_id')
                ->join('gurus', 'gurus.id', '=', 'mapels.guru_id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('users.id', $user->id)
                ->where('mapels.semester_id', $semesterId)
                ->where('mapels.kelas', '!=', 'Ekskul')
                ->count();

            $totalCP = CP::join('mapels', 'mapels.id', '=', 'c_p_s.mapel_id')
                ->join('gurus', 'gurus.id', '=', 'mapels.guru_id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('users.id', $user->id)
                ->where('mapels.semester_id', $semesterId)
                ->count();

            $totalTP = TP::join('c_p_s', 't_p_s.cp_id', '=', 'c_p_s.id')
                ->join('mapels', 'mapels.id', '=', 'c_p_s.mapel_id')
                ->join('gurus', 'gurus.id', '=', 'mapels.guru_id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('users.id', $user->id)
                ->where('mapels.semester_id', $semesterId)
                ->count();

            $totalTugas = Penilaian::join('mapel_kelas as mk', 'penilaians.mapel_kelas_id', '=', 'mk.id')
                ->join('mapels as m', 'm.id', '=', 'mk.mapel_id')
                ->join('gurus', 'm.guru_id', '=', 'gurus.id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('penilaians.tipe', 'Tugas')
                ->where('users.id', $user->id)
                ->where('m.semester_id', $semesterId)
                ->count();

            $totalUH = Penilaian::join('mapel_kelas as mk', 'penilaians.mapel_kelas_id', '=', 'mk.id')
                ->join('mapels as m', 'm.id', '=', 'mk.mapel_id')
                ->join('gurus', 'm.guru_id', '=', 'gurus.id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('penilaians.tipe', 'UH')
                ->where('users.id', $user->id)
                ->where('m.semester_id', $semesterId)
                ->count();

            $totalSTS = Penilaian::join('mapel_kelas as mk', 'penilaians.mapel_kelas_id', '=', 'mk.id')
                ->join('mapels as m', 'm.id', '=', 'mk.mapel_id')
                ->join('gurus', 'm.guru_id', '=', 'gurus.id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('penilaians.tipe', 'STS')
                ->where('users.id', $user->id)
                ->where('m.semester_id', $semesterId)
                ->count();

            $totalSAS = Penilaian::join('mapel_kelas as mk', 'penilaians.mapel_kelas_id', '=', 'mk.id')
                ->join('mapels as m', 'm.id', '=', 'mk.mapel_id')
                ->join('gurus', 'm.guru_id', '=', 'gurus.id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('penilaians.tipe', 'SAS')
                ->where('users.id', $user->id)
                ->where('m.semester_id', $semesterId)
                ->count();

            $totalEkskul = Mapel::join('gurus', 'gurus.id', '=', 'mapels.guru_id')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->where('users.id', $user->id)
                ->where('mapels.semester_id', $semesterId)
                ->where('mapels.kelas', '=', 'Ekskul')
                ->count();

            if ($user->hasRole('Wali Kelas')) {
                $totalPerwalian = KelasSiswa::join('kelas as b', 'kelas_siswa.kelas_id', '=', 'b.id')
                    ->join('siswas as s', 's.id', '=', 'kelas_siswa.siswa_id')
                    ->join('gurus as c', 'c.id', '=', 'b.id_guru')
                    ->join('users as d', 'd.id', '=', 'c.id_user')
                    ->where('d.id', $user->id)
                    ->where('b.kelas', '!=', 'Ekskul')
                    ->where('b.id_semester', $semesterId)
                    ->distinct('s.id')
                    ->count();

                return view('home', compact(
                    'totalMapel',
                    'totalRombel',
                    'totalCP',
                    'totalTP',
                    'totalTugas',
                    'totalUH',
                    'totalSTS',
                    'totalSAS',
                    'totalEkskul',
                    'totalPerwalian',
                    'semesterAktif',
                    'kepalaSekolah',
                    'operator',
                ));
            } else if ($user->hasRole('Guru')) {
                return view('home', compact(
                    'totalMapel',
                    'totalRombel',
                    'totalCP',
                    'totalTP',
                    'totalTugas',
                    'totalUH',
                    'totalSTS',
                    'totalSAS',
                    'totalEkskul',
                    'semesterAktif',
                    'kepalaSekolah',
                    'operator',
                ));
            }
        } else if ($user->hasRole('Siswa')) {
            $semesterAktif = Semester::select('semester', 'tahun_ajaran','start','end')
                ->where('status', 1)
                ->first(); // Gunakan first()

            $kepalaSekolah = Guru::select('nama')
                ->where('jabatan', 'Kepala Sekolah')
                ->get();

            $operator = Guru::select('nama')
                ->where('jabatan', 'Operator')
                ->get();

            $operator = $operator->concat(
                Admin::select('nama')
                    ->where('jabatan', 'Operator')
                    ->get()
            );

            $siswa = Siswa::where('nama', auth()->user()->name)->first();

            if (!$semesterAktif) {
                return back()->with('error', 'Data semester aktif tidak ditemukan.');
            }

            if (!$siswa) {
                $ketidakhadiranChartData = (object)[
                    'hadir' => 0,
                    'terlambat' => 0,
                    'ijin' => 0,
                    'sakit' => 0,
                    'alpha' => 0,
                ];
            } else {
                $query = "
                    SELECT
                        COUNT(CASE WHEN `status` = 'hadir' THEN 1 END) AS hadir,
                        COUNT(CASE WHEN `status` = 'terlambat' THEN 1 END) AS terlambat,
                        COUNT(CASE WHEN `status` = 'ijin' THEN 1 END) AS ijin,
                        COUNT(CASE WHEN `status` = 'sakit' THEN 1 END) AS sakit,
                        COUNT(CASE WHEN `status` = 'alpha' THEN 1 END) AS alpha
                    FROM absensi_siswas
                    WHERE `id_siswa` = ?
                    AND `created_at` BETWEEN ? AND ?
                ";

                $ketidakhadiranChartData = DB::select($query, [
                    $siswa->id,
                    $semesterAktif->start,
                    $semesterAktif->end,
                ])[0];
            }

            return view('home', compact(
                'semesterAktif',
                'kepalaSekolah',
                'operator',
                'ketidakhadiranChartData'
            ));
        }

        // Jika user login tapi tidak memiliki role yang diharapkan
        abort(403, 'Access Denied');
    }

    public function getKetidakHadiranChartData(Request $request)
    {
        $user = Auth::user();

        if (!$user->hasRole('Siswa')) {
            return response()->json([
                'message' => 'Access Denied'
            ], 403);
        }

        $semesterId = $request->session()->get('semester_id');
        $semester = $semesterId ? Semester::findOrFail($semesterId) : Semester::where('status', 1)->first();

        if (!$semester) {
             return response()->json([
                'success' => false,
                'message' => 'Data semester tidak ditemukan.'
            ], 404);
        }

        if ($user->hasRole('Siswa')) {
            $siswa = Siswa::where('nama', auth()->user()->name)->first();

            if (!$siswa) {
                 return response()->json([
                    'success' => false,
                    'message' => 'Data siswa tidak ditemukan.'
                ], 404);
            }

            $ketidakhadiranChartData = DB::table('absensi_siswas')
                ->selectRaw("
                    COUNT(CASE WHEN `status` = 'hadir' THEN 1 END) AS hadir,
                    COUNT(CASE WHEN `status` = 'terlambat' THEN 1 END) AS terlambat,
                    COUNT(CASE WHEN `status` = 'ijin' THEN 1 END) AS izin,
                    COUNT(CASE WHEN `status` = 'sakit' THEN 1 END) AS sakit,
                    COUNT(CASE WHEN `status` = 'alpha' THEN 1 END) AS alpa
                ")
                ->where('id_siswa', $siswa->id)
                ->whereBetween('date', [$semester->start, $semester->end])
                ->first();

            return response()->json([
                'success' => true,
                'message' => "Data ketidakhadiran untuk semester " . $semester->id . " berhasil diambil",
                'data' =>  $ketidakhadiranChartData
            ]);
        }
    }
}