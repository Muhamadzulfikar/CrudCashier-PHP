-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudchasier`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga_barang` int(255) NOT NULL,
  `stock_barang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `harga_barang`, `stock_barang`) VALUES
(1, 'sunsilk', 'shampoo', 1000, 100),
(2, 'teh botol', 'minuman', 3000, 100),
(3, 'kacang garuda', 'makanan', 11000, 200),
(4, 'indomie', 'makanan', 4000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_checkout`
--

CREATE TABLE `barang_checkout` (
  `id_barangck` int(11) NOT NULL,
  `nama_barangck` varchar(255) NOT NULL,
  `harga_barangck` int(255) NOT NULL,
  `jumlah_barangck` int(255) NOT NULL,
  `jumlahdibelick` int(255) NOT NULL,
  `totalhargack` int(255) NOT NULL,
  `tanggal_ck` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_checkout`
--

INSERT INTO `barang_checkout` (`id_barangck`, `nama_barangck`, `harga_barangck`, `jumlah_barangck`, `jumlahdibelick`, `totalhargack`, `tanggal_ck`) VALUES
(2, 'teh botol', 3000, 98, 2, 6000, '2022-06-13 14:39:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_checkout`
--
ALTER TABLE `barang_checkout`
  ADD PRIMARY KEY (`id_barangck`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_checkout`
--
ALTER TABLE `barang_checkout`
  MODIFY `id_barangck` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
