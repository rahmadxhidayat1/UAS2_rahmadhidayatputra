-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 03:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_categorycontainer`
--

CREATE TABLE `mst_categorycontainer` (
  `idmerk` int(11) NOT NULL,
  `merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_categorycontainer`
--

INSERT INTO `mst_categorycontainer` (`idmerk`, `merk`) VALUES
(1, 'refeer'),
(2, 'standard'),
(3, 'openside');

-- --------------------------------------------------------

--
-- Table structure for table `mst_container`
--

CREATE TABLE `mst_container` (
  `idcontainer` int(11) NOT NULL,
  `nmcontainer` varchar(25) NOT NULL,
  `idmerk` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `tahun` date NOT NULL,
  `harga` int(20) NOT NULL,
  `ukuran` varchar(25) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_container`
--

INSERT INTO `mst_container` (`idcontainer`, `nmcontainer`, `idmerk`, `stock`, `tahun`, `harga`, `ukuran`, `picture`) VALUES
(3, 'hepatus', 1, 10, '2002-07-11', 20000, '40x40', 'ass');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `idmenu` int(11) NOT NULL,
  `kode_menu` varchar(8) NOT NULL,
  `nmmenu` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`idmenu`, `kode_menu`, `nmmenu`, `link`, `icon`) VALUES
(1, 'M2022001', 'Kategori Produk', 'mod_kategoriproduk', '<i class=\"bi bi-boxes\"></i>'),
(2, 'M2022002', 'Produk', 'mod_produk', '<i class=\"bi bi-bag-check-fill\"></i>'),
(3, 'M2022003', 'Data Member', 'mod_member', '<i class=\"bi bi-person-bounding-box\"></i>'),
(4, 'M2022004', 'Data Transaksi', 'mod_transaksi', '<i class=\"bi bi-basket-fill\"></i>'),
(5, 'M2022005', 'Data UserLogin', 'mod_userlogin', '<i class=\"bi bi-person-workspace\"></i>'),
(6, 'M2022007', 'Setting Hak Akses', 'mod_hakakses', '<i class=\"bi bi-person-check\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `mst_userlogin`
--

CREATE TABLE `mst_userlogin` (
  `iduser` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_userlogin`
--

INSERT INTO `mst_userlogin` (`iduser`, `username`, `nama_lengkap`, `password`, `is_active`) VALUES
(1, 'putra', 'rahmad hidayat putra', 'c20ad4d76fe97759aa27a0c99bff6710', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_categorycontainer`
--
ALTER TABLE `mst_categorycontainer`
  ADD PRIMARY KEY (`idmerk`);

--
-- Indexes for table `mst_container`
--
ALTER TABLE `mst_container`
  ADD PRIMARY KEY (`idcontainer`),
  ADD KEY `fk_merk` (`idmerk`) USING BTREE;

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_categorycontainer`
--
ALTER TABLE `mst_categorycontainer`
  MODIFY `idmerk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mst_container`
--
ALTER TABLE `mst_container`
  MODIFY `idcontainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_container`
--
ALTER TABLE `mst_container`
  ADD CONSTRAINT `fk_merk` FOREIGN KEY (`idmerk`) REFERENCES `mst_categorycontainer` (`idmerk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
