-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jual_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id_laptop` int(11) NOT NULL,
  `jenis_laptop` varchar(100) NOT NULL,
  `harga` varchar(40) NOT NULL,
  `spesifikasi` varchar(500) NOT NULL,
  `gambar` varchar(70) NOT NULL,
  `stok` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id_laptop`, `jenis_laptop`, `harga`, `spesifikasi`, `gambar`, `stok`) VALUES
(7, 'Zenbook 14 OLED (UX3402)', '17.000.000', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business\r\nUp to 12th gen Intel® Core™ i7 processor\r\nIntel® Evo™ certified laptop\r\nUp to 16 GB memory\r\nUp to 1 TB SSD storage\r\nUp to 14&quot; 2.8K OLED NanoEdge touchscreen\r\nLong-lasting 75 Wh battery\r\nThunderbolt™ 4 USB-C™', '63ca064b69fa3.png', 3),
(8, 'Asus zenbook', '12.000.000', 'Windows 11 Home - ASUS recommends Windows 11 Pro for business Up to 12th gen Intel® Core™ i7 processor Intel® Evo™ certified laptop Up to 16 GB memory Up to 1 TB SSD storage Up to 14&quot; 2.8K OLED NanoEdge touchscreen Long-lasting 75 Wh battery Thunderbolt™ 4 USB-C™', '63cd3a3389a7e.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_laptop` int(11) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  `nama_pembeli` varchar(70) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_laptop`, `total_harga`, `jumlah`, `tanggal`, `nama_pembeli`, `status`) VALUES
(11, 8, '17.000.000', 2, '22-01-2023', 'princsello24@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `status`) VALUES
(1, 'putrabasuki24@gmail.com', '$2y$10$S6tIGhmX.OZly1MXVRJyJ.nmlpnlYiK86AXlsXjaOAh8ZwLlzTzAO', '1'),
(10, 'princelloputrabasuki24@gmail.com', '$2y$10$i8BFa0G4jQQbchnjdIUja.0tfrWIBcmjqkJMbz7dNwm/2WsztWSPm', '2'),
(11, 'princsello24@gmail.com', '$2y$10$FWQFG5jv96rOGSkRPL.1QO3ukslJWV3C/1ozI9bPg.x2BFHA0caNm', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id_laptop`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
