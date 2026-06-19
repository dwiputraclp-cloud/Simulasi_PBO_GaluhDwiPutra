-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:09 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_galuhdwiputra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(12,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(100) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Cilacap', 82.50, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 1 Cilacap', 78.75, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 2 Cilacap', 85.00, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dewi Anggraini', 'MAN 1 Cilacap', 80.25, 250000.00, 'Reguler', 'Teknologi Rekayasa Perangkat Lunak', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Pratama', 'SMK Muhammadiyah Cilacap', 76.50, 250000.00, 'Reguler', 'Teknik Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMAN 3 Cilacap', 88.20, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gina Maharani', 'SMKN 2 Cilacap', 81.40, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Saputra', 'SMAN 1 Banyumas', 90.50, 200000.00, 'Prestasi', NULL, NULL, 'Juara Olimpiade Matematika', 'Kabupaten', NULL, NULL),
(9, 'Indah Permata', 'SMAN 2 Banyumas', 92.75, 200000.00, 'Prestasi', NULL, NULL, 'Juara Lomba Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(10, 'Joko Prasetyo', 'SMKN 1 Purwokerto', 89.30, 200000.00, 'Prestasi', NULL, NULL, 'Juara Kompetisi Robotik', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 1 Kroya', 91.00, 200000.00, 'Prestasi', NULL, NULL, 'Juara Karya Tulis Ilmiah', 'Kabupaten', NULL, NULL),
(12, 'Lukman Hakim', 'MAN 2 Cilacap', 87.80, 200000.00, 'Prestasi', NULL, NULL, 'Juara Pencak Silat', 'Provinsi', NULL, NULL),
(13, 'Maya Salsabila', 'SMAN 1 Maos', 93.25, 200000.00, 'Prestasi', NULL, NULL, 'Juara Desain Poster Digital', 'Nasional', NULL, NULL),
(14, 'Nanda Putri', 'SMKN 3 Cilacap', 86.90, 200000.00, 'Prestasi', NULL, NULL, 'Juara Lomba Programming', 'Provinsi', NULL, NULL),
(15, 'Oki Firmansyah', 'SMAN 1 Adipala', 84.60, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-001', 'Dinas Pendidikan Kabupaten Cilacap'),
(16, 'Putri Handayani', 'SMKN 1 Kawunganten', 88.40, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-002', 'Dinas Komunikasi dan Informatika'),
(17, 'Rangga Setiawan', 'SMAN 1 Majenang', 83.75, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-003', 'Badan Kepegawaian Daerah'),
(18, 'Siti Nurhaliza', 'MAN 1 Banyumas', 89.10, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-004', 'Kementerian Perhubungan'),
(19, 'Taufik Hidayat', 'SMKN 2 Purwokerto', 85.95, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-005', 'Dinas Perindustrian dan Tenaga Kerja'),
(20, 'Vina Aprilia', 'SMAN 2 Kroya', 87.25, 150000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-006', 'Pemerintah Daerah Kabupaten Cilacap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
