-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakadsmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswas`
--

CREATE TABLE `absensi_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` enum('hadir','terlambat','ijin','alpha','sakit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi_siswas`
--

INSERT INTO `absensi_siswas` (`id`, `id_siswa`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-03-21', 'hadir', '2025-03-21 08:08:13', '2025-03-21 08:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pangkat_golongan` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `jabatan`, `status`, `pangkat_golongan`, `pendidikan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Tata Usaha', '1234567', 'Bandung', '1990-01-01', 'Laki-laki', 'Islam', 'Indonesia', 'Tata Usaha', 'PNS', 'III/a', 'S2', 2, '2025-03-21 07:52:21', '2025-03-21 07:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_p_s`
--

CREATE TABLE `c_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `gelar` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pangkat_golongan` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `nip`, `gelar`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `jabatan`, `status`, `pangkat_golongan`, `pendidikan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Guru', '12345678', '|, S.Pd', 'Bandung', '1994-01-01', 'Laki-laki', 'Islam', 'Indonesia', 'Guru', 'PNS', 'III/a', 'S1', 3, '2025-03-21 07:54:11', '2025-03-21 07:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `jam_pelajaran`
--

CREATE TABLE `jam_pelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `nomor` int(11) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `jam_mulai_calendar` time DEFAULT NULL,
  `jam_selesai_calendar` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam_pelajaran`
--

INSERT INTO `jam_pelajaran` (`id`, `hari`, `nomor`, `event`, `jam_mulai`, `jam_selesai`, `jam_mulai_calendar`, `jam_selesai_calendar`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 1, NULL, '07:00:00', '09:00:00', '00:00:00', '02:00:00', '2025-03-21 07:59:14', '2025-03-21 07:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `jam_pelajaran_mapel_kelas`
--

CREATE TABLE `jam_pelajaran_mapel_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jampel_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam_pelajaran_mapel_kelas`
--

INSERT INTO `jam_pelajaran_mapel_kelas` (`id`, `jampel_id`, `mapel_kelas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademiks`
--

CREATE TABLE `kalender_akademiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tipe_kegiatan` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `rombongan_belajar` varchar(255) NOT NULL,
  `id_guru` bigint(20) UNSIGNED NOT NULL,
  `id_semester` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `rombongan_belajar`, `id_guru`, `id_semester`, `created_at`, `updated_at`) VALUES
(1, '7', 'A', 1, 4, '2025-03-21 07:55:17', '2025-03-21 07:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kelas_id`, `siswa_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_c_k_s`
--

CREATE TABLE `komentar_c_k_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komentar_tengah_semester` varchar(255) DEFAULT NULL,
  `komentar_akhir_semester` varchar(255) DEFAULT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_c_k_s`
--

INSERT INTO `komentar_c_k_s` (`id`, `komentar_tengah_semester`, `komentar_akhir_semester`, `mapel_id`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 2, '2025-03-21 07:58:12', '2025-03-21 07:58:12'),
(3, NULL, NULL, 3, '2025-03-21 07:58:31', '2025-03-21 07:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `parent`, `kelas`, `guru_id`, `semester_id`, `created_at`, `updated_at`) VALUES
(2, 'Matematika', NULL, '7', NULL, 4, '2025-03-21 07:58:12', '2025-03-21 07:58:12'),
(3, 'Matematika Dasar', 2, '7', 1, 4, '2025-03-21 07:58:31', '2025-03-21 07:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_kelas`
--

CREATE TABLE `mapel_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_kelas`
--

INSERT INTO `mapel_kelas` (`id`, `kelas_id`, `mapel_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_24_104932_create_semesters_table', 1),
(5, '2024_10_16_095138_create_permission_tables', 1),
(6, '2024_10_18_191642_create_siswas_table', 1),
(7, '2024_10_20_093452_create_kalender_akademiks_table', 1),
(8, '2024_10_21_093737_create_gurus_table', 1),
(9, '2024_10_22_094108_create_kelas_table', 1),
(10, '2024_10_27_092721_create_kelas_siswa_table', 1),
(11, '2024_10_28_073820_create_mapels_table', 1),
(12, '2024_10_28_122033_create_mapel_kelas_table', 1),
(13, '2024_11_02_053831_create_admins_table', 1),
(14, '2024_11_03_062322_create_weeks_table', 1),
(15, '2024_11_10_083932_create_c_p_s_table', 1),
(16, '2024_11_10_083938_create_t_p_s_table', 1),
(17, '2024_11_15_075244_create_penilaians_table', 1),
(18, '2024_11_15_082949_create_penilaian_siswa_table', 1),
(19, '2024_11_18_103710_create_komentar_c_k_s_table', 1),
(20, '2024_11_18_105222_create_penilaian_ekskuls_table', 1),
(21, '2024_11_24_054152_create_absensi_siswas_table', 1),
(22, '2024_11_26_012718_create_p5_b_k_s_table', 1),
(23, '2024_12_03_093710_create_password_resets_table', 1),
(24, '2024_12_29_024116_create_penilaian_t_p_s_table', 1),
(25, '2024_12_30_160654_create_jam_pelajaran_table', 1),
(26, '2024_12_30_160832_create_jam_pelajaran_mapel_kelas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `p5_b_k_s`
--

CREATE TABLE `p5_b_k_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `dimensi` enum('iman','kebhinekaan','mandiri','gotong-royong','kritis-kreatif') DEFAULT NULL,
  `capaian` enum('MB','SB','BSH','SAB') DEFAULT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('Tugas','UH','STS','SAS') NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kktp` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `mapel_kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_ekskuls`
--

CREATE TABLE `penilaian_ekskuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_siswa`
--

CREATE TABLE `penilaian_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `nilai` double DEFAULT NULL,
  `remedial` double DEFAULT NULL,
  `nilai_akhir` double DEFAULT NULL,
  `penilaian_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_t_p_s`
--

CREATE TABLE `penilaian_t_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penilaian_id` bigint(20) UNSIGNED NOT NULL,
  `tp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-role', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(2, 'edit-role', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(3, 'delete-role', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(4, 'create-user', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(5, 'edit-user', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(6, 'delete-user', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(7, 'view-user', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(2, 'Admin', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(3, 'Wali Kelas', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(4, 'Guru', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(5, 'Siswa', 'web', '2025-03-21 07:48:28', '2025-03-21 07:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(7, 3),
(7, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `tahun_ajaran`, `status`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', '2023/2024', 0, '2023-08-01', '2023-12-15', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(2, 'Semester 2', '2023/2024', 0, '2024-01-10', '2024-05-30', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(3, 'Semester 1', '2024/2025', 0, '2024-07-08', '2024-12-20', '2025-03-21 07:48:28', '2025-03-21 07:48:28'),
(4, 'Semester 2', '2024/2025', 1, '2025-01-06', '2025-06-27', '2025-03-21 07:48:28', '2025-03-21 07:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('m37kD9bM0MH1MyFxGox7xOTJWMW76V0g2turjDEP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoid241ZjljZVI3andMQmJMcmlTQm9ENTQzOTJtd1pJVXd0UjVDU2t0aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1742569778);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status_keluarga` varchar(255) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `jalur_penerimaan` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `pekerjaan_wali` varchar(255) DEFAULT NULL,
  `angkatan` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `telepon`, `asal_sekolah`, `tanggal_diterima`, `jalur_penerimaan`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `nama_wali`, `pekerjaan_wali`, `angkatan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Siswa', '121241343141', 'Bandung', '2005-01-01', 'Laki-laki', 'Islam', 'Anak', 1, NULL, NULL, 'SD 1', '2024-06-01', 'Prestasi', 'Ayah 1', 'PNS', 'Ibu 1', 'IRT', 'Ayah 1', 'PNS', '2024', 4, '2025-03-21 07:56:39', '2025-03-21 07:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `t_p_s`
--

CREATE TABLE `t_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `cp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `picture`) VALUES
(1, 'Satyagraha Pakarti Gemilang', 'admin', 'gilan.lan8@gmail.com', '$2y$12$jV6lpMD1VU2lP0YrbLvn7.drpGzQo3XMVer7N.NHgMsfGAvPh34DG', NULL, '2025-03-21 07:48:28', '2025-03-21 07:59:49', NULL),
(2, 'Tata Usaha', '1234567', 'tu@gmail.com', '$2y$12$Xy8m2kKwBqHTZUU2Ot6yVOtzYxCf9vqSv8iWOfOJ10.cxPPdbwKwi', NULL, '2025-03-21 07:52:47', '2025-03-21 07:52:47', NULL),
(3, 'Guru', '12345678', 'guru@gmail.com', '$2y$12$k8Si4E5j/rIAFLOWInKOoOfvmRcRu8XgmdRIH2NAbdTUQxGsOoiW6', NULL, '2025-03-21 07:54:30', '2025-03-21 07:54:30', NULL),
(4, 'Siswa', '121241343141', 'siswa@gmail.com', '$2y$12$NRJV1zzSoNzAA3WwlSLVGuSoOD.zrxBZ9Chw4ZC/mMZjAHAFOAJM6', NULL, '2025-03-21 07:56:55', '2025-03-21 07:56:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `name`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_siswas_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_id_user_foreign` (`id_user`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `c_p_s`
--
ALTER TABLE `c_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_p_s_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_id_user_foreign` (`id_user`);

--
-- Indexes for table `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_pelajaran_mapel_kelas`
--
ALTER TABLE `jam_pelajaran_mapel_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jam_pelajaran_mapel_kelas_jampel_id_foreign` (`jampel_id`),
  ADD KEY `jam_pelajaran_mapel_kelas_mapel_kelas_id_foreign` (`mapel_kelas_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id_guru_foreign` (`id_guru`),
  ADD KEY `kelas_id_semester_foreign` (`id_semester`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `kelas_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `komentar_c_k_s`
--
ALTER TABLE `komentar_c_k_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_c_k_s_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_guru_id_foreign` (`guru_id`),
  ADD KEY `mapels_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_kelas_kelas_id_foreign` (`kelas_id`),
  ADD KEY `mapel_kelas_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `p5_b_k_s`
--
ALTER TABLE `p5_b_k_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p5_b_k_s_siswa_id_foreign` (`siswa_id`),
  ADD KEY `p5_b_k_s_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_mapel_kelas_id_foreign` (`mapel_kelas_id`);

--
-- Indexes for table `penilaian_ekskuls`
--
ALTER TABLE `penilaian_ekskuls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_ekskuls_kelas_id_foreign` (`kelas_id`),
  ADD KEY `penilaian_ekskuls_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `penilaian_siswa`
--
ALTER TABLE `penilaian_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_siswa_penilaian_id_foreign` (`penilaian_id`),
  ADD KEY `penilaian_siswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `penilaian_t_p_s`
--
ALTER TABLE `penilaian_t_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_t_p_s_penilaian_id_foreign` (`penilaian_id`),
  ADD KEY `penilaian_t_p_s_tp_id_foreign` (`tp_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_id_user_foreign` (`id_user`);

--
-- Indexes for table `t_p_s`
--
ALTER TABLE `t_p_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_p_s_cp_id_foreign` (`cp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c_p_s`
--
ALTER TABLE `c_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_pelajaran`
--
ALTER TABLE `jam_pelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_pelajaran_mapel_kelas`
--
ALTER TABLE `jam_pelajaran_mapel_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kalender_akademiks`
--
ALTER TABLE `kalender_akademiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_c_k_s`
--
ALTER TABLE `komentar_c_k_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `p5_b_k_s`
--
ALTER TABLE `p5_b_k_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_ekskuls`
--
ALTER TABLE `penilaian_ekskuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_siswa`
--
ALTER TABLE `penilaian_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_t_p_s`
--
ALTER TABLE `penilaian_t_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_p_s`
--
ALTER TABLE `t_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_siswas`
--
ALTER TABLE `absensi_siswas`
  ADD CONSTRAINT `absensi_siswas_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswas` (`id`);

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `c_p_s`
--
ALTER TABLE `c_p_s`
  ADD CONSTRAINT `c_p_s_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `jam_pelajaran_mapel_kelas`
--
ALTER TABLE `jam_pelajaran_mapel_kelas`
  ADD CONSTRAINT `jam_pelajaran_mapel_kelas_jampel_id_foreign` FOREIGN KEY (`jampel_id`) REFERENCES `jam_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jam_pelajaran_mapel_kelas_mapel_kelas_id_foreign` FOREIGN KEY (`mapel_kelas_id`) REFERENCES `mapel_kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_id_semester_foreign` FOREIGN KEY (`id_semester`) REFERENCES `semesters` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `komentar_c_k_s`
--
ALTER TABLE `komentar_c_k_s`
  ADD CONSTRAINT `komentar_c_k_s_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapels_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapel_kelas`
--
ALTER TABLE `mapel_kelas`
  ADD CONSTRAINT `mapel_kelas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mapel_kelas_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `p5_b_k_s`
--
ALTER TABLE `p5_b_k_s`
  ADD CONSTRAINT `p5_b_k_s_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `p5_b_k_s_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_mapel_kelas_id_foreign` FOREIGN KEY (`mapel_kelas_id`) REFERENCES `mapel_kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_ekskuls`
--
ALTER TABLE `penilaian_ekskuls`
  ADD CONSTRAINT `penilaian_ekskuls_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_ekskuls_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_siswa`
--
ALTER TABLE `penilaian_siswa`
  ADD CONSTRAINT `penilaian_siswa_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_t_p_s`
--
ALTER TABLE `penilaian_t_p_s`
  ADD CONSTRAINT `penilaian_t_p_s_penilaian_id_foreign` FOREIGN KEY (`penilaian_id`) REFERENCES `penilaians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_t_p_s_tp_id_foreign` FOREIGN KEY (`tp_id`) REFERENCES `t_p_s` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `t_p_s`
--
ALTER TABLE `t_p_s`
  ADD CONSTRAINT `t_p_s_cp_id_foreign` FOREIGN KEY (`cp_id`) REFERENCES `c_p_s` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
