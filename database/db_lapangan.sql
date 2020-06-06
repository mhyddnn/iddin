-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 03:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_lapangan` varchar(15) NOT NULL,
  `waktu` int(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`id`, `foto`, `nama_lapangan`, `waktu`, `harga`) VALUES
(51, '5ec389d0acb92.jpg', 'Lapangan 2', 1, 60000),
(52, '5ec52ac6b920d.jpg', 'LapanganB', 1, 60000),
(53, '5ec69352171e1.jpg', 'Lapangan3', 2, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(25) NOT NULL,
  `alamat_member` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `alamat_member`, `no_hp`) VALUES
(16, 'Mahdalena', 'Wakanda rt02 rw01', '089123567234'),
(17, 'Ali', 'Jepara', '0821');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id_sewa` int(11) NOT NULL,
  `nama_tim` varchar(15) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `jam_sewa` time NOT NULL,
  `durasi_sewa` int(1) NOT NULL,
  `lapangan` varchar(15) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `total_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `nama_tim`, `tanggal_sewa`, `jam_sewa`, `durasi_sewa`, `lapangan`, `harga_sewa`, `total_sewa`) VALUES
(8, 'Kucing', '2020-05-19', '10:00:49', 1, 'Lapangan1', 121, 121),
(10, 'Tapir football', '2020-05-20', '20:00:24', 1, 'LapanganB', 60000, 60000),
(11, 'Koala Club', '2020-05-21', '21:00:44', 2, 'LapanganB', 60000, 120000),
(12, 'SI A', '2020-06-01', '15:00:00', 1, 'Lapangan 2', 60000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$D10.utc1.Kp/Y2.LkxpI7O1oOOdTRqYl03aTw/ZXY/YVdCsxBDMEi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
