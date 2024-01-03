-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 01:32 AM
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
CREATE DATABASE IF NOT EXISTS `lecture_management` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lecture_management`;

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
  `path_lampiran` varchar(255) NOT NULL,
  `no_penugasan` varchar(255) DEFAULT NULL,
  `jenis_lampiran` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `angka_kredit` double NOT NULL,
  `jumlah_volume_kegiatan` double DEFAULT NULL,
  `sks_hasil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `nama_aktivitas`, `tahun_ajaran`, `tanggal_mulai`, `tanggal_berakhir`, `path_lampiran`, `no_penugasan`, `jenis_lampiran`, `user_id`, `angka_kredit`, `jumlah_volume_kegiatan`, `sks_hasil`) VALUES
(19, 'Perkuliahan', 'Ganjil 2023/2024', '2024-01-01', '2024-01-08', 'H8ZvbmToOkwM49eEV6yJF1pA1GDR3TeZbLvbpaWu.pdf', 'PK-002', 'SK', 2, 4, 4, 4),
(20, 'Perkuliahan', 'Genap 2023/2024', '2024-01-01', '2024-01-29', 'kMXLu7FGrn7HxvGiXqZldXEPzxI8rVKc73ZtsduN.pdf', 'PK-001', 'SK', 2, 2, 3, 2);

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
(10, 'Pratikum', 'Web E', '00:09:00', 2, 19, 2),
(11, 'Sistem Operasi', 'A', '08:15:00', 2, 20, 2);

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
(5, '202110370311187', 'Aya', 'KKN', '2024-01-01 00:00:00', '2024-01-29 00:00:00', 'KKN-001', 's8Vztt7ntYl1MCGET04JHOk2qLkntfMlrbzEOadD.pdf', 'hhmweVF9FD0VfGx3kSLYr8Hmx3vwj7IOlZuUltnW.pdf', 2);

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
(1, 'Sarla', 'sarla@gmail.com', NULL, '$2a$12$Ldtp8z9zBYEZHbGuGjuSG.m3dWoC6/mAfpU3QF9tKpbl12JW5PdgS', NULL, NULL, NULL),
(2, 'larynt', 'larynt@gmail.com', NULL, '$2a$12$GWkO3SQI9pem1scWU1.kVOoS2OzUrpngMKp0cITrBUgBop7.EQ1WS', NULL, NULL, NULL),
(3, 'ahya', 'ahya@gmail.com', NULL, '$2a$12$.ejqLyHTdT2f9fvKC50cQubdjf3LCtYUfOaAiW3.X6NheumbTYGZy', NULL, NULL, NULL);

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
(1, 'Sarla', 'Lombok', '2023-12-01', '1902831', '3', 'Dosen', 'Universitas Muhammadiyah Malang', 'Universitas Muhammadiyah Malang', 'Universitas Muhammadiyah Malang', 'Universitas Muhammadiyah Malang', 1),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendampings`
--
ALTER TABLE `pendampings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
