-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 12:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smart_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED DEFAULT NULL,
  `id_guru` int(11) UNSIGNED DEFAULT NULL,
  `rencana_pelaksanaan_pembelajaran` int(11) UNSIGNED NOT NULL,
  `kriteria_ketuntasan_minimal` int(11) UNSIGNED NOT NULL,
  `pembuatan_soal` int(11) UNSIGNED NOT NULL,
  `absensi_kehadiran` int(11) UNSIGNED NOT NULL,
  `ketepatan_waktu` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `desimal`
--

CREATE TABLE `desimal` (
  `id_desimal` int(11) UNSIGNED NOT NULL,
  `id_alternatif` int(11) UNSIGNED DEFAULT NULL,
  `id_guru` int(11) UNSIGNED DEFAULT NULL,
  `rencana_pelaksanaan_pembelajaran` float UNSIGNED NOT NULL,
  `kriteria_ketuntasan_minimal` float UNSIGNED NOT NULL,
  `pembuatan_soal` float UNSIGNED NOT NULL,
  `absensi_kehadiran` float UNSIGNED NOT NULL,
  `ketepatan_waktu` float UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `lahir` date NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED DEFAULT NULL,
  `kriteria` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bobot` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) UNSIGNED DEFAULT NULL,
  `id_guru` int(11) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-20-074639', 'App\\Database\\Migrations\\MigrationAkun', 'default', 'App', 1733570178, 1),
(2, '2024-10-20-074651', 'App\\Database\\Migrations\\MigrationGuru', 'default', 'App', 1733570178, 1),
(3, '2024-10-20-083407', 'App\\Database\\Migrations\\MigrationKriteria', 'default', 'App', 1733570178, 1),
(4, '2024-10-20-083416', 'App\\Database\\Migrations\\MigrationLaporan', 'default', 'App', 1733570178, 1),
(5, '2024-10-20-083429', 'App\\Database\\Migrations\\MigrationAlternatif', 'default', 'App', 1733570178, 1),
(6, '2024-12-07-051658', 'App\\Database\\Migrations\\MigrationDesimal', 'default', 'App', 1733570178, 1),
(7, '2024-12-07-051713', 'App\\Database\\Migrations\\MigrationUtility', 'default', 'App', 1733570178, 1),
(8, '2024-12-07-051720', 'App\\Database\\Migrations\\MigrationPenilaian', 'default', 'App', 1733570178, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) UNSIGNED NOT NULL,
  `id_alternatif` int(11) UNSIGNED DEFAULT NULL,
  `id_guru` int(11) UNSIGNED DEFAULT NULL,
  `rencana_pelaksanaan_pembelajaran` float UNSIGNED NOT NULL,
  `kriteria_ketuntasan_minimal` float UNSIGNED NOT NULL,
  `pembuatan_soal` float UNSIGNED NOT NULL,
  `absensi_kehadiran` float UNSIGNED NOT NULL,
  `ketepatan_waktu` float UNSIGNED NOT NULL,
  `nilai` float UNSIGNED NOT NULL,
  `rank` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `id_utility` int(11) UNSIGNED NOT NULL,
  `id_alternatif` int(11) UNSIGNED DEFAULT NULL,
  `id_guru` int(11) UNSIGNED DEFAULT NULL,
  `rencana_pelaksanaan_pembelajaran` float UNSIGNED NOT NULL,
  `kriteria_ketuntasan_minimal` float UNSIGNED NOT NULL,
  `pembuatan_soal` float UNSIGNED NOT NULL,
  `absensi_kehadiran` float UNSIGNED NOT NULL,
  `ketepatan_waktu` float UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `alternatif_id_akun_foreign` (`id_akun`),
  ADD KEY `alternatif_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `desimal`
--
ALTER TABLE `desimal`
  ADD PRIMARY KEY (`id_desimal`),
  ADD KEY `desimal_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `guru_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kriteria_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `laporan_id_akun_foreign` (`id_akun`),
  ADD KEY `laporan_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `penilaian_id_alternatif_foreign` (`id_alternatif`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
  ADD PRIMARY KEY (`id_utility`),
  ADD KEY `utility_id_alternatif_foreign` (`id_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desimal`
--
ALTER TABLE `desimal`
  MODIFY `id_desimal` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `id_utility` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desimal`
--
ALTER TABLE `desimal`
  ADD CONSTRAINT `desimal_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `laporan_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utility`
--
ALTER TABLE `utility`
  ADD CONSTRAINT `utility_id_alternatif_foreign` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
