-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2020 at 06:32 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id` int(4) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `nama_pasien` varchar(60) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id`, `no_rm`, `nama_pasien`, `tanggal_lahir_pasien`, `ruangan`, `created_at`, `created_by`, `status`) VALUES
(1, '12345678', 'Satria Rendra', '2020-07-12', 'mawar 23', '2020-07-11 16:24:10', 4, 0),
(2, '12345678', 'Eko Deni', '2020-07-12', 'mawar 23', '2020-07-11 16:24:10', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(4) NOT NULL,
  `id_pengambilan` int(4) NOT NULL,
  `bayar` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL COMMENT '1 =  diterima, 0 = belum diterima',
  `tanggal_pulang` date NOT NULL,
  `tanggal_harus_kembali` datetime NOT NULL,
  `status_notif` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(5) NOT NULL
) ;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_pengambilan`, `bayar`, `status`, `tanggal_pulang`, `tanggal_harus_kembali`, `status_notif`, `created_at`, `created_by`) VALUES
(1, 1, 2, 0, '2020-07-01', '2020-07-04 00:00:00', 1, '2020-07-02 00:00:00', 8),
(2, 2, 2, 1, '2020-07-01', '2020-07-04 00:00:00', 1, '2020-07-02 00:00:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(90) NOT NULL,
  `level` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `chat_id` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(5) NOT NULL
) ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `level`, `status`, `chat_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'Admin', 'admin@gmail.com', '$2y$10$AoBLsKRdineKZUOHjpmrBugPHiDKw5CY9iHnrKB5UhmB5LbRR0Or6', 2, 1, '1032001406', '2020-03-26 12:29:40', 1, '0000-00-00 00:00:00', 0),
(4, 'tppri', 'tppri@mail.com', '$2y$10$AoBLsKRdineKZUOHjpmrBugPHiDKw5CY9iHnrKB5UhmB5LbRR0Or6', 3, 1, '1032001406', '2020-03-26 12:35:02', 1, '2020-04-22 00:25:17', 2),
(8, 'inap', 'inap@gmail.com', '$2y$10$PXum1vsQ9vtvD2SVidf2Qub5y0hcWSw65VgOsVadpIkQX5D7fTXfG', 4, 1, '1032001406', '2020-04-21 15:28:54', 2, '0000-00-00 00:00:00', 0),
(9, 'assembling', 'assembling@gmail.com', '$2y$10$L/fDdYkm7iE/03pL9V07J.d0dFmCwdGI6EbeWQ9WmaKSFjZdrz9u6', 5, 1, '1032001406', '2020-04-21 15:29:18', 2, '0000-00-00 00:00:00', 0),
(10, 'hendra', '', '$2y$10$SZXKSnt03VC5anYjkrKWK.NGznNJOwV7W4ZHJ/j6wA9w4BXlV1LRK', 3, 1, '', '2020-07-10 17:25:14', 3, '0000-00-00 00:00:00', 0),
(11, 'ludfyrahman', '', '$2y$10$sYYK2L63cA6n/1/ZvIk/b.W7zNPMIAH1ZiSWh4myg0z941DLbV.Ce', 1, 1, '', '2020-07-11 16:33:51', 3, '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
