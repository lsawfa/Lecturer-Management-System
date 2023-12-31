-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 12:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecture_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_aktivitas` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `jumlah_volume_kegiatan` double NOT NULL,
  `sks_hasil` int(11) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `no_penugasan` varchar(255) DEFAULT NULL,
  `jenis_lampiran` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `angka_kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `nama_aktivitas`, `tahun_ajaran`, `tanggal_mulai`, `tanggal_berakhir`, `jumlah_volume_kegiatan`, `sks_hasil`, `path_lampiran`, `no_penugasan`, `jenis_lampiran`, `user_id`, `angka_kredit`) VALUES
(15, 'Perkuliahan', 'Ganjil 2023/2024', '2023-03-20', '2023-03-20', 10, 50, 'zpNisLXitHDR8y9ZVx42SpK0JSyt6ZuhlaE1tXJK.pdf', '1902001', 'SK', 2, 0.5),
(16, 'Perkuliahan', 'Genap 2023/2024', '2024-01-01', '2024-03-06', 3, 24, 'Dx5NXDzGrX5ItAMEpAwOqxNIQB3qqkMOLXFjyAFc.pdf', '1902012', 'SK', 2, 0.8);

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
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `lampiran_jabatan` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `jabatan`, `periode_awal`, `periode_akhir`, `no_sk`, `lampiran_jabatan`, `user_id`) VALUES
(2, 'Rektor', '2023-12-01', '2023-12-31', 'RK-001', 'WbxJc7tennyehCHNR6M3bJRSclBXKlOsJA8ZY6WA.pdf', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_aktivitas`
--

CREATE TABLE `kelas_aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_matkul` varchar(255) NOT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `kelas_waktu` time NOT NULL,
  `kelas_sks` int(11) NOT NULL,
  `aktivitas_id` int(11) NOT NULL,
  `kelas_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_aktivitas`
--

INSERT INTO `kelas_aktivitas` (`id`, `kelas_matkul`, `kelas_nama`, `kelas_waktu`, `kelas_sks`, `aktivitas_id`, `kelas_hari`) VALUES
(7, 'Pemrograman Web', 'Pemrograman Web E', '13:32:00', 3, 15, 2),
(8, 'Pemrograman Fungsional', 'Pemrograman Fungsional F', '13:34:00', 3, 15, 3),
(9, 'Sistem Operasi', 'Sistem Operasi A', '13:36:00', 2, 16, 4);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_22_094929_aktivitas', 2),
(9, '2023_12_24_190418_create_kelas_aktivitas_table', 3),
(10, '2023_12_24_191812_create_user_data_table', 4),
(11, '2023_12_27_132503_create_seminar_table', 5),
(13, '2023_12_28_045928_create_tugas_akhirs_table', 6),
(14, '2023_12_28_122525_create_pendamping_table', 6),
(15, '2023_12_28_132014_create_pengujis_table', 7),
(16, '2023_12_28_135142_create_pembimbings_table', 8),
(17, '2023_12_28_144040_create_pengembangan_p_k_s_table', 9),
(18, '2023_12_28_150006_create_pengembangan_bahan_ajars_table', 10),
(19, '2023_12_28_151055_create_orasi_ilmiahs_table', 11),
(21, '2023_12_28_152707_create_jabatans_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orasi_ilmiahs`
--

CREATE TABLE `orasi_ilmiahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tema_orasi` varchar(255) NOT NULL,
  `waktu` date NOT NULL,
  `lampiran_orasi` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orasi_ilmiahs`
--

INSERT INTO `orasi_ilmiahs` (`id`, `tema_orasi`, `waktu`, `lampiran_orasi`, `user_id`) VALUES
(3, 'Optimasi Keberhasilan Akuakultur melalui Implementasi Convolutional Neural Networks (CNNs) dalam Deteksi White Spot Syndrome Virus pada Udang Vaname: Inovasi Image Processing Deep Learning untuk Peningkatan Kesehatan dan Produktivitas', '2023-12-31', 'mRikWyaddePLoX4iOW3Tcf3aBL70lLSUCg1kIedf.pdf', '2');

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
-- Table structure for table `pembimbings`
--

CREATE TABLE `pembimbings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `path_foto_kegiatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbings`
--

INSERT INTO `pembimbings` (`id`, `nama_kegiatan`, `tahun_ajaran`, `waktu`, `no_sk`, `path_lampiran`, `path_foto_kegiatan`, `user_id`) VALUES
(3, 'Gemastik', 'Ganjil 2023/2024', '2023-12-31 00:00:00', 'GM-02', 'YlYVyL7CQtkOg64NP0MM78LVZzd7ZFocrvpq1Afc.pdf', 'syUYkyew5vu2peHM5uFuPKOgCgnZloh0iKk7VJtR.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pendampings`
--

CREATE TABLE `pendampings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_nim` varchar(255) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `tanggal_dimulai` datetime NOT NULL,
  `tanggal_berakhir` datetime NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `path_foto_kegiatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendampings`
--

INSERT INTO `pendampings` (`id`, `mahasiswa_nim`, `mahasiswa_nama`, `jenis_kegiatan`, `tanggal_dimulai`, `tanggal_berakhir`, `no_sk`, `path_lampiran`, `path_foto_kegiatan`, `user_id`) VALUES
(4, '202110370311187', 'Salsabila', 'Magang', '2023-12-31 00:00:00', '2024-01-04 00:00:00', 'KKN-01', 'xYQcooXgn50Bv20Kqm5gKnoshMqapJWdx47VgtEk.pdf', 'nie75pSsxuIghiMEuR8P30sA2b9pNaXevdorYc7P.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengembangan_bahan_ajars`
--

CREATE TABLE `pengembangan_bahan_ajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_bahan_ajar` varchar(255) NOT NULL,
  `deskripsi_bahan_ajar` varchar(255) NOT NULL,
  `hasil_pengembangan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembangan_bahan_ajars`
--

INSERT INTO `pengembangan_bahan_ajars` (`id`, `jenis_bahan_ajar`, `deskripsi_bahan_ajar`, `hasil_pengembangan`, `user_id`) VALUES
(3, 'Web', 'Using Laravel', 'VViQ0lTTM2sBAvK5W7BaaVO7FduUyZimOOtiMH7q.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengembangan_p_k_s`
--

CREATE TABLE `pengembangan_p_k_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matkul_pengembangan` varchar(255) NOT NULL,
  `deskripsi_pengembangan` varchar(255) NOT NULL,
  `hasil_pengembangan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembangan_p_k_s`
--

INSERT INTO `pengembangan_p_k_s` (`id`, `matkul_pengembangan`, `deskripsi_pengembangan`, `hasil_pengembangan`, `user_id`) VALUES
(3, 'Etika dan Profesi', 'Transformasi Praktikum Fakultas Kedokteran Hewan: Merintis Masa Depan Pendidikan dengan Teknologi Virtual Reality di FKH UB untuk Peningkatan Pemahaman dan Keterampilan Mahasiswa', 'NPgddPVmHAUjuRqCN9dRQ632hpKlsmYl0Myi1BMR.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengujis`
--

CREATE TABLE `pengujis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_nim` varchar(255) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `jenis_ujian_akhir` varchar(255) NOT NULL,
  `posisi_penguji` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `path_foto_kegiatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengujis`
--

INSERT INTO `pengujis` (`id`, `mahasiswa_nim`, `mahasiswa_nama`, `jenis_ujian_akhir`, `posisi_penguji`, `tahun_ajaran`, `waktu`, `no_sk`, `path_lampiran`, `path_foto_kegiatan`, `user_id`) VALUES
(3, '202110370311187', 'Ahya', 'Skripsi', 'Penguji 2', 'Ganjil 2023/2024', '2023-12-31 00:00:00', 'TA-004', 'FNRqFptCy3mUmMzHrFRHQv7sk1BiiSmsiKJnJP6g.pdf', 'OWtwcFx1txUOxb1Yn3NoIosA1bmSAu01Q9TTlbWc.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_nim` varchar(255) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `waktu_seminar` datetime NOT NULL,
  `no_berita_acara` varchar(255) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `path_foto_kegiatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`id`, `mahasiswa_nim`, `mahasiswa_nama`, `tahun_ajaran`, `waktu_seminar`, `no_berita_acara`, `path_lampiran`, `path_foto_kegiatan`, `user_id`) VALUES
(8, '202110370311189', 'Sawfa', 'Ganjil 2023/2024', '2023-12-31 00:00:00', 'TA-002', 'N1Qr4qSPNTw0QmyhLxxiiUlFi5wZSVPOeW7XuWLa.pdf', 'b7yCZiyxCaoIxDONPJykceulkgJxwqMe1QkM2HkR.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhirs`
--

CREATE TABLE `tugas_akhirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_nim` varchar(255) NOT NULL,
  `mahasiswa_nama` varchar(255) NOT NULL,
  `jenis_bimbingan` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `tanggal_dimulai` datetime NOT NULL,
  `tanggal_berakhir` datetime NOT NULL,
  `jenis_pembimbing` varchar(255) NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `path_lampiran` varchar(255) NOT NULL,
  `path_foto_kegiatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_akhirs`
--

INSERT INTO `tugas_akhirs` (`id`, `mahasiswa_nim`, `mahasiswa_nama`, `jenis_bimbingan`, `tahun_ajaran`, `tanggal_dimulai`, `tanggal_berakhir`, `jenis_pembimbing`, `no_sk`, `path_lampiran`, `path_foto_kegiatan`, `user_id`) VALUES
(3, '2021103703111189', 'Kenanga', 'Thesis', 'Ganjil 2023/2024', '2023-12-24 00:00:00', '2023-12-31 00:00:00', 'Pembimbing 1', 'TA-002', 'AO9RB5r54wJDb3sSiNcXy33QfWmGhl43nUZMhVPV.pdf', 'UVwxIL7rwzqqjad21IUqp7qxIAFN7knYMCpyf9Bw.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'larynt', 'larynt@gmail.com', NULL, '$2a$12$GWkO3SQI9pem1scWU1.kVOoS2OzUrpngMKp0cITrBUgBop7.EQ1WS', NULL, NULL, NULL),
(3, 'ahya', 'ahya@gmail.com', NULL, '$2a$12$GWkO3SQI9pem1scWU1.kVOoS2OzUrpngMKp0cITrBUgBop7.EQ1WS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_tempat_lahir` varchar(255) NOT NULL,
  `user_tanggal_lahir` date NOT NULL,
  `user_nidn` varchar(255) NOT NULL,
  `user_golongan` varchar(255) NOT NULL,
  `user_pangkat` varchar(255) NOT NULL,
  `user_pendidikan_terkahir` varchar(255) NOT NULL,
  `user_pendidikans1` varchar(255) NOT NULL,
  `user_pendidikans2` varchar(255) NOT NULL,
  `user_pendidikans3` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_name`, `user_tempat_lahir`, `user_tanggal_lahir`, `user_nidn`, `user_golongan`, `user_pangkat`, `user_pendidikan_terkahir`, `user_pendidikans1`, `user_pendidikans2`, `user_pendidikans3`, `user_id`) VALUES
(2, 'Larynt', 'Lamongan', '2013-12-04', '19287109281', '1', 'Rektor', 'S3', 'Universitas Muhammadiyah Malang', 'Institut Teknologi Sepuluh Nopember', 'Institut Teknologi Bandung', 2),
(3, 'ahya', 'Tarakan', '2013-12-04', '19287109281', '2', 'Dekan', 'S3', 'Universitas Muhammadiyah Malang', 'Institut Teknologi Sepuluh Nopember', 'Institut Teknologi Bandung', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_aktivitas`
--
ALTER TABLE `kelas_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orasi_ilmiahs`
--
ALTER TABLE `orasi_ilmiahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembimbings`
--
ALTER TABLE `pembimbings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendampings`
--
ALTER TABLE `pendampings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembangan_bahan_ajars`
--
ALTER TABLE `pengembangan_bahan_ajars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembangan_p_k_s`
--
ALTER TABLE `pengembangan_p_k_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengujis`
--
ALTER TABLE `pengujis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_aktivitas`
--
ALTER TABLE `kelas_aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orasi_ilmiahs`
--
ALTER TABLE `orasi_ilmiahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembimbings`
--
ALTER TABLE `pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendampings`
--
ALTER TABLE `pendampings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengembangan_bahan_ajars`
--
ALTER TABLE `pengembangan_bahan_ajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengembangan_p_k_s`
--
ALTER TABLE `pengembangan_p_k_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengujis`
--
ALTER TABLE `pengujis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
