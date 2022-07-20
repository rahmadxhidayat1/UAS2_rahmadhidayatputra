-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 03:03 AM
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
(1, 'Refeer'),
(2, 'Dry'),
(3, 'Upgrade Container');

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
  `deskripsi` varchar(25) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_container`
--

INSERT INTO `mst_container` (`idcontainer`, `nmcontainer`, `idmerk`, `stock`, `tahun`, `harga`, `deskripsi`, `picture`) VALUES
(1, 'HEPATUS', 1, 16, '2006-12-02', 4500000, 'ukuran 40x40', 'stan.jpg'),
(2, 'MAERSK', 2, 10, '2005-01-22', 3500000, 'ukuran 20x20', 'con_side.jpg'),
(3, 'ONE', 1, 10, '2007-12-22', 2600000, 'mantap', 'hehe.jpg');

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
(4, 'M2022004', 'Data Transaksi', 'mod_transaksi', '<i class=\"bi bi-basket-fill\"></i>'),
(5, 'M2022005', 'Data UserLogin', 'mod_userlogin', '<i class=\"bi bi-person-workspace\"></i>'),
(6, 'M2022007', 'Setting Hak Akses', 'mod_hakakses', '<i class=\"bi bi-person-check\"></i>'),
(8, 'M2022008', 'Data menu', 'mod_menu', '<i class=\"bi bi-exclamation-triangle-fill\"></i>');

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
(1, 'putra', 'rahmad hidayat putra', 'c20ad4d76fe97759aa27a0c99bff6710', 1),
(3, 'kafaby', 'ahmad kafaby', 'c20ad4d76fe97759aa27a0c99bff6710', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_jualdetail`
--

CREATE TABLE `trn_jualdetail` (
  `iddetail` int(11) NOT NULL,
  `nojual` varchar(6) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_jualdetail`
--

INSERT INTO `trn_jualdetail` (`iddetail`, `nojual`, `idproduk`, `harga`, `qty`, `subtotal`) VALUES
(1, 'INV001', 2, 100000, 1, 100000),
(2, 'INV001', 3, 200000, 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `trn_jualhead`
--

CREATE TABLE `trn_jualhead` (
  `nojual` varchar(6) NOT NULL,
  `idmember` int(11) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trn_jualhead`
--

INSERT INTO `trn_jualhead` (`nojual`, `idmember`, `tgl_transaksi`, `total`) VALUES
('INV001', 1, '2022-07-11', 300000);

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
-- Indexes for table `trn_jualdetail`
--
ALTER TABLE `trn_jualdetail`
  ADD PRIMARY KEY (`iddetail`),
  ADD KEY `fk_nojual` (`nojual`);

--
-- Indexes for table `trn_jualhead`
--
ALTER TABLE `trn_jualhead`
  ADD PRIMARY KEY (`nojual`);

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
  MODIFY `idcontainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trn_jualdetail`
--
ALTER TABLE `trn_jualdetail`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
